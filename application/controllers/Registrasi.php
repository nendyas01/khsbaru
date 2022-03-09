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
            'PASSWORD' => md5($this->input->post('PASSWORD')),
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
    // public function yanglama()
    // {
    //     $this->form_validation->set_rules('USERNAME', 'username', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    //     $this->form_validation->set_rules('PASSWORD', 'password', 'required|trim|min_length[3]');
    //     $this->form_validation->set_rules('role_nama', 'Role_nama', 'required|trim');
    //     $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
    //     $this->form_validation->set_rules('AREA_KODE', 'area_kode', 'required|trim');

    //     //$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['role'] = $this->m_registrasi->getrole();
    //         $data['nama_area'] = $this->m_registrasi->getarea();
    //         $this->load->view('Registrasi', $data);
    //     } else {
    //         $data = [
    //             'USERNAME' => $this->input->post('USERNAME'),
    //             'email' => $this->input->post('email'),
    //             'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //             'role_id' => $this->input->post('role_nama'),
    //             'jabatan' => $this->input->post('jabatan'),
    //             'AREA_KODE' => $this->input->post('AREA_KODE'),
    //         ];

    //         $this->db->insert('tb_user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Kamu berhasil melakukan registrasi. Silahkan Login</div>');
    //         redirect('login');
    //     }
    // }
}
