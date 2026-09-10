<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_baru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Model_dashboard_baru');
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Rekap Pengaduan & IKP';

        // Filter periode
        $mode = $this->input->get('mode', true);
        $dari = $this->input->get('dari', true);
        $sampai = $this->input->get('sampai', true);

        // Data pengaduan (selalu keseluruhan untuk chart pengaduan)
        $data['total_pengaduan'] = $this->Model_dashboard_baru->getTotalPengaduan();
        $data['pengaduan_per_upk'] = $this->Model_dashboard_baru->getPengaduanPerUpk();
        $data['pengaduan_per_jenis'] = $this->Model_dashboard_baru->getPengaduanPerJenis();
        $data['pengaduan_per_bulan'] = $this->Model_dashboard_baru->getPengaduanPerBulan();
        $data['rekap_detail_upk'] = $this->Model_dashboard_baru->getRekapDetailPerUpk();
        $data['pengaduan_terbaru'] = $this->Model_dashboard_baru->getPengaduanTerbaru(10);

        // Data kuisioner / IKM (mengikuti filter)
        if ($mode == 'periode' && $dari && $sampai) {
            $data['ikm'] = $this->Model_dashboard_baru->hitungIKMPeriode($dari, $sampai);
            $data['ikm_per_wilayah'] = $this->Model_dashboard_baru->getIKMPerWilayahPeriode($dari, $sampai);
            $data['total_responden'] = $data['ikm'] ? $data['ikm']['total_responden'] : 0;
            $data['filter_dari'] = $dari;
            $data['filter_sampai'] = $sampai;
            $data['mode'] = 'periode';
        } else {
            $data['ikm'] = $this->Model_dashboard_baru->hitungIKMKeseluruhan();
            $data['ikm_per_wilayah'] = $this->Model_dashboard_baru->getIKMPerWilayahKeseluruhan();
            $data['total_responden'] = $data['ikm'] ? $data['ikm']['total_responden'] : 0;
            $data['filter_dari'] = '';
            $data['filter_sampai'] = '';
            $data['mode'] = 'keseluruhan';
        }

        $data['tanggal_awal'] = $this->Model_dashboard_baru->getTanggalAwalData();

        // Format data untuk chart
        $data['chart_bulan_labels'] = [];
        $data['chart_bulan_data'] = [];
        foreach ($data['pengaduan_per_bulan'] as $row) {
            $data['chart_bulan_labels'][] = date('M Y', strtotime($row->bulan . '-01'));
            $data['chart_bulan_data'][] = (int) $row->total;
        }

        $data['chart_jenis_labels'] = [];
        $data['chart_jenis_data'] = [];
        foreach ($data['pengaduan_per_jenis'] as $row) {
            $data['chart_jenis_labels'][] = $row->jenis_aduan;
            $data['chart_jenis_data'][] = (int) $row->total;
        }

        $data['chart_upk_labels'] = [];
        $data['chart_upk_data'] = [];
        foreach ($data['pengaduan_per_upk'] as $row) {
            $data['chart_upk_labels'][] = $row->wil_layanan;
            $data['chart_upk_data'][] = (int) $row->total;
        }

        // Template
        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('view_dashboard_rekap', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
            $this->load->view('view_dashboard_rekap', $data);
            $this->load->view('templates/pengguna/footer');
        }
    }

    public function kuisioner_list()
    {
        $data['title'] = 'Daftar Responden Kuisioner';

        $mode = $this->input->get('mode', true);
        $dari = $this->input->get('dari', true);
        $sampai = $this->input->get('sampai', true);

        if ($mode == 'periode' && $dari && $sampai) {
            $data['ikm'] = $this->Model_dashboard_baru->hitungIKMPeriode($dari, $sampai);
            $data['responden'] = $this->Model_dashboard_baru->getDaftarResponden($dari, $sampai);
            $data['filter_dari'] = $dari;
            $data['filter_sampai'] = $sampai;
            $data['mode'] = 'periode';
        } else {
            $data['ikm'] = $this->Model_dashboard_baru->hitungIKMKeseluruhan();
            $data['responden'] = $this->Model_dashboard_baru->getDaftarResponden();
            $data['filter_dari'] = '';
            $data['filter_sampai'] = '';
            $data['mode'] = 'keseluruhan';
        }

        $data['tanggal_awal'] = $this->Model_dashboard_baru->getTanggalAwalData();

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('view_kuisioner_list', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
            $this->load->view('view_kuisioner_list', $data);
            $this->load->view('templates/pengguna/footer');
        }
    }

    public function kuisioner_detail($no_pel)
    {
        $data['title'] = 'Detail Jawaban Kuisioner';
        $data['detail'] = $this->Model_dashboard_baru->getDetailResponden($no_pel);
        $data['no_pel'] = $no_pel;

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('view_kuisioner_detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
            $this->load->view('view_kuisioner_detail', $data);
            $this->load->view('templates/pengguna/footer');
        }
    }
}
