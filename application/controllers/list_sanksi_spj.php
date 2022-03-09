<?php
defined('BASEPATH') or exit('No direct script access allowed');

class list_sanksi_spj extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_list_sanksi_spj');
    }

    function index()
    {
        $data['list_sanksi_spj'] = $this->m_list_pelanggaran->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi_spj', $data);
        //$this->load->view('form_progress', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['list_sanksi_spj'] = $this->m_list_pelanggaran->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi_spj', $data);
        $this->load->view('templates/footer');
    }
}
