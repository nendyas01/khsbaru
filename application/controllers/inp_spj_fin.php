<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inp_spj_fin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("username")) {
            redirect('login');
        }
        $this->load->model('M_inp_spj_fin');
    }

    function index()
    {
        $data['Inp_spj_fin'] = $this->M_inp_spj_fin->tampil_data_dua()->result();
        $data['skk'] = $this->M_inp_spj_fin->getdata();
        $data['jenis_paket'] = $this->M_inp_spj_fin->getpaket();
        $data['area'] = $this->M_inp_spj_fin->getarea();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Inp_spj_fin', $data);
        $this->load->view('templates/footer');
    }

    function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_inp_spj_fin->search_spj($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SKKI_NO;

                echo json_encode($arr_result);
            }
        }
    }

    public function get_vendor()
    {
        $jns_paket = $this->input->post('id');
        $data = $this->M_inp_spj_fin->get_vendor($jns_paket);
        echo json_encode($data);
    }

    public function vendor_name($spj_no)
    {
        $data = $this->M_inp_spj_fin->get_vendor_nama($spj_no);
        // var_dump($dpaket_jenis);
        // die();
        echo json_encode($data);
    }
}
