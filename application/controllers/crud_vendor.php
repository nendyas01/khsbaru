<?php

class crud_vendor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_vendor');
    }
    public function index()
    {
        $data['crud_vendor'] = $this->m_crud_vendor->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('crud_vendor', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $VENDOR_ID = $this->input->post('VENDOR_ID');
        $VENDOR_NAMA = $this->input->post('VENDOR_NAMA');
        $TAHUN = $this->input->post('TAHUN');
        $DIREKSI_VENDOR = $this->input->post('DIREKSI_VENDOR');
        $EMAIL = $this->input->post('EMAIL');
        $TELEPON = $this->input->post('TELEPON');
        $STATUS = $this->input->post('STATUS');
        $EMAIL_2 = $this->input->post('EMAIL_2');
        $JABATAN = $this->input->post('JABATAN');

        $data = array(
            'VENDOR_ID'             => $VENDOR_ID,
            'VENDOR_NAMA'           => $VENDOR_NAMA,
            'TAHUN'                 => $TAHUN,
            'DIREKSI_VENDOR'        => $DIREKSI_VENDOR,
            'EMAIL'                 => $EMAIL,
            'TELEPON'               => $TELEPON,
            'STATUS'                => $STATUS,
            'EMAIL_2'               => $EMAIL_2,
            'JABATAN'               => $JABATAN,
        );

        $this->m_crud_vendor->input_data($data, 'tb_vendor');
        redirect('crud_vendor/index');
    }

    public function hapus($VENDOR_ID)
    {
        $where = array('VENDOR_ID' => $VENDOR_ID);
        $this->m_crud_vendor->hapus_data($where, 'tb_vendor');
        redirect('crud_vendor/index');
    }

    public function edit_crud_vendor($VENDOR_ID)
    {
        $where = array('VENDOR_ID' => $VENDOR_ID);

        $data['crud_vendor'] = $this->m_crud_vendor->edit_data($where, 'tb_vendor')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_crud_vendor', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $VENDOR_ID = $this->input->post('VENDOR_ID', true);
        $VENDOR_NAMA = $this->input->post('VENDOR_NAMA', true);
        $TAHUN = $this->input->post('TAHUN', true);
        $DIREKSI_VENDOR = $this->input->post('DIREKSI_VENDOR', true);
        $EMAIL = $this->input->post('EMAIL', true);
        $TELEPON = $this->input->post('TELEPON', true);
        $STATUS = $this->input->post('STATUS', true);
        $EMAIL_2 = $this->input->post('EMAIL_2', true);
        $JABATAN = $this->input->post('JABATAN', true);

        $data = array(
            'VENDOR_ID'             => $VENDOR_ID,
            'VENDOR_NAMA'           => $VENDOR_NAMA,
            'TAHUN'                 => $TAHUN,
            'DIREKSI_VENDOR'        => $DIREKSI_VENDOR,
            'EMAIL'                 => $EMAIL,
            'TELEPON'               => $TELEPON,
            'STATUS'                => $STATUS,
            'EMAIL_2'               => $EMAIL_2,
            'JABATAN'               => $JABATAN,
        );

        $where = array('VENDOR_ID' => $VENDOR_ID);
        $this->m_crudvendor->update_data($where, $data, 'tb_vendor');
        redirect('crud_vendor/index');
    }

    public function detail_crud_vendor($VENDOR_ID)
    {
        $this->load->model('m_crud_vendor');
        $detail_crud_vendor = $this->m_crud_vendor->detail_data($VENDOR_ID);
        $data['detail_crud_vendor'] = $detail_crud_vendor;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_vendor', $data);
        $this->load->view('templates/footer');
    }
}
