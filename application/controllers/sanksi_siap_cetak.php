<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sanksi_siap_cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
     
        if($this->session->userdata("status")==0){
			redirect('login');
		}
    
        $this->load->model('m_sanksi_siap_cetak');
    }

    function index()
    {
        $data['trans_sanksi'] = $this->m_sanksi_siap_cetak->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sanksi_siap_cetak', $data);
        $this->load->view('templates/footer');
    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['trans_sanksi'] = $this->m_sanksi_siap_cetak->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sanksi_siap_cetak', $data);
        $this->load->view('templates/footer');
    }
}
