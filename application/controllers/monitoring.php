<?php


class monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_monitoring');
    }

    public function index()
    {
        $data['monitoring'] = $this->m_monitoring->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('monitoring', $data);
        $this->load->view('templates/footer');
    }
}
