<?php

class Upl_sanksi_khs_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_upl_sanksi_khs');
    }

    public function index()
    {
        $table = 'tb_pelanggaran_khs';
        $where = array(
            'no_pelanggaran'     =>  $this->input->post('sanksi')
        );
        $data = array(
            'status' => "1"
        );

        $this->M_upl_sanksi_khs->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "upl_sanksi_khs"</script>';
    }
}
