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

    // Hitung IKP (Indeks Kepuasan Pelanggan) per kategori
    public function getIKPPerKategori()
    {
        return $this->db->query("SELECT kp.kategori, AVG(kj.nilai) as rata_rata, COUNT(DISTINCT kj.no_pel) as total_responden FROM kuisioner_jawaban kj JOIN kuisioner_pertanyaan kp ON kp.id = kj.id_pertanyaan GROUP BY kp.kategori")->result();
    }

    // Hitung IKP keseluruhan
    public function getIKPKeseluruhan()
    {
        $this->db->select('AVG(nilai) as rata_rata, COUNT(DISTINCT no_pel) as total_responden');
        $this->db->from('kuisioner_jawaban');
        return $this->db->get()->row();
    }

    // IKP per wilayah
    public function getIKPPerWilayah()
    {
        return $this->db->query("SELECT wilayah, AVG(nilai) as rata_rata, COUNT(DISTINCT no_pel) as total FROM kuisioner_jawaban WHERE wilayah IS NOT NULL GROUP BY wilayah ORDER BY rata_rata DESC")->result();
    }

    // Total responden kuisioner (unik berdasarkan no_pel)
    public function getTotalResponden()
    {
        $this->db->select('COUNT(DISTINCT no_pel) as total');
        $this->db->from('kuisioner_jawaban');
        $row = $this->db->get()->row();
        return $row ? $row->total : 0;
    }

    // Jawaban per pertanyaan (untuk grafik)
    public function getJawabanPerPertanyaan()
    {
        return $this->db->query("SELECT kp.pertanyaan, kj.nilai, COUNT(*) as jumlah FROM kuisioner_jawaban kj JOIN kuisioner_pertanyaan kp ON kp.id = kj.id_pertanyaan GROUP BY kp.pertanyaan, kj.nilai ORDER BY kp.urutan, kj.nilai")->result();
    }

    // Daftar responden (unique by no_pel)
    public function getDaftarResponden()
    {
        return $this->db->query("SELECT no_pel, nama_pelanggan, wilayah, AVG(nilai) as rata_rata, MIN(saran) as saran, MIN(created_at) as tanggal FROM kuisioner_jawaban GROUP BY no_pel, nama_pelanggan, wilayah ORDER BY tanggal DESC")->result();
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
}
