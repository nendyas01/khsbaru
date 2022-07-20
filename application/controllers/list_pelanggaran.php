<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_pelanggaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_list_pelanggaran');
    }

    function index()
    {
        $data['list_pelanggaran'] = $this->M_list_pelanggaran->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_pelanggaran', $data);
        //$this->load->view('form_progress', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['list_pelanggaran'] = $this->M_list_pelanggaran->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_pelanggaran', $data);
        $this->load->view('templates/footer');
    }
}
