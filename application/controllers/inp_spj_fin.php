<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inp_spj_fin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_spj_fin');
    }
    function index()
    {
        $data['skk'] = $this->m_inp_spj_fin->getdata();
        $data['jenis_paket'] = $this->m_inp_spj_fin->getpaket();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_spj_fin', $data);
        $this->load->view('templates/footer');
    }
}
