<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Model_dashboard_baru');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kuisioner Kepuasan Pelanggan';
        $data['pertanyaan'] = $this->Model_dashboard_baru->getAllPertanyaan();
        $this->load->view('templates/publik/header', $data);
        $this->load->view('kuisioner/view_kuisioner', $data);
        $this->load->view('templates/publik/footer');
    }

    public function submit()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_pel', 'No Pelanggan', 'required|trim|numeric|exact_length[8]');
        $this->form_validation->set_rules('wilayah', 'Wilayah Pelayanan', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');
        $this->form_validation->set_message('exact_length', '{field} harus tepat {param} digit');

        // Validasi setiap pertanyaan
        $pertanyaan = $this->Model_dashboard_baru->getAllPertanyaan();
        foreach ($pertanyaan as $p) {
            $this->form_validation->set_rules('jawaban[' . $p->id . ']', $p->pertanyaan, 'required|numeric|in_list[1,2,3,4]');
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kuisioner Kepuasan Pelanggan';
            $data['pertanyaan'] = $pertanyaan;
            $this->load->view('templates/publik/header', $data);
            $this->load->view('kuisioner/view_kuisioner', $data);
            $this->load->view('templates/publik/footer');
        } else {
            $nama = $this->input->post('nama_pelanggan', true);
            $no_pel = $this->input->post('no_pel', true);
            $wilayah = $this->input->post('wilayah', true);
            $saran = $this->input->post('saran', true);

            // Cek apakah no_pel sudah pernah mengisi kuisioner
            $sudah_ada = $this->db->where('no_pel', $no_pel)->count_all_results('kuisioner_jawaban');
            if ($sudah_ada > 0) {
                $this->session->set_flashdata('error', 'No Pelanggan ' . $no_pel . ' sudah pernah mengisi kuisioner. Tidak bisa mengisi ulang.');
                redirect('kuisioner');
                return;
            }

            $jawaban_input = $this->input->post('jawaban', true);

            date_default_timezone_set('Asia/Jakarta');
            $data_insert = [];
            foreach ($jawaban_input as $id_pertanyaan => $nilai) {
                $data_insert[] = [
                    'id_pertanyaan' => $id_pertanyaan,
                    'nama_pelanggan' => $nama,
                    'no_pel' => $no_pel,
                    'wilayah' => $wilayah,
                    'nilai' => $nilai,
                    'saran' => $saran,
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }

            $this->Model_dashboard_baru->simpanJawaban($data_insert);

            $this->session->set_flashdata('success', 'Terima kasih! Jawaban Anda telah berhasil disimpan.');
            redirect('kuisioner');
        }
    }

    public function rekap()
    {
        $dari = $this->input->get('dari', true);
        $sampai = $this->input->get('sampai', true);
        $mode = $this->input->get('mode', true);

        if ($mode == 'periode' && $dari && $sampai) {
            $data['ikm'] = $this->Model_dashboard_baru->hitungIKMPeriode($dari, $sampai);
            $data['ikm_per_wilayah'] = $this->Model_dashboard_baru->getIKMPerWilayahPeriode($dari, $sampai);
            $data['responden'] = $this->Model_dashboard_baru->getDaftarResponden($dari, $sampai);
            $data['rata_per_pertanyaan'] = $this->Model_dashboard_baru->getRataPerPertanyaan($dari, $sampai);
            $data['filter_dari'] = $dari;
            $data['filter_sampai'] = $sampai;
            $data['mode'] = 'periode';
        } else {
            $data['ikm'] = $this->Model_dashboard_baru->hitungIKMKeseluruhan();
            $data['ikm_per_wilayah'] = $this->Model_dashboard_baru->getIKMPerWilayahKeseluruhan();
            $data['responden'] = $this->Model_dashboard_baru->getDaftarResponden();
            $data['rata_per_pertanyaan'] = $this->Model_dashboard_baru->getRataPerPertanyaan();
            $data['filter_dari'] = '';
            $data['filter_sampai'] = '';
            $data['mode'] = 'keseluruhan';
        }

        $data['title'] = 'Rekap Hasil Kuisioner Kepuasan Pelanggan';
        $data['tanggal_awal'] = $this->Model_dashboard_baru->getTanggalAwalData();
        $this->load->view('kuisioner/view_rekap_print', $data);
    }
}
