<?php

class Inp_spj_fin_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
        $this->load->model('m_inp_spj_fin');
    }

    public function index()
    {
        $data = [
            'NAMA_MANAGER' => $this->input->post('var_nama_manager'),
            'DIREKSI_PEKERJAAN' => $this->input->post('var_dir_pkj'),
            'DIREKSI_LAPANGAN' => $this->input->post('var_dir_lpg'),
            'MIN_PPN' => $this->input->post('min_ppn'),
            'PPN' => $this->input->post('ppn'),
            'SPJ_NILAI' => $this->input->post('var_nilai_spj'),
            /* 'SPJ_NILAI' => $this->input->post('var_lokasi'), */
            'SKKI_ID' => $this->input->post('SKKI_ID'),
            'SPJ_NILAI' => $this->input->post('var_nilai_spj'),
            'tgl_serah' => date('Y-m-d', strtotime($this->input->post('var_tgl_serah'))),
            'jumlah_dok' => $this->input->post('var_jumlah_dok'),
            'keterangan' => $this->input->post('var_keterangan')
        ];
        $this->db->insert('tb_spj', $data);
        echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
        echo '<script language="javascript">window.location = "inp_spj_fin"</script>';
    }
}
