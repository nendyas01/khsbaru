<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inp_progres_kerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_progres_kerja');
    }

    function index()
    {
        $table = 'tb_user';
        $where = array(
            'USERNAME'       =>  $this->session->userdata('username')
        );

        $data['user'] = $this->m_inp_progres_kerja->Get_Where($where, $table);

        //$data['nomorspj'] = $this->m_inp_progres_kerja->getdata();
        //$data['SPJ_NO'] = $this->m_inp_addendum->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_progres_kerja', $data);
        $this->load->view('templates/footer');
    }

    function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->m_inp_progres_kerja->search_spj($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SPJ_NO;

                echo json_encode($arr_result);
            }
        }
    }

    public function tambah_aksi()
    {
        $SPJ_NO = $this->input->post('spj_no');
        $PROGRESS_VALUE = $this->input->post('var_progress');
        $REALISASI = $this->input->post('var_realisasi');
        $INPUT_PROGRESS_DATE = $this->input->post('var_tanggal');
        $PROGRESS_PENGAWAS = $this->input->post('var_nama_pengawas');
        $PROGRESS_NOTES = $this->input->post('var_deskripsi');

        $data = array();
        foreach ($SPJ_NO as $key => $a) {
            array_push($data, array(
                'SPJ_NO' => $SPJ_NO[$key],
                'PROGRESS_VALUE' => $PROGRESS_VALUE,
                'REALISASI' => $REALISASI,
                'INPUT_PROGRESS_DATE' => $INPUT_PROGRESS_DATE,
                'PROGRESS_PENGAWAS' => $PROGRESS_PENGAWAS,
                'PROGRESS_NOTES' => $PROGRESS_NOTES,
            ));

            $this->m_inp_progres_kerja->input_data($data, 'tb_progress');
            $this->db->insert_batch('tb_progress', $data);
            redirect('inp_progress_kerja');
        }
    }

    public function tambah_data()
    {
        $this->form_validation->set_rules('spj', 'Nomor SPJ', 'trim|required');
        $this->form_validation->set_rules('var_progress', 'Progres Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('var_realisasi', 'Realisasi', 'trim|required');
        $this->form_validation->set_rules('var_tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('var_nama_pengawas', 'Nama Pengawas', 'trim|required');
        $this->form_validation->set_rules('var_keterangan', 'Komentar', 'trim|required');

        if ($this->form_validation->run()) {
            $data = array(
                'SPJ_NO'                 => $this->input->post('spj'),
                'PROGRESS_VALUE'     => $this->input->post('var_progress'),
                'REALISASI'     => $this->input->post('var_realisasi'),
                'PROGRESS_DATE'       => $this->input->post('var_tanggal'),
                'PROGRESS_PENGAWAS'     => $this->input->post('var_nama_pengawas'),
                'PROGRESS_NOTES'   => $this->input->post('var_keterangan'),
                //'INPUT_PROGRESS_DATE' => $this->session->userdata(),
                //'PROGRESS_INPUT_USER' => date('Y-m-d H:i:s')
            );
            $this->m_inp_progres_kerja->insert_progress($data);
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan!');
            redirect('inp_progres_kerja', 'refresh');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('inp_progres_kerja');
            $this->load->view('templates/footer');
        };
    }
}
