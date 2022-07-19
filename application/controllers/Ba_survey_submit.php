<?php

class Ba_survey_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud_user');
        if ($this->session->userdata("status") == 0) {
            redirect('Login');
        }
    }

    public function index()
    {
        $table = 'tb_ijin';
        $where = array(
            'surat_ijin_no'     =>  $this->input->post('var_no_surat_ptsp')
        );
        $data = array(
            'revisi' => $this->input->post('var_no_persetujuan'),
            'tgl_survey' => date('Y-m-d', strtotime($this->input->post('var_tgl_survey'))),
            'hasil_survey' => $this->input->post('var_hasil_survey')
        );

        $this->M_ba_survey->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "Ba_survey"</script>';
    }
}
