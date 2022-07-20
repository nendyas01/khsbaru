<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_sanksi_spj extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_list_sanksi_spj');
    }

    function index()
    {
        $data['sanksi_ls'] = $this->M_list_sanksi_spj->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi_spj', $data);
        $this->load->view('templates/footer');
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['sanksi_ls'] = $this->coba_m->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi_spj', $data);
        $this->load->view('templates/footer');
    }
}
