<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kapasitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kapasitas');
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

    // ==================== UPK ====================

    public function index()
    {
        $data['title'] = 'Kelola Kapasitas Produksi';
        $data['upk'] = $this->model_kapasitas->getAllUpk();
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/kapasitas/view_list_upk', $data);
        $this->loadFooter();
    }

    public function tambahUpk()
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $data['title'] = 'Tambah UPK';
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/kapasitas/view_form_upk', $data);
        $this->loadFooter();
    }

    public function simpanUpk()
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_rules('modal_id', 'Modal ID', 'required|trim|alpha_dash');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_kapasitas/tambahUpk');
        } else {
            $data = [
                'nama_upk' => $this->input->post('nama_upk', true),
                'modal_id' => $this->input->post('modal_id', true),
                'urutan' => $this->input->post('urutan', true),
                'aktif' => '1'
            ];
            $this->model_kapasitas->insertUpk($data);
            $this->session->set_flashdata('success', 'UPK berhasil ditambahkan!');
            redirect('admin_kapasitas');
        }
    }

    public function editUpk($id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $data['title'] = 'Edit UPK';
        $data['upk'] = $this->model_kapasitas->getUpkById($id);
        $data['is_admin'] = $this->isAdmin();
        if (empty($data['upk'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_kapasitas');
        }
        $this->loadTemplate($data);
        $this->load->view('admin/kapasitas/view_form_upk', $data);
        $this->loadFooter();
    }

    public function updateUpk($id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_rules('modal_id', 'Modal ID', 'required|trim|alpha_dash');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_kapasitas/editUpk/' . $id);
        } else {
            $data = [
                'nama_upk' => $this->input->post('nama_upk', true),
                'modal_id' => $this->input->post('modal_id', true),
                'urutan' => $this->input->post('urutan', true)
            ];
            $this->model_kapasitas->updateUpk($id, $data);
            $this->session->set_flashdata('success', 'UPK berhasil diupdate!');
            redirect('admin_kapasitas');
        }
    }

    public function hapusUpk($id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $this->model_kapasitas->deleteUpk($id);
        $this->session->set_flashdata('success', 'UPK berhasil dihapus!');
        redirect('admin_kapasitas');
    }

    // ==================== DETAIL ====================

    public function detail($upk_id)
    {
        $data['title'] = 'Detail Kapasitas';
        $data['upk'] = $this->model_kapasitas->getUpkById($upk_id);
        $data['details'] = $this->model_kapasitas->getDetailByUpk($upk_id);
        $data['is_admin'] = $this->isAdmin();
        if (empty($data['upk'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_kapasitas');
        }
        $this->loadTemplate($data);
        $this->load->view('admin/kapasitas/view_list_detail', $data);
        $this->loadFooter();
    }

    public function tambahDetail($upk_id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $data['title'] = 'Tambah Detail Kapasitas';
        $data['upk'] = $this->model_kapasitas->getUpkById($upk_id);
        $data['upk_id'] = $upk_id;
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/kapasitas/view_form_detail', $data);
        $this->loadFooter();
    }

    public function simpanDetail()
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('lps', 'LPS', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_kapasitas/tambahDetail/' . $this->input->post('upk_id'));
        } else {
            $data = [
                'upk_id' => $this->input->post('upk_id', true),
                'lokasi' => $this->input->post('lokasi', true),
                'lps' => $this->input->post('lps', true),
                'aktif' => '1'
            ];
            $this->model_kapasitas->insertDetail($data);
            $this->session->set_flashdata('success', 'Detail berhasil ditambahkan!');
            redirect('admin_kapasitas/detail/' . $this->input->post('upk_id'));
        }
    }

    public function editDetail($id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $data['title'] = 'Edit Detail Kapasitas';
        $data['detail'] = $this->model_kapasitas->getDetailById($id);
        $data['upk'] = $this->model_kapasitas->getUpkById($data['detail']->upk_id);
        $data['is_admin'] = $this->isAdmin();
        if (empty($data['detail'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_kapasitas');
        }
        $this->loadTemplate($data);
        $this->load->view('admin/kapasitas/view_form_detail', $data);
        $this->loadFooter();
    }

    public function updateDetail($id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('lps', 'LPS', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_kapasitas/editDetail/' . $id);
        } else {
            $data = [
                'lokasi' => $this->input->post('lokasi', true),
                'lps' => $this->input->post('lps', true)
            ];
            $this->model_kapasitas->updateDetail($id, $data);
            $upk_id = $this->input->post('upk_id', true);
            $this->session->set_flashdata('success', 'Detail berhasil diupdate!');
            redirect('admin_kapasitas/detail/' . $upk_id);
        }
    }

    public function hapusDetail($id)
    {
        if (!$this->isAdmin()) redirect('admin_kapasitas');
        $detail = $this->model_kapasitas->getDetailById($id);
        $upk_id = $detail->upk_id;
        $this->model_kapasitas->deleteDetail($id);
        $this->session->set_flashdata('success', 'Detail berhasil dihapus!');
        redirect('admin_kapasitas/detail/' . $upk_id);
    }
}
