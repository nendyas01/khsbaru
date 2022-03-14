<?php

class Monitoring_add_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_monitoring');
    }

    public function index()
    {
        $data = [
            'evidence' => $this->input->post('var_evidence')


        ];
        $this->db->update('tb_ijin', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "monitoring"</script>';
    }
}
