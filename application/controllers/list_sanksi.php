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
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi');
        $this->load->view('templates/footer');
    }
}
