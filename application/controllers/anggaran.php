<?php
defined('BASEPATH') or exit('No direct script access allowed');

class anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggaran');
    }
    public function index()
    {
        $data['anggaran'] = $this->m_anggaran->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('anggaran', $data);
        $this->load->view('templates/footer');
        //print_r($data);
    }

    public function v_input_tagihan()
    {
        // $data['var_no_spj']=$this->m_anggaran->v_input_tagihan();
        $current_spj_no['no_spj'] = $this->m_anggaran->spj_no();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_input_tagihan', $current_spj_no);
        $this->load->view('templates/footer');
    }

    public function getNilai()
    {
        $id = $this->input->post("id");
        $nilai = $this->m_anggaran->getnominal($id);
        $data = [
            'status' => true,
            'nilai' => $nilai->nilai
        ];
        echo json_encode($data);
    }

    public function getNilaiTermin()
    {
        $get_nilai_termin1 = $this->m_anggaran->get_nilai_termin1();
        echo json_encode($get_nilai_termin1);
    }

    public function getTermin()
    {
        $get_termin = $this->m_anggaran->get_termin();
        echo json_encode($get_termin);
    }

    public function get_val()
    {
        $get_val = $this->m_anggaran->getval();
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
            $termin = $this->m_anggaran->get_termin_by_no_spj($no_spj);
            $progress = $this->m_anggaran->get_progress_by_no_spj($no_spj);

            if ($termin->status == 0 && $progress->PROGRESS_VALUE < 100) {
                $this->session->set_flashdata('gagal', 'Tidak Bisa Input Pembayaran, Progress Belum 100%');
                redirect('anggaran/tambah_data', 'refresh');
            } elseif ($termin->status == 1 && $progress->PROGRESS_VALUE <= $termin->termin_1) {
                $this->session->set_flashdata('gagal', 'Tidak Bisa Input Pembayaran Dikarenakan Progress Belum Sesuai dengan Termin');
                redirect('anggaran/tambah_data', 'refresh');
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
                $this->m_anggaran->insert_pembayaran($data);
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan!');
                redirect('anggaran/tambah_data', 'refresh');
            }
        } else {
            $current_spj_no['no_spj'] = $this->m_anggaran->spj_no();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('v_input_tagihan', $current_spj_no);
            $this->load->view('templates/footer');
        };
    }

    public function tambah_aksi()
    {
        $SPJ_NO = $this->input->post('SPJ_NO');
        $PEMBAYARAN_NOMINAL = $this->input->post('PEMBAYARAN_NOMINAL');
        $PEMBAYARAN_TANGGAL = $this->input->post('SKKI_NO');
        $PEMBAYARAN_BASTP = $this->input->post('AREA_KODE');
        $PEMBAYARAN_DESKRIPSI = $this->input->post('SKKI_NILAI');
        $data = array(
            'SPJ_NO'                  => $SPJ_NO,
            'PEMBAYARAN_NOMINAL'       =>  $PEMBAYARAN_NOMINAL,
            'PEMBAYARAN_TANGGAL'      => $PEMBAYARAN_TANGGAL,
            'PEMBAYARAN_BASTP'        => $PEMBAYARAN_BASTP,
            'PEMBAYARAN_DESKRIPSI'  =>  $PEMBAYARAN_DESKRIPSI,
        );
        $this->m_crud_skkio->input_data($data, 'tb_pembayaran');
        redirect('anggaran/v_input_tagihan');
    }
}
