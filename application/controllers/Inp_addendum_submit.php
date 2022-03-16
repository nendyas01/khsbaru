<?php

class inp_addendum_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_addendum');
    }

    public function index()
    {
        $data = [
            'SPJ_NO'                 => $this->input->post('nospj'),
            'ADDENDUM_NO'            => $this->input->post('var_no_addendum'),
            'ADDENDUM_NILAI'         => $this->input->post('var_nilai_addendum'),
            'TGL_ADDENDUM'           => $this->input->post('var_tanggal_add'),
            'ADDENDUM_TANGGAL_AKHIR' => $this->input->post('var_tanggal_akhir'),
            'ADDENDUM_INPUT_DATE'    => date("Y-m-d"),
            'ADDENDUM_INPUT_USER'    => $this->input->post('username'),
            'ADDENDUM_DESKRIPSI'     => $this->input->post('var_deskripsi')
        ];
        $this->m_inp_addendum->Save($data, 'tb_addendum');


        $table = 'tb_spj';
        $where = array(
            'SPJ_NO'     =>  $this->input->post('nospj')
        );
        $data = array(
            'SPJ_ADD_TANGGAL' => $this->input->post('var_tanggal_add'),
            'SPJ_ADD_NILAI'   => $this->input->post('var_nilai_addendum'),
            'SKKI_NO'         => $this->input->post('var_skki_tujuan')
        );

        $this->m_inp_addendum->Update($where, $data, $table);

        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "inp_addendum"</script>';
    }
}
