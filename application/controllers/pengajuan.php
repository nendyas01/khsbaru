<?php


class pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengajuan');
    }

    public function index()
    {
        $data['nomorspj'] = $this->m_pengajuan->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengajuan', $data);
        $this->load->view('templates/footer');
    }
}
