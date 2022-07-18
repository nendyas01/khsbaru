<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud_user');
        if($this->session->userdata("status")==0){
			redirect('Login');
		}
    }
    public function index()
    {
        $data['anggaran'] = $this->M_anggaran->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Anggaran', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }


    public function v_input_tagihan()
    {
        // $data['var_no_spj']=$this->m_anggaran->v_input_tagihan();
        $current_spj_no['no_spj'] = $this->M_anggaran->spj_no();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('V_input_tagihan', $current_spj_no);
        $this->load->view('templates/footer');
    }

    public function getNilai()
    {
        $id = $this->input->post("id");
        $nilai = $this->M_anggaran->getnominal($id);
        $data = [
            'status' => true,
            'nilai' => $nilai->nilai
        ];
        echo json_encode($data);
    }

    public function getNilaiTermin()
    {
        $get_nilai_termin1 = $this->M_anggaran->get_nilai_termin1();
        echo json_encode($get_nilai_termin1);
    }

    public function getTermin()
    {
        $get_termin = $this->M_anggaran->get_termin();
        echo json_encode($get_termin);
    }

    public function get_val()
    {
        $get_val = $this->M_anggaran->getval();
        echo json_encode($get_val);
    }

    public function tambah_data()
    {

        $this->form_validation->set_rules('var_no_spj', 'Nomor SPJ', 'trim|required');
        $this->form_validation->set_rules('var_nominal_tagihan', 'Nominal Tagihan', 'trim|required');
        $this->form_validation->set_rules('var_tanggal_bayar', 'Tanggal Bayar', 'trim|required');
        $this->form_validation->set_rules('var_no_bastp', 'Nomor BASTP', 'trim|required');
        $this->form_validation->set_rules('var_deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run()) {
            $no_spj = $this->input->post('var_no_spj');
            $termin = $this->M_anggaran->get_termin_by_no_spj($no_spj);
            $progress = $this->M_anggaran->get_progress_by_no_spj($no_spj);
            // print_r($termin);
            // die;
            if ($termin->status == 0 && $progress->PROGRESS_VALUE < 100) {
                $this->session->set_flashdata('gagal', 'Tidak Bisa Input Pembayaran, Progress Belum 100%');
                redirect('Anggaran/tambah_data', 'refresh');
            } elseif ($termin->status == 1 && $progress->PROGRESS_VALUE <= $termin->termin_1) {
                $this->session->set_flashdata('gagal', 'Tidak Bisa Input Pembayaran Dikarenakan Progress Belum Sesuai dengan Termin');
                redirect('Anggaran/tambah_data', 'refresh');
            } else {
                $data = array(
                    'SPJ_NO'                 => $this->input->post('var_no_spj'),
                    'PEMBAYARAN_NOMINAL'     => $this->input->post('var_nominal_tagihan'),
                    'PEMBAYARAN_TANGGAL'     => $this->input->post('var_tanggal_bayar'),
                    'PEMBAYARAN_BASTP'       => $this->input->post('var_no_bastp'),
                    'INPUT_PAYMENT_DATE'     => date('Y-m-d H:i:s'),
                    'PEMBAYARAN_DESKRIPSI'   => $this->input->post('var_deskripsi'),
                    'PEMBAYARAN_INPUT_USER'  => $this->session->userdata('username')
                );
                $this->M_anggaran->insert_pembayaran($data);
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan!');
                redirect('Anggaran/tambah_data', 'refresh');
            }
        } else {
            $current_spj_no['no_spj'] = $this->M_anggaran->spj_no();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('V_input_tagihan', $current_spj_no);
            $this->load->view('templates/footer');
        };
    }

    
}
