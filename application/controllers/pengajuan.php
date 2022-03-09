<?php


class pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengajuan');
    }

    public function index()
    {
        /*  $data['nomorspj'] = $this->m_pengajuan->getdata(); */
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengajuan');
        $this->load->view('templates/footer');
    }

    function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->m_pengajuan->search_spj($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SPJ_NO;

                echo json_encode($arr_result);
            }
        }
    }
}
