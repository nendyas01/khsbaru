<?php


class Inp_sanksi_spj extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_inp_sanksi_spj');
    }

    public function index()
    {
        //$data['nomorspj'] = $this->m_inp_sanksi_spj->getdata();
        $data['area'] = $this->M_inp_sanksi_spj->getarea();


        $data['kodeotomatis'] = $this->M_inp_sanksi_spj->kodeotomatis();

        $table = 'tb_user';
        $where = array(
            'USERNAME'       =>  $this->session->userdata('username')
        );

        $data['user'] = $this->M_inp_sanksi_spj->Get_Where($where, $table);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inp_sanksi_spj', $data);
        $this->load->view('templates/footer');
    }

    function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_inp_sanksi_spj->search_spj($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->SPJ_NO;

                echo json_encode($arr_result);
            }
        }
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_inp_sanksi_spj->get_prov($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $result_array[] = $row->AREA_NAMA;
                echo json_encode($result_array);
            }
        }
    }

    public function proses_upload()
    {
        $config['upload_path'] = FCPATH . './uploads/file';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        /* $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768'; */

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userFile')) {
            $token = $this->input->post('token');
            $name = $this->upload->data('file_name');
            $this->db->insert('upload', ['file' => $name, 'token' => $token]);
        }
    }

    public function remove_file()
    {
        $token = $this->input->post('token');
        $data = $this->db->get_where('upload', ['token' => $token]);
        if ($data->num_rows() > 0) {
            $row = $data->row();
            $berkas = $row->file;
            if (file_exists($path = FCPATH . "/uploads/file/" . $berkas)) {
                unlink($path);
            }

            $this->db->delete('upload', ['token' => $token]);
        }

        $this->output->append_output("()");
    }

    public function tambah_data()
    {
        $this->form_validation->set_rules('spj', 'Nomor SPJ', 'trim|required');
        $this->form_validation->set_rules('var_progress', 'Progres Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('var_realisasi', 'Realisasi', 'trim|required');
        $this->form_validation->set_rules('var_tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('var_nama_pengawas', 'Nama Pengawas', 'trim|required');
        $this->form_validation->set_rules('var_keterangan', 'Komentar', 'trim|required');

        if ($this->form_validation->run()) {
            $data = array(
                'SPJ_NO'                 => $this->input->post('spj'),
                'PROGRESS_VALUE'     => $this->input->post('var_progress'),
                'REALISASI'     => $this->input->post('var_realisasi'),
                'PROGRESS_DATE'       => $this->input->post('var_tanggal'),
                'PROGRESS_PENGAWAS'     => $this->input->post('var_nama_pengawas'),
                'PROGRESS_NOTES'   => $this->input->post('var_keterangan'),
                //'INPUT_PROGRESS_DATE' => $this->session->userdata(),
                //'PROGRESS_INPUT_USER' => date('Y-m-d H:i:s')
            );
            $this->M_inp_progres_kerja->insert_progress($data);
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan!');
            redirect('Inp_sanksi_spj', 'refresh');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('inp_sanksi_spj');
            $this->load->view('templates/footer');
        };
    }

    public function tambah_aksi()
    {
        $SPJ_NO = $this->input->post('spj');
        $PROGRESS_VALUE = $this->input->post('var_progress');
        $REALISASI = $this->input->post('var_realisasi');
        $PROGRESS_DATE = $this->input->post('var_tanggal');
        $PROGRESS_PENGAWAS = $this->input->post('var_nama_pengawas');
        $PROGRESS_NOTES = $this->input->post('var_keterangan');

        $data = array(
            'SPJ_NO' => $SPJ_NO,
            'PROGRESS_VALUE' => $PROGRESS_VALUE,
            'REALISASI' => $REALISASI,
            'PROGRESS_DATE' => $PROGRESS_DATE,
            'PROGRESS_PENGAWAS' => $PROGRESS_PENGAWAS,
            'PROGRESS_NOTES' => $PROGRESS_NOTES,
        );

        $this->db->insert_batch('tb_progress', $data);
        redirect('inp_progress_kerja');
    }

    /* public function upload()
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
    } */

    /* public function tambah_aksi()
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
    } */
}
