<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inp_addendum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_addendum');
    }
    function index()
    {
        /* $data['nomorspj'] = $this->m_inp_addendum->getdata(); */
        /*  $data['skkio'] = $this->m_inp_addendum->getskkio(); */
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_addendum');
        $this->load->view('templates/footer');
    }

    function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->m_inp_addendum->search_spj($_GET['term']);
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
            $result = $this->m_inp_addendum->search_spj($_GET['term']);
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

        $this->m_inp_addendum->input_data($data, 'tb_addendum', 'tb_skko_i');
        redirect('inp_addendum/index');
    }

    function edit($inp_addendum)
    {
        $where = array('id' => $inp_addendum);
        $data['user'] = $this->m_data->edit_data($where, 'tb_addendum')->result();
        $this->load->view('inp_addendum', $data);
    }
}
