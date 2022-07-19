<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inp_addendum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_inp_addendum');
    }
    function index()
    {
        $table = 'tb_user';
        $where = array(
            'USERNAME'       =>  $this->session->userdata('username')
        );

        $data['user'] = $this->M_inp_addendum->Get_Where($where, $table);
        $data['spj'] = $this->M_inp_addendum->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Inp_addendum', $data);
        $this->load->view('templates/footer');
    }

    function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_inp_addendum->search_spj($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SPJ_NO;

                echo json_encode($arr_result);
            }
        }
    }

    function get_autofill1()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_inp_addendum->search_skkio($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SKKI_NO;

                echo json_encode($arr_result);
            }
        }
    }

    public function tambah_aksi()
    {
        $SPJ_NO = $this->input->post('SPJ_NO');
        $ADDENDUM_NO = $this->input->post('ADDENDUM_NO');
        $ADDENDUM_NILAI = $this->input->post('ADDENDUM_NILAI');
        $TGL_ADDENDUM = $this->input->post('TGL_ADDENDUM');
        $ADDENDUM_TANGGAL_AKHIR = $this->input->post('ADDENDUM_TANGGAL_AKHIR');
        $ADDENDUM_DESKRIPSI = $this->input->post('ADDENDUM_DESKRIPSI');
        $SKKIO_NO = $this->input->post('SKKIO_NO');

        $data = array(
            'SPJ_NO'             => $SPJ_NO,
            'ADDENDUM_NO'           => $ADDENDUM_NO,
            'ADDENDUM_NILAI'                 => $ADDENDUM_NILAI,
            'TGL_ADDENDUM'        => $TGL_ADDENDUM,
            'ADDENDUM_TANGGAL_AKHIR'                 => $ADDENDUM_TANGGAL_AKHIR,
            'ADDENDUM_DESKRIPSI'               => $ADDENDUM_DESKRIPSI,
            'SKKIO_NO'                => $SKKIO_NO,
        );

        $this->M_inp_addendum->input_data($data, 'tb_addendum', 'tb_skko_i');
        redirect('Inp_addendum/index');
    }

    function edit($Inp_addendum)
    {
        $where = array('id' => $Inp_addendum);
        $data['user'] = $this->m_data->edit_data($where, 'tb_addendum')->result();
        $this->load->view('Inp_addendum', $data);
    }
}
