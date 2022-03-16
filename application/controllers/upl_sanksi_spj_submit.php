<?php

class upl_sanksi_spj_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_upl_sanksi_spj');
    }

    public function index()
    {
        $table = 'tb_sanksi_spj';
        $data = array(
            'id_sanksi_spj'     =>  $this->input->post('sanksi'),
            'area_kode'         => $this->input->post('area')
        );
        /* $data = array(
            'status' => "1"
        ); */

        //$this->m_upl_sanksi_spj->Update($where, $data, $table);
        $this->m_upl_sanksi_spj->Update($data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "upl_sanksi_spj"</script>';
    }
}
