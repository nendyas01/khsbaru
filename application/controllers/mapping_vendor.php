<?php

defined('BASEPATH') or exit('No direct script access allowed');



class mapping_vendor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("username")) {
            redirect('login');
        }
        $this->load->model('m_mapping_vendor');
    }

    public function index()
    {
        $data['mapping_vendor'] = $this->m_mapping_vendor->tampil_data_dua()->result();
        $data['nama_area'] = $this->m_mapping_vendor->getarea();
        $data['jenis_paket'] = $this->m_mapping_vendor->getpaket();
        // $data['nama_vendor'] = $this->m_mapping_vendor->getvendor();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mapping_vendor', $data);
        $this->load->view('templates/footer');
        // var_dump($data);
    }

    public function vendor_name($mapping_id)
    {
        $data = $this->m_mapping_vendor->get_vendor_nama($mapping_id);
        // var_dump($dpaket_jenis);
        // die();
        echo json_encode($data);
    }

    public function area_name($mapping_id)
    {
        $data = $this->m_mapping_vendor->get_area_nama($mapping_id);
        // var_dump($data);
        // die();
        echo json_encode($data);
    }

    public function tambah_aksi()
    {
        $AREA_KODE = $this->input->post('AREA_KODE');
        $PAKET_JENIS = $this->input->post('PAKET_JENIS');
        $ZONE = $this->input->post('ZONE');
        // $MAPPING_TAHUN = $this->m_mapping_vendor->getMAPPINGTAHUN->result();
        $MAPPING_TAHUN = $this->input->post('MAPPING_TAHUN');
        $VENDOR_ID = $this->input->post('VENDOR_ID');
        $mapping_id = $this->m_mapping_vendor->getID()->row()->total_mapping + 1;
        // $nama_area = $this->input->post('AREA_NAMA');

        $data = array();
        foreach ($VENDOR_ID as $key => $nb) {
            foreach ($AREA_KODE as $ak => $a) {
                array_push($data, array(

                    'AREA_KODE' => $AREA_KODE[$ak],
                    // 'AREA_NAMA' => $nama_area,
                    'PAKET_JENIS' => $PAKET_JENIS,
                    'ZONE' => $ZONE,
                    'MAPPING_TAHUN' => $MAPPING_TAHUN,
                    'VENDOR_ID' => $VENDOR_ID[$key],
                    'mapping_id' => $mapping_id,


                ));
            }
        }
        // print_r($data);

        $this->db->insert_batch('tb_mapping_vendor', $data);
        echo json_encode(array('status'=>'sukses'));
    }

    public function get_vendor()
    {
        $jns_paket = $this->input->post('id');
        $data = $this->m_mapping_vendor->get_vendor($jns_paket);
        echo json_encode($data);
    }

    public function getarea()
    {
        $nama_area = $this->input->post('id');
        $data = $this->m_mapping_vendor->getarea->result();
        // area($nama_area);
        echo json_encode($data);
    }

    public function getmapping()
    {
        $get = $this->m_mapping_vendor->tampil_data_dua()->result();
        echo $this->db->last_query($get);
        echo json_encode($get);
    }



    public function hapus($mapping_id)
    {
        $where = array('mapping_id' => $mapping_id);
        $this->m_mapping_vendor->hapus_data($where, 'tb_mapping_vendor');
        redirect('mapping_vendor/index');
    }



    // public function edit_mapping_vendor($AREA_KODE)
    // {
    //     $where = array('AREA_KODE' => $AREA_KODE);
    //     $data['mapping_vendor'] = $this->m_mapping_vendor->edit_data($where, 'tb_mapping_vendor');
    //     $data['area'] = $this->m_mapping_vendor->get_area($where, 'tb_mapping_vendor');
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('edit_mapping_vendor', $data);
    //     $this->load->view('templates/footer');
    // }

}
