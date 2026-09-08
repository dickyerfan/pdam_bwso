<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('model_carousel');
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
        $data['title'] = 'Kelola Carousel';
        $data['carousel'] = $this->model_carousel->getAll();
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/carousel/view_list', $data);
        $this->loadFooter();
    }

    // Form tambah data (admin only)
    public function tambah()
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        $data['title'] = 'Tambah Carousel';
        $data['is_admin'] = $this->isAdmin();
        $this->loadTemplate($data);
        $this->load->view('admin/carousel/view_form', $data);
        $this->loadFooter();
    }

    // Proses simpan data (admin only)
    public function simpan()
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|in_list[hero,modal]');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('numeric', '%s harus berupa angka');
        $this->form_validation->set_message('in_list', '%s harus hero atau modal');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_carousel/tambah');
        } else {
            // Upload gambar
            $config['upload_path'] = './assets/img/hero-carousel/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 5120; // 5MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin_carousel/tambah');
            } else {
                $upload_data = $this->upload->data();
                $link = $this->input->post('link', true);
                $data = [
                    'gambar' => $upload_data['file_name'],
                    'judul' => $this->input->post('judul', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'link' => !empty($link) ? $link : null,
                    'tipe' => $this->input->post('tipe', true),
                    'urutan' => $this->input->post('urutan', true),
                    'aktif' => '1'
                ];

                $this->model_carousel->insert($data);
                $this->session->set_flashdata('success', 'Carousel berhasil ditambahkan!');
                redirect('admin_carousel');
            }
        }
    }

    // Form edit data (admin only)
    public function edit($id)
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        $data['title'] = 'Edit Carousel';
        $data['carousel'] = $this->model_carousel->getById($id);
        $data['is_admin'] = $this->isAdmin();

        if (empty($data['carousel'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin_carousel');
        }

        $this->loadTemplate($data);
        $this->load->view('admin/carousel/view_form', $data);
        $this->loadFooter();
    }

    // Proses update data (admin only)
    public function update($id)
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|in_list[hero,modal]');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('numeric', '%s harus berupa angka');
        $this->form_validation->set_message('in_list', '%s harus hero atau modal');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin_carousel/edit/' . $id);
        } else {
            $link = $this->input->post('link', true);
            $data_update = [
                'judul' => $this->input->post('judul', true),
                'keterangan' => $this->input->post('keterangan', true),
                'link' => !empty($link) ? $link : null,
                'tipe' => $this->input->post('tipe', true),
                'urutan' => $this->input->post('urutan', true)
            ];

            // Jika ada gambar baru, upload dan update
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/img/hero-carousel/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    // Hapus gambar lama
                    $carousel_lama = $this->model_carousel->getById($id);
                    $gambar_lama = './assets/img/hero-carousel/' . $carousel_lama->gambar;
                    if (file_exists($gambar_lama)) {
                        unlink($gambar_lama);
                    }

                    $upload_data = $this->upload->data();
                    $data_update['gambar'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin_carousel/edit/' . $id);
                }
            }

            $this->model_carousel->update($id, $data_update);
            $this->session->set_flashdata('success', 'Carousel berhasil diupdate!');
            redirect('admin_carousel');
        }
    }

    // Nonaktifkan carousel (admin only)
    public function nonaktifkan($id)
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        $this->model_carousel->nonaktifkan($id);
        $this->session->set_flashdata('success', 'Carousel berhasil dinonaktifkan!');
        redirect('admin_carousel');
    }

    // Aktifkan carousel (admin only)
    public function aktifkan($id)
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        $this->model_carousel->aktifkan($id);
        $this->session->set_flashdata('success', 'Carousel berhasil diaktifkan!');
        redirect('admin_carousel');
    }

    // Hapus permanen (admin only)
    public function hapus($id)
    {
        if (!$this->isAdmin()) {
            redirect('admin_carousel');
        }
        // Hapus file gambar
        $carousel = $this->model_carousel->getById($id);
        if ($carousel) {
            $gambar_path = './assets/img/hero-carousel/' . $carousel->gambar;
            if (file_exists($gambar_path)) {
                unlink($gambar_path);
            }
            $this->model_carousel->deletePermanent($id);
        }

        $this->session->set_flashdata('success', 'Carousel berhasil dihapus permanen!');
        redirect('admin_carousel');
    }
}
