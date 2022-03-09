<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggaran extends CI_Controller
{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->model('m_history_skko'); 
    }
    public function history_skko(){
        $data['history_skko']=$this->m_history_skko->history_skko();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history_skko',$data );
        $this->load->view('templates/footer');

    }
}