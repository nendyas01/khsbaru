<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller
{ 
    public function __construct(){ 
        parent::__construct(); 
       
        $this->load->model('M_history_skko'); 
    }
    public function history_skko(){
        $data['History_skko']=$this->M_history_skko->history_skko();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('History_skko',$data );
        $this->load->view('templates/footer');

    }

    
}