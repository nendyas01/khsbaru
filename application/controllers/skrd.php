<?php


class skrd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_skrd');
    }

    public function index()
    {
        $data['skrd'] = $this->m_skrd->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('skrd', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $this->m_retribusi->set_rules('judul', 'Judul', 'required');

        if ($this->m_retribusi->run() == FALSE) {
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
}
