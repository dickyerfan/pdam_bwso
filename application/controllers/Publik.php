<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
        $this->load->model('model_carousel');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Beranda';
        $data['carousel'] = $this->model_carousel->getActiveByTipe('hero');
        $data['modal_carousel'] = $this->model_carousel->getActiveByTipe('modal');
        $this->load->view('templates/publik/header', $data);
        $this->load->view('view_publik', $data);
        $this->load->view('templates/publik/footer');
    }
}
