<?php

class list_amandemen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_list_amandemen');
    }
    function index()
    {
        $data['list_amandemen'] = $this->m_list_amandemen->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_amandemen', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }
    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['list_amandemen'] = $this->m_list_amandemen->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_amandemen', $data);
        $this->load->view('templates/footer');
    }
}
