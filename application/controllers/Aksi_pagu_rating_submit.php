<?php

class Aksi_pagu_rating_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_kontrol_fin');
    }

    public function index()
    {
        $table = 'tb_pagu_kontrak';
        $where = array(
            'VENDOR_ID' => $this->input->post('VENDOR_ID'),
            'RATING_LAPORAN_AUDIT' => $this->input->post('RATING_LAPORAN_AUDIT')


        );
        $data = array(
            'FIN_LIMIT' => $this->input->post('FIN_LIMIT')
        );

        $this->m_kontrol_fin->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "kontrol_fin"</script>';
    }
}
