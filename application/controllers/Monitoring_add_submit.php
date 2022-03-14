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
        $file_name = $_FILES['NamaFile']['name'];
        $this->db->insert('tb_ijin', $data, $file_name);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "monitoring"</script>';
    }
}
