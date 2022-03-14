<?php

class Ba_survey_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
        $this->load->model('m_ba_survey');
    }

    public function index()
    {
        $data = [
            'revisi' => $this->input->post('var_no_persetujuan'),
            'surat_ijin_no' => $this->input->post('var_no_surat_ptsp'),
            'tgl_survey' => date('Y-m-d', strtotime($this->input->post('var_tgl_survey'))),
            'hasil_survey' => $this->input->post('var_hasil_survey')
        ];
        $this->db->update('tb_ijin', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "ba_survey"</script>';
    }
}
