<?php


class perijinan_add extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perijinan_add');
    }

    public function index()
    {
        /* $where = array('spj_no' => $spj_no); */
        $data['perijinan_add'] = $this->m_perijinan_add->edit('tb_ijin')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perijinan_add', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $spj_no = $this->input->post('spj_no', true);
        $surat_ijin_no = $this->input->post('surat_ijin_no', true);
        $tgl_surat = $this->input->post('tgl_surat', true);

        $data = array(
            'spj_no'               => $spj_no,
            'surat_ijin_no'               => $surat_ijin_no,
            'tgl_surat'               => $tgl_surat,
        );

        $where = array('spj_no' => $spj_no);
        $this->m_perijinan_add->update_data($where, $data, 'tb_ijin');
        redirect('perijinan_add/index');
    }
}
