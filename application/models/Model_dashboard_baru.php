<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard_baru extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    // Total seluruh pengaduan
    public function getTotalPengaduan()
    {
        return $this->db->count_all_results('pengaduan');
    }

    // Total pengaduan per UPK (wilayah layanan)
    public function getPengaduanPerUpk()
    {
        return $this->db->query("SELECT wil_layanan, COUNT(*) as total FROM pengaduan GROUP BY wil_layanan ORDER BY total DESC")->result();
    }

    // Total pengaduan per jenis
    public function getPengaduanPerJenis()
    {
        return $this->db->query("SELECT jenis_aduan, COUNT(*) as total FROM pengaduan GROUP BY jenis_aduan ORDER BY total DESC")->result();
    }

    // Pengaduan per bulan (6 bulan terakhir)
    public function getPengaduanPerBulan()
    {
        return $this->db->query("SELECT DATE_FORMAT(tgl_aduan, '%Y-%m') as bulan, COUNT(*) as total FROM pengaduan WHERE tgl_aduan >= DATE_SUB(NOW(), INTERVAL 6 MONTH) GROUP BY DATE_FORMAT(tgl_aduan, '%Y-%m') ORDER BY bulan ASC")->result();
    }

    // Rekap detail per UPK: total per jenis aduan
    public function getRekapDetailPerUpk()
    {
        return $this->db->query("SELECT wil_layanan, jenis_aduan, COUNT(*) as total FROM pengaduan GROUP BY wil_layanan, jenis_aduan ORDER BY wil_layanan, total DESC")->result();
    }

    // Pengaduan terbaru
    public function getPengaduanTerbaru($limit = 10)
    {
        $this->db->order_by('tgl_aduan', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('pengaduan')->result();
    }

    // ==================== KUISIONER ====================

    // Ambil semua pertanyaan aktif
    public function getAllPertanyaan()
    {
        return $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('kuisioner_pertanyaan')->result();
    }

    // Simpan jawaban
    public function simpanJawaban($data)
    {
        return $this->db->insert_batch('kuisioner_jawaban', $data);
    }

    // Total responden kuisioner (unik berdasarkan no_pel)
    public function getTotalResponden()
    {
        $this->db->select('COUNT(DISTINCT no_pel) as total');
        $this->db->from('kuisioner_jawaban');
        $row = $this->db->get()->row();
        return $row ? $row->total : 0;
    }

    // ==================== HITUNG IKM (PermenPANRB No.14/2017) ====================

    private function getJumlahKategori()
    {
        $result = $this->db->query("SELECT COUNT(DISTINCT kategori) as jumlah FROM kuisioner_pertanyaan WHERE aktif='1'")->row();
        return $result ? $result->jumlah : 1;
    }

    private function getBobot()
    {
        return 1 / $this->getJumlahKategori();
    }

    private function getKeteranganIKM($nilai_konversi)
    {
        if ($nilai_konversi >= 88.31) return ['mutu' => 'A', 'keterangan' => 'Sangat Baik', 'kinerja' => 'Sangat Baik'];
        if ($nilai_konversi >= 76.61) return ['mutu' => 'B', 'keterangan' => 'Baik', 'kinerja' => 'Baik'];
        if ($nilai_konversi >= 65.00) return ['mutu' => 'C', 'keterangan' => 'Kurang Baik', 'kinerja' => 'Kurang Baik'];
        return ['mutu' => 'D', 'keterangan' => 'Tidak Baik', 'kinerja' => 'Tidak Baik'];
    }

    private function hitungIKMDariData($data_kategori)
    {
        $jumlah_kategori = count($data_kategori);
        if ($jumlah_kategori == 0) return null;

        $bobot = 1 / $jumlah_kategori;
        $skor_tertimbang_total = 0;
        $hasil_per_kategori = [];

        foreach ($data_kategori as $row) {
            $rata_rata = floatval($row->rata_rata);
            $skor_tertimbang = $rata_rata * $bobot;
            $skor_tertimbang_total += $skor_tertimbang;
            $skor_konversi = $rata_rata * 25;

            $hasil_per_kategori[] = [
                'kategori' => $row->kategori,
                'rata_rata' => $rata_rata,
                'skor_konversi' => $skor_konversi,
                'bobot' => $bobot,
                'skor_tertimbang' => $skor_tertimbang,
            ];
        }

        $nilai_ikm = $skor_tertimbang_total * 25;
        $keterangan = $this->getKeteranganIKM($nilai_ikm);

        return [
            'nilai_ikm' => round($nilai_ikm, 2),
            'bobot' => round($bobot, 4),
            'skor_rata_rata' => round($skor_tertimbang_total, 4),
            'mutu' => $keterangan['mutu'],
            'keterangan' => $keterangan['keterangan'],
            'kinerja' => $keterangan['kinerja'],
            'detail_kategori' => $hasil_per_kategori,
        ];
    }

    // Hitung IKM Keseluruhan (semua data)
    public function hitungIKMKeseluruhan()
    {
        $data_kategori = $this->db->query("
            SELECT kp.kategori, AVG(kj.nilai) as rata_rata
            FROM kuisioner_jawaban kj
            JOIN kuisioner_pertanyaan kp ON kp.id = kj.id_pertanyaan
            GROUP BY kp.kategori
            ORDER BY MIN(kp.urutan) ASC
        ")->result();

        $total_responden = $this->getTotalResponden();

        $hasil = $this->hitungIKMDariData($data_kategori);
        if ($hasil) {
            $hasil['total_responden'] = $total_responden;
        }
        return $hasil;
    }

    // Hitung IKM Per Periode
    public function hitungIKMPeriode($dari, $sampai)
    {
        $data_kategori = $this->db->query("
            SELECT kp.kategori, AVG(kj.nilai) as rata_rata
            FROM kuisioner_jawaban kj
            JOIN kuisioner_pertanyaan kp ON kp.id = kj.id_pertanyaan
            WHERE DATE(kj.created_at) BETWEEN ? AND ?
            GROUP BY kp.kategori
            ORDER BY MIN(kp.urutan) ASC
        ", [$dari, $sampai])->result();

        $total_responden = $this->db->query("
            SELECT COUNT(DISTINCT no_pel) as total
            FROM kuisioner_jawaban
            WHERE DATE(created_at) BETWEEN ? AND ?
        ", [$dari, $sampai])->row()->total;

        $hasil = $this->hitungIKMDariData($data_kategori);
        if ($hasil) {
            $hasil['total_responden'] = $total_responden;
        }
        return $hasil;
    }

    // IKM per wilayah keseluruhan
    public function getIKMPerWilayahKeseluruhan()
    {
        $bobot = $this->getBobot();
        return $this->db->query("
            SELECT kj.wilayah,
                   AVG(kj.nilai) as rata_rata,
                   ROUND(AVG(kj.nilai) * 25, 2) as skor_konversi,
                   ROUND(AVG(kj.nilai) * {$bobot}, 4) as skor_tertimbang,
                   COUNT(DISTINCT kj.no_pel) as total
            FROM kuisioner_jawaban kj
            WHERE kj.wilayah IS NOT NULL
            GROUP BY kj.wilayah
            ORDER BY rata_rata DESC
        ")->result();
    }

    // IKM per wilayah per periode
    public function getIKMPerWilayahPeriode($dari, $sampai)
    {
        $bobot = $this->getBobot();
        return $this->db->query("
            SELECT kj.wilayah,
                   AVG(kj.nilai) as rata_rata,
                   ROUND(AVG(kj.nilai) * 25, 2) as skor_konversi,
                   ROUND(AVG(kj.nilai) * {$bobot}, 4) as skor_tertimbang,
                   COUNT(DISTINCT kj.no_pel) as total
            FROM kuisioner_jawaban kj
            WHERE kj.wilayah IS NOT NULL
              AND DATE(kj.created_at) BETWEEN ? AND ?
            GROUP BY kj.wilayah
            ORDER BY rata_rata DESC
        ", [$dari, $sampai])->result();
    }

    // Rata-rata per pertanyaan
    public function getRataPerPertanyaan($dari = null, $sampai = null)
    {
        if ($dari && $sampai) {
            return $this->db->query("
                SELECT kp.id, kp.kategori, kp.pertanyaan, AVG(kj.nilai) as rata_rata, COUNT(kj.nilai) as jumlah
                FROM kuisioner_jawaban kj
                JOIN kuisioner_pertanyaan kp ON kp.id = kj.id_pertanyaan
                WHERE DATE(kj.created_at) BETWEEN ? AND ?
                GROUP BY kp.id, kp.kategori, kp.pertanyaan
                ORDER BY kp.urutan ASC
            ", [$dari, $sampai])->result();
        }
        return $this->db->query("
            SELECT kp.id, kp.kategori, kp.pertanyaan, AVG(kj.nilai) as rata_rata, COUNT(kj.nilai) as jumlah
            FROM kuisioner_jawaban kj
            JOIN kuisioner_pertanyaan kp ON kp.id = kj.id_pertanyaan
            GROUP BY kp.id, kp.kategori, kp.pertanyaan
            ORDER BY kp.urutan ASC
        ")->result();
    }

    // Daftar responden (unique by no_pel)
    public function getDaftarResponden($dari = null, $sampai = null)
    {
        if ($dari && $sampai) {
            return $this->db->query("
                SELECT no_pel, nama_pelanggan, wilayah, AVG(nilai) as rata_rata, MIN(saran) as saran, MIN(created_at) as tanggal
                FROM kuisioner_jawaban
                WHERE DATE(created_at) BETWEEN ? AND ?
                GROUP BY no_pel, nama_pelanggan, wilayah
                ORDER BY tanggal DESC
            ", [$dari, $sampai])->result();
        }
        return $this->db->query("
            SELECT no_pel, nama_pelanggan, wilayah, AVG(nilai) as rata_rata, MIN(saran) as saran, MIN(created_at) as tanggal
            FROM kuisioner_jawaban
            GROUP BY no_pel, nama_pelanggan, wilayah
            ORDER BY tanggal DESC
        ")->result();
    }

    // Detail jawaban per responden
    public function getDetailResponden($no_pel)
    {
        $this->db->select('kj.no_pel, kj.nama_pelanggan, kj.wilayah, kj.created_at, kj.saran, kp.kategori, kp.pertanyaan, kj.nilai');
        $this->db->from('kuisioner_jawaban kj');
        $this->db->join('kuisioner_pertanyaan kp', 'kp.id = kj.id_pertanyaan');
        $this->db->where('kj.no_pel', $no_pel);
        $this->db->order_by('kp.urutan', 'ASC');
        return $this->db->get()->result();
    }

    // Tanggal awal data kuisioner
    public function getTanggalAwalData()
    {
        $row = $this->db->select('MIN(created_at) as tanggal')->get('kuisioner_jawaban')->row();
        return $row ? $row->tanggal : date('Y-m-d');
    }
}
