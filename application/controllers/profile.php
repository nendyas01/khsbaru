<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata("status")==0){
			redirect('login');
		}
    
        
        $this->load->model('M_profile');
    }
    function index()
    {
        $data['Profile'] = $this->M_profile->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Profile', $data);
        //$this->load->view('form_progress', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }
   
}
