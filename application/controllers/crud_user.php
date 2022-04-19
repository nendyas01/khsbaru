<?php

class crud_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_user');
        if ($this->session->userdata("status") == 0) {
            $this->session->set_flashdata('msg', 'non');
            redirect('login');
        }
    }

    public function index()
    {
        $data['crud_user'] = $this->m_crud_user->tampil_data();
        $data['role'] = $this->m_crud_user->getrole();
        $data['nama_area'] = $this->m_crud_user->getarea();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('crud_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $USERNAME = $this->input->post('USERNAME');
        $role_id = $this->input->post('role_id');
        $AREA_KODE = $this->input->post('AREA_KODE');
        $PASSWORD = $this->input->post('PASSWORD');

        $data = array(
            'USERNAME'           => $USERNAME,
            'role_id'            => $role_id,
            'AREA_KODE'          => $AREA_KODE,
            'PASSWORD'             => $PASSWORD,
        );

        $this->m_crud_user->input_data('tb_user', $data);
        // $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        echo json_encode(array('status' => 'sukses'));
    }



    public function hapus($USERNAME)
    {
        $where = array('USERNAME' => $USERNAME);
        $this->m_crud_user->hapus_data($where, 'tb_user');
        redirect('crud_user/index');
    }

    public function edit_crud_user($USERNAME)
    {
        $where = array('USERNAME' => $USERNAME);

        $data['crud_user'] = $this->m_crud_user->edit_data($where, 'tb_user')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_crud_user', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $USERNAME = $this->input->post('USERNAME', true);
        $ROLE_ID = $this->input->post('ROLE_ID', true);
        $AREA_KODE = $this->input->post('AREA_KODE', true);
        $PASSWORD = $this->input->post('PASSWORD', true);

        $data = array(
            'USERNAME'      => $USERNAME,
            'ROLE_ID'       => $ROLE_ID,
            'AREA_KODE'     => $AREA_KODE,
            'PASSWORD'      => $PASSWORD,
        );

        $where = array('USERNAME' => $USERNAME);
        $this->m_crud_user->update_data($where, $data, 'tb_user');
        $this->session->set_flashdata('info_edit','Data berhasil di edit.');
        redirect('crud_user/index');
    }

    public function detail_crud_user($USERNAME)
    {
        $this->load->model('m_crud_user');
        $detail_crud_user = $this->m_crud_user->detail_data($USERNAME);
        $data['detail_crud_user'] = $detail_crud_user;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_user', $data);
        $this->load->view('templates/footer');
    }

    public function aktif($username = '')
    {
        $this->db->query("UPDATE tb_user SET USER_STATUS='1' where username='$username'");
        redirect('crud_user/index');
    }
    public function non($username = '')
    {
        $this->db->query("UPDATE tb_user SET USER_STATUS='0' where username='$username'");
        redirect('crud_user/index');
    }
}
