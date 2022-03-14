<?php

class inp_addendum_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
        $this->load->model('m_inp_addendum');
    }

    public function index()
    {
        $data = [
            'SPJ_NO' => $this->input->post('spj_no'),
            'ADDENDUM_NO' => $this->input->post('var_no_addendum'),
            'MIN' => $this->input->post('min_ppn'),
            'PPN' => $this->input->post('ppn'),
            'ADDENDUM_NILAI' => $this->input->post('var_nilai_addendum'),
            'TGL_ADDENDUM' => date('Y-m-d', strtotime($this->input->post('var_tanggal_add'))),
            'ADDENDUM_TANGGAL_AKHIR' => date('Y-m-d', strtotime($this->input->post('var_tanggal_akhir'))),
            'PPN' => $this->input->post('var_skki_awal'),
            'PPN' => $this->input->post('var_skki_tujuan'),
            'ADDENDUM_DESKRIPSI' => $this->input->post('var_deskripsi')


        ];
        $this->db->insert('tb_addendum', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "inp_addendum"</script>';
    }
}
