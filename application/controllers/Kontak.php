<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Kontak';
        $this->load->view('templates/publik/header', $data);
        $this->load->view('view_kontak', $data);
        $this->load->view('templates/publik/footer');
    }

    public function kontak()
    {
        $data['title'] = 'Kontak';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('message', 'pesan', 'required|trim');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('valid_email', '%s harus sesuai format email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/publik/header', $data);
            $this->load->view('view_kontak', $data);
            $this->load->view('templates/publik/footer');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses,</strong> Komentar Berhasil di simpan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
            );
            $data['kontak'] = $this->model_dashboard->tambahData();
            redirect('fitur/kontak');
        }
    }
}
