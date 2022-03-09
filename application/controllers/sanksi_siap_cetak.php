<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sanksi_siap_cetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_sanksi_siap_cetak');
    }

    function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sanksi_siap_cetak');
        $this->load->view('templates/footer');
    }
}
