<?php

class crud_kontrak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_kontrak');
    }

    public function index()
    {
        $data['crud_kontrak'] = $this->m_crud_kontrak->tampil_data();
        //$data[' '] = $this->m_crud_kontrak->getdata();
        //$data[' '] = $this->m_crud_kontrak->getjenis();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('crud_kontrak', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $VENDOR_ID = $this->input->post('VENDOR_ID');
        $PAKET_JENIS = $this->input->post('PAKET_JENIS');
        $PAGU_KONTRAK = $this->input->post('PAGU_KONTRAK');
        $TERPAKAI = $this->input->post('TERPAKAI');
        $RANKING = $this->input->post('RANKING');
        $NO_PJN = $this->input->post('NO_PJN');
        $TGL_PJN = $this->input->post('TGL_PJN');
        $NO_RKS = $this->input->post('NO_RKS');
        $TGL_RKS = $this->input->post('TGL_RKS');
        $NO_SPP = $this->input->post('NO_SPP');
        $TGL_SPP = $this->input->post('TGL_SPP');
        $NO_PENAWARAN = $this->input->post('NO_PENAWARAN');
        $TGL_PENAWARAN = $this->input->post('TGL_PENAWARAN');
        $sanksi_terakhir = $this->input->post('sanksi_terakhir');
        $id_sanksi = $this->input->post('id_sanksi');
        $tgl_sanksi = $this->input->post('tgl_sanksi');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $punishment = $this->input->post('punishment');
        $BLOCKED = $this->input->post('BLOCKED');

        $data = array(
            'VENDOR_ID'               => $VENDOR_ID,
            'PAKET_JENIS'                  => $PAKET_JENIS,
            'PAGU_KONTRAK'                   => $PAGU_KONTRAK,
            'TERPAKAI'                 => $TERPAKAI,
            'RANKING'                        => $RANKING,
            'NO_PJN'                   => $NO_PJN,
            'TGL_PJN'               => $TGL_PJN,
            'NO_RKS'                  => $NO_RKS,
            'TGL_RKS'                   => $TGL_RKS,
            'NO_SPP'                => $NO_SPP,
            'TGL_SPP'                       => $TGL_SPP,
            'NO_PENAWARAN'                   => $NO_PENAWARAN,
            'TGL_PENAWARAN'               => $TGL_PENAWARAN,
            'sanksi_terakhir'                  => $sanksi_terakhir,
            'id_sanksi'                   => $id_sanksi,
            'tgl_sanksi'            => $tgl_sanksi,
            'tgl_akhir'                        => $tgl_akhir,
            'punishment'                   => $punishment,
            'BLOCKED'                   => $BLOCKED,
        );

        $this->m_crud_kontrak->input_data($data, 'tb_pagu_kontrak');
        redirect('crud_kontrak/index');
    }

    public function hapus($VENDOR_ID)
    {
        $where = array('VENDOR_ID' => $VENDOR_ID);
        $this->m_crud_kontrak->hapus_data($where, 'tb_pagu_kontrak');
        redirect('crud_kontrak/index');
    }

    public function edit_crud_kontrak($VENDOR_ID)
    {
        $where = array('VENDOR_ID' => $VENDOR_ID);
        $data['crud_kontrak'] = $this->m_crud_kontrak->edit_data($where, 'tb_pagu_kontrak')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_crud_kontrak', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $VENDOR_ID = $this->input->post('VENDOR_ID');
        $PAKET_JENIS = $this->input->post('PAKET_JENIS');
        $PAGU_KONTRAK = $this->input->post('PAGU_KONTRAK');
        $TERPAKAI = $this->input->post('TERPAKAI');
        $RANKING = $this->input->post('RANKING');
        $NO_PJN = $this->input->post('NO_PJN');
        $TGL_PJN = $this->input->post('TGL_PJN');
        $NO_RKS = $this->input->post('NO_RKS');
        $TGL_RKS = $this->input->post('TGL_RKS');
        $NO_SPP = $this->input->post('NO_SPP');
        $TGL_SPP = $this->input->post('TGL_SPP');
        $NO_PENAWARAN = $this->input->post('NO_PENAWARAN');
        $TGL_PENAWARAN = $this->input->post('TGL_PENAWARAN');
        $sanksi_terakhir = $this->input->post('sanksi_terakhir');
        $id_sanksi = $this->input->post('id_sanksi');
        $tgl_sanksi = $this->input->post('tgl_sanksi');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $punishment = $this->input->post('punishment');
        $BLOCKED = $this->input->post('BLOCKED');


        $data = array(
            'VENDOR_ID'               => $VENDOR_ID,
            'PAKET_JENIS'                  => $PAKET_JENIS,
            'PAGU_KONTRAK'                   => $PAGU_KONTRAK,
            'TERPAKAI'            => $TERPAKAI,
            'RANKING'                        => $RANKING,
            'NO_PJN'                   => $NO_PJN,
            'TGL_PJN'               => $TGL_PJN,
            'NO_RKS'                  => $NO_RKS,
            'TGL_RKS'                   => $TGL_RKS,
            'NO_SPP'            => $NO_SPP,
            'TGL_SPP'                        => $TGL_SPP,
            'NO_PENAWARAN'                   => $NO_PENAWARAN,
            'TGL_PENAWARAN'               => $TGL_PENAWARAN,
            'sanksi_terakhir'                  => $sanksi_terakhir,
            'id_sanksi'                   => $id_sanksi,
            'tgl_sanksi'            => $tgl_sanksi,
            'tgl_akhir'                        => $tgl_akhir,
            'punishment'                   => $punishment,
            'BLOCKED'                   => $BLOCKED,
        );

        $where = array('VENDOR_ID' => $VENDOR_ID);
        $this->m_crud_kontrak->update_data($where, $data, 'tb_pagu_kontrak');
        redirect('crud_kontrak/index');
    }

    public function detail_crud_kontrak($VENDOR_ID)
    {
        $this->load->model('m_crud_kontrak');
        $detail_crud_kontrak = $this->m_crud_kontrak->detail_data($VENDOR_ID);
        $data['detail_crud_kontrak'] = $detail_crud_kontrak;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_kontrak', $data);
        $this->load->view('templates/footer');
    }
}
