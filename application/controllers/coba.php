<?php
defined('BASEPATH') or exit('No direct script access allowed');

class coba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('coba_m');
    }

    function index()
    {
        $data['sanksi_ls'] = $this->coba_m->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('coba', $data);
        $this->load->view('templates/footer');
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['sanksi_ls'] = $this->coba_m->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('coba', $data);
        $this->load->view('templates/footer');
    }
}
