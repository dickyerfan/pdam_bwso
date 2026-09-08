<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_upk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('model_upk');
        $this->load->library('form_validation');
    }

    // Cek level user
    private function isAdmin()
    {
        return $this->session->userdata('level') == 'Admin';
    }

    // Load template sesuai level
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

    // Halaman utama - List data
    public function index()
    {
        $data['title'] = 'No Pengaduan UPK';
        $data['upk'] = $this->model_upk->getAllUpk();
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/upk/view_list', $data);
        $this->loadFooter();
    }

    // Form tambah data (admin only)
    public function tambah()
    {
        // if (!$this->isAdmin()) {
        //     redirect('admin_upk');
        // }
        $data['title'] = 'Tambah No Pengaduan UPK';
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/upk/view_form', $data);
        $this->loadFooter();
    }

    // Proses simpan data (admin only)
    public function simpan()
    {
        // if (!$this->isAdmin()) {
        //     redirect('admin_upk');
        // }
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'No WhatsApp', 'required|trim|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('numeric', '%s harus berupa angka');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_upk/tambah');
        } else {
            $data = [
                'nama_upk' => $this->input->post('nama_upk', true),
                'nama_kepala' => $this->input->post('nama_kepala', true),
                'no_wa' => $this->input->post('no_wa', true),
                'aktif' => '1'
            ];

            $this->model_upk->insertUpk($data);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
            redirect('admin_upk');
        }
    }

    // Form edit data (admin only)
    public function edit($id)
    {
        // if (!$this->isAdmin()) {
        //     redirect('admin_upk');
        // }
        $data['title'] = 'Edit No Pengaduan UPK';
        $data['upk'] = $this->model_upk->getUpkById($id);
        $data['is_admin'] = $this->isAdmin();

        if (empty($data['upk'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_upk');
        }

        $this->loadTemplate($data);
        $this->load->view('admin/upk/view_form', $data);
        $this->loadFooter();
    }

    // Proses update data (admin only)
    public function update($id)
    {
        // if (!$this->isAdmin()) {
        //     redirect('admin_upk');
        // }
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'No WhatsApp', 'required|trim|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('numeric', '%s harus berupa angka');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_upk/edit/' . $id);
        } else {
            $data = [
                'nama_upk' => $this->input->post('nama_upk', true),
                'nama_kepala' => $this->input->post('nama_kepala', true),
                'no_wa' => $this->input->post('no_wa', true)
            ];

            $this->model_upk->updateUpk($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil diupdate!');
            redirect('admin_upk');
        }
    }

    // Hapus data (admin only)
    public function hapus($id)
    {
        // if (!$this->isAdmin()) {
        //     redirect('admin_upk');
        // }
        $this->model_upk->deleteUpk($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('admin_upk');
    }
}
