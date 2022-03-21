<?php

class crud_area extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_area');
    }

    public function index()
    {
        $data['crud_area'] = $this->m_crud_area->tampil_data();
        //$data[' '] = $this->m_crud_kontrak->getdata();
        //$data[' '] = $this->m_crud_kontrak->getjenis();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('crud_area', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $AREA_KODE = $this->input->post('AREA_KODE');
        $AREA_NAMA = $this->input->post('AREA_NAMA');
        $AREA_ZONE = $this->input->post('AREA_ZONE');

        $data = array(
            'AREA_KODE'               => $AREA_KODE,
            'AREA_NAMA'               => $AREA_NAMA,
            'AREA_ZONE'               => $AREA_ZONE,
        );

        $this->m_crud_area->input_data($data, 'tb_area');
        redirect('crud_area/index');
    }

    public function hapus($AREA_KODE)
    {
        $Where = array('AREA_KODE' => $AREA_KODE);
        $this->m_crud_area->hapus_data($Where, 'tb_area');
        redirect('crud_area/index');
    }

    public function edit_crud_area($AREA_KODE)
    {
        $where = array('AREA_KODE' => $AREA_KODE);
        $data['crud_area'] = $this->m_crud_area->edit_data($where, 'tb_area')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_crud_area', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $AREA_KODE = $this->input->post('AREA_KODE', true);
        $AREA_NAMA = $this->input->post('AREA_NAMA', true);
        $AREA_ZONE = $this->input->post('AREA_ZONE', true);

        $data = array(
            'AREA_KODE'               => $AREA_KODE,
            'AREA_NAMA'                  => $AREA_NAMA,
            'AREA_ZONE'                   => $AREA_ZONE,
        );

        $where = array('AREA_KODE' => $AREA_KODE);
        $this->m_crud_area->update_data($where, $data, 'tb_area');
        redirect('crud_area/index');
    }

    public function detail_crud_area($AREA_KODE)
    {
        $this->load->model('m_crud_area');
        $detail_crud_area = $this->m_crud_area->detail_data($AREA_KODE);
        $data['detail_crud_area'] = $detail_crud_area;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_area', $data);
        $this->load->view('templates/footer');
    }
}
