<?php

class Skrd_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
        $this->load->model('m_skrd');
    }

    public function index()
    {
        $data = [
            'surat_ijin_no' => $this->input->post('var_no_surat_ptsp'),
            'tgl_terbit_skrd' => date('Y-m-d', strtotime($this->input->post('var_tgl_terbit_skrd'))),
            'biaya_retribusi' => $this->input->post('var_biaya_retribusi')
        ];
        $this->db->insert('tb_ijin', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "skrd"</script>';
    }
}
