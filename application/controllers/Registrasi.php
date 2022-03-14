<?php
defined('BASEPATH') or exit('No direct script access allowed');
class registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_registrasi');
        $this->load->library('form_validation');
    }

   

    public function index()
    {
        $data['role'] = $this->m_registrasi->getrole();
        $data['nama_area'] = $this->m_registrasi->getarea();
        $this->load->view('Registrasi', $data);
    }

    public function savedaftar()
    {
        $data = [
            'USERNAME' => $this->input->post('USERNAME'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_nama'),
            'jabatan' => $this->input->post('jabatan'),
            'AREA_KODE' => $this->input->post('AREA_KODE'),
        ];

        $q = $this->db->insert('tb_user', $data);
        if($q == false){
            // redirect('registrasi');
            echo false;
        }else{
            echo true;

        }
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Kamu berhasil melakukan registrasi. Silahkan Login</div>');
    }
    
}
