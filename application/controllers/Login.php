<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    

    public function index()
    {
        $this->load->view('login');
    }

    public function cekuser()
    {
        $username = $_POST['USERNAME'];
        $password = $_POST['PASSWORD'];
        $query = $this->db->query("select * from tb_user where USERNAME='$username' and PASSWORD=('$password')");
        
        if($username != '' || $password != ''){
            if($query->num_rows() > 0){
                $row = $query->row();
                $data = array(
                    'username'  => $row->USERNAME,
                    'status'    => $row->USER_STATUS,
                    'role'      => $row->role_id
                    
                );
                $this->session->set_userdata($data);
                redirect('chart/index');
            }else{
                $this->session->set_flashdata('msg', 'non');
                redirect('login');

            }
        }else{
            $this->session->set_flashdata('msg', 'gagal');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function savedaftar(){
        
    }
}

/* End of file Login.php */
