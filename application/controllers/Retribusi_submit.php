<?php

class Retribusi_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
        $this->load->model('m_retribusi');
    }

    public function index()
    {
        $data = [
            'surat_ijin_no' => $this->input->post('var_no_surat_ptsp'),
            'tgl_bayar_retribusi' => date('Y-m-d', strtotime($this->input->post('var_tgl_bayar_retribusi'))),
            'evidence' => $this->input->post('var_evidence')
        ];
        $this->db->insert('tb_ijin', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "retribusi"</script>';
    }
}
