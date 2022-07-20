<?php

class Inp_sanksi_spj_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_inp_sanksi_spj');
    }

    public function index()
    {

        $data = array(
            'id_sanksi_spj'      =>  $this->input->post('idsanksi'),
            'area_kode'          =>  $this->input->post('area'),
            'no_spj'             =>  $this->input->post('spj'),
            'jenis_sanksi'       =>  $this->input->post('jenis_sanksi'),
            'tgl_kejadian'       =>  $this->input->post('tgl_kejadian'),
            'tgl_input'          => date("Y-m-d"),
            'user_input'         => $this->input->post('username'),
            'keterangan'         =>  $this->input->post('var_keterangan'),
        );

        $this->M_inp_sanksi_spj->Save($data, 'tb_sanksi_spj');

        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "inp_sanksi_spj"</script>';
    }
}
