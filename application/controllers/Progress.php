<?php
defined('BASEPATH') or exit('No direct script access allowed');

class progress extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_progress');
    }
    function index()
    {
        $data['progress'] = $this->m_progress->tampil_data();
        $data['areaspj'] = $this->m_progress->getarea();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('progress', $data);
        //$this->load->view('form_progress', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }
    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['progress'] = $this->m_progress->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('progress', $data);
        $this->load->view('templates/footer');
    }

    function tambah1()
    {
        //$data['progress'] = $this->m_progress->tambah;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_progres_kerja');
        $this->load->view('templates/footer');
    }
}
