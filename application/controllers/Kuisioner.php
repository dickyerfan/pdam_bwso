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
            $this->form_validation->set_rules('jawaban[' . $p->id . ']', $p->pertanyaan, 'required|numeric|in_list[1,2,3,4,5]');
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
        $data['title'] = 'Rekap Hasil Kuisioner Kepuasan Pelanggan';
        $data['pertanyaan'] = $this->Model_dashboard_baru->getAllPertanyaan();
        $data['responden'] = $this->Model_dashboard_baru->getDaftarResponden();
        $data['ikp_kategori'] = $this->Model_dashboard_baru->getIKPPerKategori();
        $data['ikp_keseluruhan'] = $this->Model_dashboard_baru->getIKPKeseluruhan();
        $data['ikp_wilayah'] = $this->Model_dashboard_baru->getIKPPerWilayah();
        $data['total_responden'] = $this->Model_dashboard_baru->getTotalResponden();

        // Rata-rata per pertanyaan
        $this->db->select('kp.id, kp.kategori, kp.pertanyaan, AVG(kj.nilai) as rata_rata, COUNT(kj.nilai) as jumlah');
        $this->db->from('kuisioner_jawaban kj');
        $this->db->join('kuisioner_pertanyaan kp', 'kp.id = kj.id_pertanyaan');
        $this->db->group_by('kp.id, kp.kategori, kp.pertanyaan');
        $this->db->order_by('kp.urutan', 'ASC');
        $data['rata_per_pertanyaan'] = $this->db->get()->result();

        $this->load->view('kuisioner/view_rekap_print', $data);
    }
}
