<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kontrol_fin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kontrol_fin');
    }
    function index()
    {
        $data['kontrol_fin'] = $this->m_kontrol_fin->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kontrol_fin', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }
    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['kontrol_fin'] = $this->m_kontrol_fin->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kontrol_fin', $data);
        $this->load->view('templates/footer');
    }

    function aksi_pagu_kontrak($VENDOR_ID)
    {
        $where = array('VENDOR_ID' => $VENDOR_ID);
        $data['aksi_pagu_kontrak'] = $this->m_kontrol_fin->edit_data($where, 'tb_pagu_kontrak')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('aksi_pagu_kontrak', $data);
        $this->load->view('templates/footer');
    }


    function tambah_addendum()
    {
        $data['SPJ_NO'] = $this->m_kontrol_fin->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_addendum');
        $this->load->view('templates/footer');
    }

    function tambah_list()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_amandemen');
        $this->load->view('templates/footer');
    }
}
