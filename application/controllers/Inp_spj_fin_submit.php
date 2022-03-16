<?php

class Inp_spj_fin_submit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_spj_fin');
    }

    public function index()
    {

        $this->form_validation->set_rules(
            'var_no_spj',
            'var_no_spj',
            'trim|is_unique[tb_sanksi_spj.no_spj]',

            [

                'is_unique' => 'No SPJ ini sedang terkena sanksi',
            ]
        );


        if ($this->form_validation->run() == false) {
            $data['skk'] = $this->m_inp_spj_fin->getdata();
            $data['jenis_paket'] = $this->m_inp_spj_fin->getpaket();
            $data['area'] = $this->m_inp_spj_fin->getarea();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('inp_spj_fin', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'NAMA_MANAGER'      =>  $this->input->post('var_nama_manager'),
                'DIREKSI_PEKERJAAN' =>  $this->input->post('var_dir_pkj'),
                'DIREKSI_LAPANGAN'  =>  $this->input->post('var_dir_lpg'),
                'AREA_KODE'         =>  $this->input->post('var_lokasi'),
                'SKKI_NO'           =>  $this->input->post('var_skki_tujuan'),
                'PAKET_JENIS'       =>  $this->input->post('var_paket_pekerjaan'),
                'SPJ_DESKRIPSI'     =>  $this->input->post('var_deskripsi_pekerjaan'),
                'SPJ_NO'            =>  $this->input->post('var_no_spj'),
                'SPJ_TARGET'        =>  $this->input->post('var_target'),
                'SPJ_TANGGAL_MULAI' =>  $this->input->post('var_mulai_berlaku'),
                'SPJ_TANGGAL_AKHIR' =>  $this->input->post('var_akhir_berlaku'),
                'gangguan'          =>  $this->input->post('gangguan'),
                'MIN_PPN'           =>  $this->input->post('min_ppn'),
                'PPN'               =>  $this->input->post('ppn'),
                'SPJ_ADD_NILAI'     =>  $this->input->post('var_nilai_spj'),
            );

            $this->m_inp_spj_fin->Save($data, 'tb_spj');

            $data = array(
                'spj_no'   =>  $this->input->post('var_no_spj'),
                'termin_1' =>  $this->input->post('var_termin_1'),
                'termin_2' =>  $this->input->post('var_termin_2'),
                'termin_3' =>  $this->input->post('var_termin_3'),
                'termin_4' =>  $this->input->post('var_termin_4'),
                'termin_5' =>  $this->input->post('var_termin_5'),
                'status'   =>  $this->input->post('option_bayar'),
            );

            $this->m_inp_spj_fin->Save($data, 'tb_termin');
            echo '<script language="javascript">alert("Penyerahan Dokumen Berhasil Ditambahkan")</script>';
            echo '<script language="javascript">window.location = "inp_spj_fin"</script>';
        }
    }
}
