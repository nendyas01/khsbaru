<?php

class crud_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_user');
    }

    public function index()
    {
        $data['crud_user'] = $this->m_crud_user->tampil_data();
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

        $data = array(
            'USERNAME'           => $USERNAME,
            'role_id'            => $role_id,
            'AREA_KODE'          => $AREA_KODE,
        );

        $this->m_crud_user->input_data($data, 'tb_user');
        redirect('crud_user/index');
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

        $data = array(
            'USERNAME'      => $USERNAME,
            'ROLE_ID'       => $ROLE_ID,
            'AREA_KODE'     => $AREA_KODE,
        );

        $where = array('USERNAME' => $USERNAME);
        $this->m_crud_user->update_data($where, $data, 'tb_user');
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

    public function aktif($username='')
    {
        $this->db->query("UPDATE tb_user SET USER_STATUS='1' where username='$username'");
        redirect('crud_user/index');
    }
    public function non($username='')
    {
        $this->db->query("UPDATE tb_user SET USER_STATUS='0' where username='$username'");
        redirect('crud_user/index');
    }
}
