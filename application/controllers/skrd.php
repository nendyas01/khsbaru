<?php


class Skrd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("status") == 0) {
            redirect('login');
        }

        $this->load->model('M_skrd');
    }

    public function index()
    {
        $data['Skrd'] = $this->M_skrd->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Skrd', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $this->M_skrd->set_rules('judul', 'Judul', 'required');

        if ($this->M_skrd->run() == FALSE) {
            $this->load->view('upload/skrd');
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
}
