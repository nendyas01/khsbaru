<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_progress');
    }

    /* function inp_pel_khs()
    {
        //$data['progress'] = $this->m_progress->tambah;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_pel_khs');
        $this->load->view('templates/footer');
    } */

    function inp_sanksi_spj()
    {
        //$data['progress'] = $this->m_progress->tambah;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_sanksi_spj');
        $this->load->view('templates/footer');
    }

    function upl_sanksi_khs()
    {
        //$data['progress'] = $this->m_progress->tambah;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('upl_sanksi_khs');
        $this->load->view('templates/footer');
    }

    function upl_sanksi_spj()
    {
        $this->data['nomor_sanksi'] = $this->m_pelanggaran->get_data();
        //$data['progress'] = $this->m_progress->tambah;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('upl_sanksi_spj', $this->data);
        $this->load->view('templates/footer');
    }

    function sanksi_siap_cetak()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sanksi_siap_cetak');
        $this->load->view('templates/footer');
    }

    function list_sanksi()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi');
        $this->load->view('templates/footer');
    }

    function list_sanksi_spj()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_sanksi_spj');
        $this->load->view('templates/footer');
    }

    function list_pelanggaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('list_pelanggaran');
        $this->load->view('templates/footer');
    }

    function app_pel()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('approve_pelanggaran');
        $this->load->view('templates/footer');
    }
}
