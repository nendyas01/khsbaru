<?php

class Inp_progress_kerja_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_inp_progres_kerja');
    }

    public function index()
    {

        $data = array(
            'SPJ_NO'      =>  $this->input->post('spj'),
            'PROGRESS_DATE' => date("Y-m-d"),
            'PROGRESS_VALUE'          =>  $this->input->post('var_progress'),
            'REALISASI'             =>  $this->input->post('var_realisasi'),
            'INPUT_PROGRESS_DATE'       =>  $this->input->post('var_tanggal'),
            'PROGRESS_PENGAWAS'       =>  $this->input->post('var_nama_pengawas'),
            'PROGRESS_NOTES'          => $this->input->post('var_keterangan'),
            'PROGRESS_INPUT_USER'         => $this->input->post('username'),

        );

        $this->M_inp_progres_kerja->Save($data, 'tb_progress');

        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "inp_progres_kerja"</script>';
    }
}
