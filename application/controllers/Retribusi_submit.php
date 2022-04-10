<?php

class Retribusi_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
  
        if($this->session->userdata("status")==0){
			redirect('login');
		}
    
        $this->load->model('m_retribusi');
    }

    public function index()
    {
        $table = 'tb_ijin';
        $where = array(
            'surat_ijin_no' => $this->input->post('var_no_surat_ptsp')
        );
        $data = array(
            'tgl_bayar_retribusi' => date('Y-m-d', strtotime($this->input->post('var_tgl_bayar_retribusi'))),
            'evidence' => $this->input->post('evidence_ret')
        );

        $this->m_retribusi->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "retribusi"</script>';
    }
}
