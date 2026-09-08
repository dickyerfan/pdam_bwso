<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_dashboard');
        // $this->load->library('form_validation');
        // if ($this->session->userdata('level') != 'Pengguna') {
        //     redirect('publik');
        // }
    }

    public function index()
    {
        $urls = [
            'direktur' => 'http://36.67.227.244/api_pegawai_dashboard/get_direktur',
            'spi' => 'http://36.67.227.244/api_pegawai_dashboard/get_spi',
            'langganan' => 'http://36.67.227.244/api_pegawai_dashboard/get_langganan',
            'umum' => 'http://36.67.227.244/api_pegawai_dashboard/get_umum',
            'keuangan' => 'http://36.67.227.244/api_pegawai_dashboard/get_keuangan',
            'perencanaan' => 'http://36.67.227.244/api_pegawai_dashboard/get_perencanaan',
            'pemeliharaan' => 'http://36.67.227.244/api_pegawai_dashboard/get_pemeliharaan',
            'bondowoso' => 'http://36.67.227.244/api_pegawai_dashboard/get_bondowoso',
            'sukosari_1' => 'http://36.67.227.244/api_pegawai_dashboard/get_sukosari_1',
            'maesan' => 'http://36.67.227.244/api_pegawai_dashboard/get_maesan',
            'tegalampel' => 'http://36.67.227.244/api_pegawai_dashboard/get_tegalampel',
            'tapen' => 'http://36.67.227.244/api_pegawai_dashboard/get_tapen',
            'prajekan' => 'http://36.67.227.244/api_pegawai_dashboard/get_prajekan',
            'tlogosari' => 'http://36.67.227.244/api_pegawai_dashboard/get_tlogosari',
            'wringin' => 'http://36.67.227.244/api_pegawai_dashboard/get_wringin',
            'curahdami' => 'http://36.67.227.244/api_pegawai_dashboard/get_curahdami',
            'tamanan' => 'http://36.67.227.244/api_pegawai_dashboard/get_tamanan',
            'tenggarang' => 'http://36.67.227.244/api_pegawai_dashboard/get_tenggarang',
            'tamankrocok' => 'http://36.67.227.244/api_pegawai_dashboard/get_tamankrocok',
            'wonosari' => 'http://36.67.227.244/api_pegawai_dashboard/get_wonosari',
            'sukosari_2' => 'http://36.67.227.244/api_pegawai_dashboard/get_sukosari_2',
            'amdk' => 'http://36.67.227.244/api_pegawai_dashboard/get_amdk'
        ];
        $data = [];
        foreach ($urls as $key => $url) {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                show_error('Error fetching data from API for ' . $key);
            }
            $data[$key] = json_decode($response, true);
        }
        $data['title'] = 'Dashboard';
        $this->load->view('templates/pengguna/header', $data);
        $this->load->view('templates/pengguna/navbar');
        $this->load->view('templates/pengguna/sidebar');
        $this->load->view('view_pengguna', $data);
        $this->load->view('templates/pengguna/footer');
    }
}
