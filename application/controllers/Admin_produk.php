<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('model_produk');
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

    public function index()
    {
        $data['title'] = 'Kelola Produk Ijen Water';
        $data['produk'] = $this->model_produk->getAll();
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/produk/view_list', $data);
        $this->loadFooter();
    }

    public function tambah()
    {
        if (!$this->isAdmin()) redirect('admin_produk');
        $data['title'] = 'Tambah Produk';
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/produk/view_form', $data);
        $this->loadFooter();
    }

    public function simpan()
    {
        if (!$this->isAdmin()) redirect('admin_produk');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('modal_id', 'Modal ID', 'required|trim|alpha_dash');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_produk/tambah');
        } else {
            $gambar = '';
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/img/ijenWater/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin_produk/tambah');
                }
            }
            $data = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'harga' => $this->input->post('harga', true),
                'gambar' => $gambar,
                'modal_id' => $this->input->post('modal_id', true),
                'urutan' => $this->input->post('urutan', true),
                'aktif' => '1'
            ];
            $this->model_produk->insert($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
            redirect('admin_produk');
        }
    }

    public function edit($id)
    {
        if (!$this->isAdmin()) redirect('admin_produk');
        $data['title'] = 'Edit Produk';
        $data['produk'] = $this->model_produk->getById($id);
        $data['is_admin'] = $this->isAdmin();
        if (empty($data['produk'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_produk');
        }
        $this->loadTemplate($data);
        $this->load->view('admin/produk/view_form', $data);
        $this->loadFooter();
    }

    public function update($id)
    {
        if (!$this->isAdmin()) redirect('admin_produk');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('modal_id', 'Modal ID', 'required|trim|alpha_dash');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_produk/edit/' . $id);
        } else {
            $data_update = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'harga' => $this->input->post('harga', true),
                'modal_id' => $this->input->post('modal_id', true),
                'urutan' => $this->input->post('urutan', true)
            ];
            if (!empty($_FILES['gambar']['name'])) {
                $produk_lama = $this->model_produk->getById($id);
                if ($produk_lama && $produk_lama->gambar) {
                    $gambar_lama = './assets/img/ijenWater/' . $produk_lama->gambar;
                    if (file_exists($gambar_lama)) unlink($gambar_lama);
                }
                $config['upload_path'] = './assets/img/ijenWater/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data_update['gambar'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin_produk/edit/' . $id);
                }
            }
            $this->model_produk->update($id, $data_update);
            $this->session->set_flashdata('success', 'Produk berhasil diupdate!');
            redirect('admin_produk');
        }
    }

    public function hapus($id)
    {
        if (!$this->isAdmin()) redirect('admin_produk');
        $this->model_produk->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        redirect('admin_produk');
    }
}
