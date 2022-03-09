<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chart extends CI_Controller
{ 
    function __construct(){ 
        parent::__construct(); 
        $this->load->model('m_chart'); 
    }
    function index(){ 
        $data['total_spj']=$this->m_chart->jml_total_spj();  
        $data['nama_area']=$this->m_chart->getarea();
        // print_r($data);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('chart', $data);
        $this->load->view('templates/footer');
    }

    function getChart()
    {
        $area_kode=$this->input->post('area_kode');
        $tahun=$this->input->post('tahun');
        // $area_kode=54110;
        // $tahun=2019;
        $get = $this->m_chart->jumlah_gangguan($area_kode, $tahun);
        echo json_encode($get);
        // echo $this->db->last_query($get);
        // print_r($get);
    }

    function getBarChart(){
        $area_kode=$this->input->get('area_kode');
        $tahun_paket=$this->input->get('tahun_paket');
        $tmp_tahun = substr($tahun_paket,1,4);

        $get = $this->m_chart->jml_paket($area_kode, $tmp_tahun);
        echo json_encode($get);
        // print_r($get);
        //echo $tmp_tahun;
    }

    function getLineChart2(){
        $paket_jenis=$this->input->post('paket_jenis');
        $tahun=$this->input->post('tahun');
        $get = $this->m_chart->jml_pagu_spj($paket_jenis, $tahun);
        // print_r($get);
        echo json_encode($get);
    }

    function getArea()
    {
        $get = $this->m_chart->getarea();
        echo json_encode($get);
    }

    function getTahun(){
        $get = $this->m_chart->tahun();
        echo json_encode($get);
    }

    function getTahunPaket(){
        $get = $this->m_chart->tahun_paket();
        echo json_encode($get);
    }

    

    function getPaket(){
        $tahun = $this->input->get('tahun');
        $get = $this->m_chart->getpaket2($tahun);
        echo json_encode($get);
    }

    
}
?>