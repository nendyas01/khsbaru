<?php

class crud_paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_paket');
    }
    public function index()
    {
        $data['crud_paket'] = $this->m_crud_paket->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('crud_paket', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $PAKET_JENIS = $this->input->post('PAKET_JENIS');
        $PAKET_DESKRIPSI = $this->input->post('PAKET_DESKRIPSI');
        $SATUAN = $this->input->post('SATUAN');
        $PAKET_DESKRIPSI2 = $this->input->post('PAKET_DESKRIPSI2');
        $STATUS = $this->input->post('STATUS');

        $data = array(
            'PAKET_JENIS'               => $PAKET_JENIS,
            'PAKET_DESKRIPSI'           => $PAKET_DESKRIPSI,
            'SATUAN'                    => $SATUAN,
            'PAKET_DESKRIPSI2'          => $PAKET_DESKRIPSI2,
            'STATUS'                    => $STATUS,
        );

        $this->m_crud_paket->input_data($data, 'tb_paket');
        redirect('crud_paket/index');
    }

    public function hapus($PAKET_JENIS)
    {
        $where = array('PAKET_JENIS' => $PAKET_JENIS);
        $this->m_crud_paket->hapus_data($where, 'tb_paket');
        redirect('crud_paket/index');
    }

    public function edit_crud_paket($PAKET_JENIS)
    {
        $where = array('PAKET_JENIS' => $PAKET_JENIS);

        $data['crud_paket'] = $this->m_crud_paket->edit_data($where, 'tb_paket')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_crud_paket', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $PAKET_JENIS = $this->input->post('PAKET_JENIS', true);
        $PAKET_DESKRIPSI = $this->input->post('PAKET_DESKRIPSI', true);
        $SATUAN = $this->input->post('SATUAN', true);
        $PAKET_DESKRIPSI2 = $this->input->post('PAKET_DESKRIPSI2', true);
        $STATUS = $this->input->post('STATUS', true);

        $data = array(
            'PAKET_JENIS'               => $PAKET_JENIS,
            'PAKET_DESKRIPSI'           => $PAKET_DESKRIPSI,
            'SATUAN'                    => $SATUAN,
            'PAKET_DESKRIPSI2'          => $PAKET_DESKRIPSI2,
            'STATUS'                    => $STATUS,
        );

        $where = array('PAKET_JENIS' => $PAKET_JENIS);
        $this->m_crud_paket->update_data($where, $data, 'tb_paket');
        redirect('crud_paket/index');
    }

    public function detail_crud_paket($PAKET_JENIS)
    {
        $this->load->model('m_crud_paket');
        $detail_crud_paket = $this->m_crud_paket->detail_data($PAKET_JENIS);
        $data['detail_crud_paket'] = $detail_crud_paket;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_paket', $data);
        $this->load->view('templates/footer');
    }
}
