<?php

class c_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_query');
    }

    public function DeleteMahasiswa($id)
    {
        $id = $this->input->post("id");
        $this->m_query->M_DeleteMahasiswa($id);
        redirect('c_mahasiswa');
    }
}
