<?php

class Perijinan_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
      
        if($this->session->userdata("status")==0){
			redirect('login');
		}

        $this->load->model('m_perijinan');
    }

    public function index()
    {
        $table = 'tb_ijin';
        $where = array(
            'spj_no' => $this->input->post('spj_no'),



        );
        $data = array(
            'surat_ijin_no' => $this->input->post('surat_ijin_no'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pekerjaan' => $this->input->post('kota_adm'),
            'pekerjaan' => $this->input->post('lokasi')
        );

        $this->m_kontrol_fin->Update($where, $data, $table);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "kontrol_fin"</script>';
    }
}
