<?php
class Icon extends CI_Controller {

    public function index(){
        $this->load->model('m_user');
        $data['user']=$this->m_user->get_data();

        $this->load->view('v_user', $data);
    }
}

?>