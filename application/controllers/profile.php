<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata("status")==0){
			redirect('login');
		}
    
        
        $this->load->model('m_profile');
    }
    function index()
    {
        $data['profile'] = $this->m_profile->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('profile', $data);
        //$this->load->view('form_progress', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }
   
}
