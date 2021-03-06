<?php

class Crud_paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud_paket');
        if ($this->session->userdata("status") == 0) {
            redirect('Login');
        }
    }
    public function index()
    {
        $data['Crud_paket'] = $this->M_crud_paket->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Crud_paket', $data);
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

        $this->M_crud_paket->input_data($data, 'tb_paket');
        /* redirect('crud_paket/index'); */
        echo json_encode(array('status' => 'sukses'));
    }

    public function hapus($PAKET_JENIS)
    {
        $where = array('PAKET_JENIS' => $PAKET_JENIS);
        $this->M_crud_paket->hapus_data($where, 'tb_paket');
        redirect('Crud_paket/index');
    }

    public function edit_crud_paket($PAKET_JENIS)
    {
        $where = array('PAKET_JENIS' => $PAKET_JENIS);

        $data['Crud_paket'] = $this->M_crud_paket->edit_data($where, 'tb_paket')->result();
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
        $this->M_crud_paket->update_data($where, $data, 'tb_paket');
        $this->session->set_flashdata('info_edit', 'Data berhasil di edit.');
        redirect('Crud_paket/index');
    }

    public function detail_crud_paket($PAKET_JENIS)
    {
        $this->load->model('M_crud_paket');
        $detail_crud_paket = $this->M_crud_paket->detail_data($PAKET_JENIS);
        $data['detail_crud_paket'] = $detail_crud_paket;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_paket', $data);
        $this->load->view('templates/footer');
    }

    public function aktif($PAKET_JENIS = '')
    {
        $this->db->query("UPDATE tb_paket SET STATUS='1' where PAKET_JENIS='$PAKET_JENIS'");
        redirect('Crud_paket/index');
    }
    public function non($PAKET_JENIS = '')
    {
        $this->db->query("UPDATE tb_paket SET STATUS='0' where PAKET_JENIS='$PAKET_JENIS'");
        redirect('Crud_paket/index');
    }
}
