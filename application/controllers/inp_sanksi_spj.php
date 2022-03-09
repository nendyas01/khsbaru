<?php


class inp_sanksi_spj extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_inp_sanksi_spj');
    }

    public function index()
    {
        $data['nomorspj'] = $this->m_inp_sanksi_spj->getdata();
        $data['areaspj'] = $this->m_inp_sanksi_spj->getarea();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_sanksi_spj', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $this->m_coba->set_rules('judul', 'Judul', 'required');

        if ($this->m_coba->run() == FALSE) {
            $this->load->view('upload/inp_sanksi_spj');
        } else {
            $judul = $this->input->post('judul');
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/images/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png dan max size 2mb";
                    die();
                } else {
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'image' => $this->upload->data('file_name')
                    ];

                    $this->db->insert('tbl_galeri', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Image Added!</div>');
                    redirect('upload');
                }
            }
        }
    }

    public function tambah_aksi()
    {
        $SPJ_NO = $this->input->post('spj_no');
        $PROGRESS_VALUE = $this->input->post('var_progress');
        $REALISASI = $this->input->post('var_realisasi');
        $INPUT_PROGRESS_DATE = $this->input->post('var_tanggal');
        $PROGRESS_PENGAWAS = $this->input->post('var_nama_pengawas');
        $PROGRESS_NOTES = $this->input->post('var_deskripsi');

        $data = array();
        foreach ($SPJ_NO as $key => $a) {
            array_push($data, array(
                'SPJ_NO' => $SPJ_NO[$key],
                'PROGRESS_VALUE' => $PROGRESS_VALUE,
                'REALISASI' => $REALISASI,
                'INPUT_PROGRESS_DATE' => $INPUT_PROGRESS_DATE,
                'PROGRESS_PENGAWAS' => $PROGRESS_PENGAWAS,
                'PROGRESS_NOTES' => $PROGRESS_NOTES,
            ));

            $this->db->insert_batch('tb_progress', $data);
            redirect('inp_progress_kerja');
        }
    }
}
