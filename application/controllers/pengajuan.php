<?php
defined('BASEPATH') or exit('No direct script access allowed');


class pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username")){
			redirect('login');
		}
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

    public function tambah_aksi()
    {
        $spj_no = $this->input->post('spj_no');
        $tgl_serah = $this->input->post('var_tgl_serah');
        $jumlah_dok = $this->input->post('var_jumlah_dok');
        $keterangan = $this->input->post('var_keterangan');

        $data = array();
        foreach ($spj_no as $key => $a) {
            array_push($data, array(
                'spj_no' => $spj_no[$key],
                'var_tgl_serah' => $tgl_serah,
                'var_jumlah_dok' => $jumlah_dok,
                'var_keterangan' => $keterangan,
            ));

            $this->db->insert_batch('tb_dokumen', $data);
            redirect('pengajuan');
        }
    }
}
