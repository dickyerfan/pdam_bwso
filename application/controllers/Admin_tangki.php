<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_tangki extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_tangki');
        $this->load->library('form_validation');
    }

    private function isAdmin()
    {
        return $this->session->userdata('level') == 'Admin';
    }

    private function loadTemplate($data)
    {
        if ($this->isAdmin()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
        } else {
            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
        }
    }

    private function loadFooter()
    {
        if ($this->isAdmin()) {
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/pengguna/footer');
        }
    }

    // ==================== KONTAK ====================

    public function index()
    {
        $data['title'] = 'Kelola Tangki Air';
        $data['kontak'] = $this->model_tangki->getAllKontak();
        $data['tarif'] = $this->model_tangki->getAllTarif();
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/tangki/view_list', $data);
        $this->loadFooter();
    }

    // ==================== KONTAK CRUD ====================

    public function tambahKontak()
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $data['title'] = 'Tambah Kontak Person';
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/tangki/view_form_kontak', $data);
        $this->loadFooter();
    }

    public function simpanKontak()
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_tangki/tambahKontak');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'no_hp' => $this->input->post('no_hp', true),
                'urutan' => $this->input->post('urutan', true),
                'aktif' => '1'
            ];
            $this->model_tangki->insertKontak($data);
            $this->session->set_flashdata('success', 'Kontak berhasil ditambahkan!');
            redirect('admin_tangki');
        }
    }

    public function editKontak($id)
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $data['title'] = 'Edit Kontak Person';
        $data['kontak'] = $this->model_tangki->getKontakById($id);
        $data['is_admin'] = $this->isAdmin();
        if (empty($data['kontak'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_tangki');
        }
        $this->loadTemplate($data);
        $this->load->view('admin/tangki/view_form_kontak', $data);
        $this->loadFooter();
    }

    public function updateKontak($id)
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_tangki/editKontak/' . $id);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'no_hp' => $this->input->post('no_hp', true),
                'urutan' => $this->input->post('urutan', true)
            ];
            $this->model_tangki->updateKontak($id, $data);
            $this->session->set_flashdata('success', 'Kontak berhasil diupdate!');
            redirect('admin_tangki');
        }
    }

    public function hapusKontak($id)
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $this->model_tangki->deleteKontak($id);
        $this->session->set_flashdata('success', 'Kontak berhasil dihapus!');
        redirect('admin_tangki');
    }

    // ==================== TARIF CRUD ====================

    public function tambahTarif()
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $data['title'] = 'Tambah Tarif Tangki';
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/tangki/view_form_tarif', $data);
        $this->loadFooter();
    }

    public function simpanTarif()
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $this->form_validation->set_rules('nama_tarif', 'Nama Tarif', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_tangki/tambahTarif');
        } else {
            $data = [
                'nama_tarif' => $this->input->post('nama_tarif', true),
                'harga' => $this->input->post('harga', true),
                'urutan' => $this->input->post('urutan', true),
                'aktif' => '1'
            ];
            $this->model_tangki->insertTarif($data);
            $this->session->set_flashdata('success', 'Tarif berhasil ditambahkan!');
            redirect('admin_tangki');
        }
    }

    public function editTarif($id)
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $data['title'] = 'Edit Tarif Tangki';
        $data['tarif'] = $this->model_tangki->getTarifById($id);
        $data['is_admin'] = $this->isAdmin();
        if (empty($data['tarif'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_tangki');
        }
        $this->loadTemplate($data);
        $this->load->view('admin/tangki/view_form_tarif', $data);
        $this->loadFooter();
    }

    public function updateTarif($id)
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $this->form_validation->set_rules('nama_tarif', 'Nama Tarif', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_tangki/editTarif/' . $id);
        } else {
            $data = [
                'nama_tarif' => $this->input->post('nama_tarif', true),
                'harga' => $this->input->post('harga', true),
                'urutan' => $this->input->post('urutan', true)
            ];
            $this->model_tangki->updateTarif($id, $data);
            $this->session->set_flashdata('success', 'Tarif berhasil diupdate!');
            redirect('admin_tangki');
        }
    }

    public function hapusTarif($id)
    {
        if (!$this->isAdmin()) redirect('admin_tangki');
        $this->model_tangki->deleteTarif($id);
        $this->session->set_flashdata('success', 'Tarif berhasil dihapus!');
        redirect('admin_tangki');
    }
}
