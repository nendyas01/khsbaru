<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auto_complete extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auto_complete');
    }

    public function index()
    {
        $this->load->view('auto_complete');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->m_auto_complete->search_barang($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SPJ_NO;

                echo json_encode($arr_result);
            }
        }
    }
}
