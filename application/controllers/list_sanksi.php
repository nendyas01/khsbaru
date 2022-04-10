<?php
defined('BASEPATH') or exit('No direct script access allowed');

class list_sanksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_list_sanksi');
       
    }

    function index()
    {
        $data['list_sanksi'] = $this->m_list_sanksi->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi', $data);
        $this->load->view('templates/footer');
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['list_sanksi'] = $this->m_list_sanksi->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi', $data);
        $this->load->view('templates/footer');
    }
}
