<?php

class inp_pel_khs_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_pel_khs');
    }

    public function index()
    {

        $data = array(
            'no_pelanggaran'     =>  $this->input->post('nopelanggaran'),
            'area_kode'          =>  $this->input->post('area'),
            'no_spj'             =>  $this->input->post('spj'),
            'tgl_kejadian'       =>  $this->input->post('tgl_kejadian'),
            'tgl_input'          => date("Y-m-d"),
            'user_input'         => $this->input->post('username'),
            'keterangan'         =>  $this->input->post('var_keterangan'),
            'id_pelanggaran'     =>  $this->input->post('idpelanggaran'),
            'id_kel_pelanggaran' =>  $this->input->post('idkelpelanggaran'),
        );

        $this->m_inp_pel_khs->Save($data, 'tb_pelanggaran_khs');

        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "inp_pel_khs"</script>';
    }
}
