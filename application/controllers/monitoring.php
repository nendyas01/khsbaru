<?php


class Monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("status") == 0) {
            redirect('login');
        }

        $this->load->model('M_monitoring');
    }

    public function index()
    {
        $data['Monitoring'] = $this->M_monitoring->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Monitoring', $data);
        $this->load->view('templates/footer');
    }
}
