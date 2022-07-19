<?php


class Monitoring_add extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("status") == 0) {
            redirect('login');
        }

        $this->load->model('M_monitoring');
    }

    public function index()
    {
        /* $where = array('spj_no' => $spj_no); */
        $data['title'] = "Upload Multifile";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Monitoring_add');
        $this->load->view('templates/footer');
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
