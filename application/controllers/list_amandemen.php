<?php

class List_amandemen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_list_amandemen');
    }
    function index()
    {
        $data['List_amandemen'] = $this->M_list_amandemen->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('List_amandemen', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }
    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['List_amandemen'] = $this->M_list_amandemen->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('List_amandemen', $data);
        $this->load->view('templates/footer');
    }
}
