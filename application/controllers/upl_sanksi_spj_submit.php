<?php

class Upl_sanksi_spj_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_upl_sanksi_spj');
    }

    public function index()
    /* {
        $id_sanksi_spj = $this->input->post('sanksi');
        $area_kode = $this->input->post('area');

        $data = array(
            //'sanksi' => $id_sanksi_spj,
            'area' => $area_kode,
        );

        /* $where = array(
            'sanksi' => $id_sanksi_spj,
        ); */

    /* $this->m_upl_sanksi_spj->update_data($data, 'tb_sanksi_spj');
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "upl_sanksi_spj"</script>';
    } */

    {
        $table = 'tb_sanksi_spj';
        $where = array(

            'area_kode'         => $this->input->post('area')
        );
        $data = array(
            'id_sanksi_spj'     =>  $this->input->post('sanksi'),
        );

        $this->M_upl_sanksi_spj->Update_data($where, $data, $table);
        //$this->m_upl_sanksi_spj->Update($data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "upl_sanksi_spj"</script>';
    }
}
