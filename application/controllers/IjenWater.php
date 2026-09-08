<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IjenWater extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
        $this->load->model('model_upk');
        $this->load->model('model_produk');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        
        // Ambil nomor Ijen Water dari no_pengaduan_upk
        $ijen = $this->db->where('nama_upk', 'Ijen Water (AMDK)')->get('no_pengaduan_upk')->row();
        $data['no_wa_ijen'] = '';
        if ($ijen) {
            $data['no_wa_ijen'] = $ijen->no_wa;
        }
        
        // Ambil data produk
        $data['produk_list'] = $this->model_produk->getAll();
        
        $this->load->view('templates/ijenWater/header', $data);
        $this->load->view('view_ijenWater', $data);
        $this->load->view('templates/ijenWater/footer');
    }
}
