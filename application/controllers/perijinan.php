<?php


class perijinan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_perijinan');
    }

    public function index()
    {
        $data['perijinan'] = $this->m_perijinan->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perijinan', $data);
        $this->load->view('templates/footer');
    }

    public function perijinan_add($spj_no)
    {

        $where = array('spj_no' => $spj_no);
        $data['perijinan'] = $this->m_perijinan->edit_data($where, 'tb_ijin')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perijinan_add/', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $SPJ_NO = $this->input->post('SPJ_NO', true);

        $data = array(
            'SPJ_NO'               => $SPJ_NO,
        );

        $where = array('SPJ_NO' => $SPJ_NO);
        $this->m_crud_area->update_data($where, $data, 'tb_spj');
        redirect('perijinan/perijinan_add/index');
    }
}
