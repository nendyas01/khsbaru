<?php

class Pengajuan_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
        $this->load->model('m_pengajuan');
    }

    public function index()
    {
        $data = [
            'spj_no' => $this->input->post('spj_no'),
            'tgl_serah' => date('Y-m-d', strtotime($this->input->post('var_tgl_serah'))),
            'jumlah_dok' => $this->input->post('var_jumlah_dok'),
            'keterangan' => $this->input->post('var_keterangan')
        ];
        $this->db->insert('tb_dokumen', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "pengajuan"</script>';
    }
}
