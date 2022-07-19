<?php

class Skrd_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("status") == 0) {
            redirect('login');
        }

        $this->load->model('M_skrd');
    }

    public function index()
    {
        $table = 'tb_ijin';
        $where = array(
            'surat_ijin_no' => $this->input->post('var_no_surat_ptsp')
        );

        $data = array(
            'tgl_terbit_skrd' => date('Y-m-d', strtotime($this->input->post('var_tgl_terbit_skrd'))),
            'biaya_retribusi' => $this->input->post('var_biaya_retribusi')
        );

        $this->M_skrd->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "skrd"</script>';
    }
}
