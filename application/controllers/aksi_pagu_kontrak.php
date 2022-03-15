<?php

class Aksi_pagu_kontrak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("username")) {
            redirect('login');
        }
        $this->load->model('m_kontrol_fin');
    }

    public function index()
    {
        $table = 'tb_pagu_kontrak';
        $where = array(
            'VENDOR_NAMA' => $this->input->post('VENDOR_NAMA')
        );

        $data = array(
            'PAKET_JENIS' => $this->input->post('PAKET_JENIS'),
            'PAGU_KONTRAK' => $this->input->post('PAGU_KONTRAK'),
        );

        $this->m_kontrol_fin->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "skrd"</script>';
    }
}
