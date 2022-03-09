<?php
defined('BASEPATH') or exit('No direct script access allowed');

class approve_pelanggaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_approve_pelanggaran');
    }

    function index()
    {
        $data['approve_pelanggaran'] = $this->m_approve_pelanggaran->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('approve_pelanggaran', $data);
        //$this->load->view('form_progress', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['approve_pelanggaran'] = $this->m_approve_pelanggaran->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('approve_pelanggaran', $data);
        $this->load->view('templates/footer');
    }
}
