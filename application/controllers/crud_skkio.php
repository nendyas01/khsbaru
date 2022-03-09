<?php

class crud_skkio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud_skkio');
    }
    public function index()
    {
        $data['crud_skkio'] = $this->m_crud_skkio->tampil_data()->result();
        $data['nama_area'] = $this->m_crud_skkio->getdata();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('crud_skkio', $data);
        $this->load->view('templates/footer');
        // print_r($data);
        // var_dump($data['crud_skkio']);
    }

    public function tambah_aksi()
    {
        $SKKI_ID = $this->input->post('SKKI_ID');
        $SKKI_JENIS = $this->input->post('SKKI_JENIS');
        $SKKI_NO = $this->input->post('SKKI_NO');
        $AREA_KODE = $this->input->post('AREA_KODE');
        $SKKI_NILAI = $this->input->post('SKKI_NILAI');
        $SKKI_TERPAKAI = $this->input->post('SKKI_TERPAKAI');
        $SKKI_TANGGAL = $this->input->post('SKKI_TANGGAL');

        $data = array(
            'SKKI_ID'                  => $SKKI_ID,
            'SKKI_JENIS'               => $SKKI_JENIS,
            'SKKI_NO'                  => $SKKI_NO,
            'AREA_KODE'                => $AREA_KODE,
            'SKKI_NILAI'               => $SKKI_NILAI,
            'SKKI_TERPAKAI'            => $SKKI_TERPAKAI,
            'SKKI_TANGGAL'             => $SKKI_TANGGAL,

        );
        $this->m_crud_skkio->input_data($data, 'tb_skko_i');
        redirect('crud_skkio/index');
    }

    public function hapus($SKKI_ID)
    {
        $where = array('SKKI_ID' => $SKKI_ID);
        $this->m_crud_skkio->hapus_data($where, 'tb_skko_i');
        redirect('crud_skkio/index');
    }

    public function edit_crud_skkio($SKKI_ID=null)
    {
        $where = array('SKKI_ID' => $SKKI_ID);
        $data['crud_skkio'] = $this->m_crud_skkio->edit_data($where, 'tb_skko_i')->result();
        $data['area'] = $this->m_crud_skkio->getdata($where, 'tb_skko_i');
        $data['SKKI_ID']=$SKKI_ID;
        $key=$this->db->query("select * from tb_skko_i where SKKI_ID='$SKKI_ID'");
        $row=$key->row();
        $ID=$row->SKKI_ID;
        $kode=$row->AREA_KODE;
        // $no_skki=$row->SKKI_NO;
        // $jenis=$row->SKKI_JENIS;
        // $nilai=$row->SKKI_NILAI;
        // $terpakai=$row->SKKI_TERPAKAI;
        // $tanggal=$row->SKKI_TANGGAL;

        // $this->db->query("insert into tb_history_skkio values('','$ID','$kode', now()) ");

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_crud_skkio', $data);
        $this->load->view('templates/footer');
        
    }

    public function update($SKKI_ID=null)
    {
        // $SKKI_ID = $this->input->post('SKKI_ID');
        $SKKI_JENIS = $this->input->post('SKKI_JENIS');
        $SKKI_NO = $this->input->post('SKKI_NO');
        $AREA_KODE = $this->input->post('AREA_KODE');

    
        $SKKI_NILAI = $this->input->post('SKKI_NILAI');
        $SKKI_TERPAKAI = $this->input->post('SKKI_TERPAKAI');
        $SKKI_TANGGAL = $this->input->post('SKKI_TANGGAL');

        //history
        $input_history = $this->input->post();
        $history = [
            'SKKI_ID' => $input_history['SKKI_ID'],
            'SKKI_JENIS' => $input_history['h_jenis'],
            'SKKI_NO' => $input_history['h_no'],
            'AREA_KODE' => $input_history['h_area'],
            'SKKI_NILAI' => $input_history['h_nilai'],
            'SKKI_TANGGAL' => $input_history['h_tanggal'],
            'DATE' => time(),

        ];

        // $data = array(
        //     'SKKI_ID'                  => $SKKI_ID,
        //     'SKKI_JENIS'               => $SKKI_JENIS,
        //     'SKKI_NO'                  => $SKKI_NO,
        //     'AREA_KODE'                => $AREA_KODE,
        //     'SKKI_NILAI'               => $SKKI_NILAI,
        //     'SKKI_TERPAKAI'            => $SKKI_TERPAKAI,
        //     'SKKI_TANGGAL'             => $SKKI_TANGGAL,
        // );

        // $where = array('SKKI_ID' => $SKKI_ID);
        // $this->m_crud_skkio->update_data($where, $data, 'tb_skko_i');
        
        $this->db->query("update tb_skko_i set SKKI_JENIS='$SKKI_JENIS',SKKI_NO='$SKKI_NO',AREA_KODE='$AREA_KODE',SKKI_NILAI='$SKKI_NILAI',SKKI_TERPAKAI='$SKKI_TERPAKAI',
        SKKI_TANGGAL='$SKKI_TANGGAL' where SKKI_ID='$SKKI_ID'");

        // $this->db->query("insert into tb_history_skkio values('','$SKKI_ID', '$AREA_KODE', '$SKKI_NILAI', '$SKKI_NO', '$SKKI_JENIS', '$SKKI_TANGGAL',now()) ");
        $this->db->insert('tb_history_skkio', $history);
        
        redirect('crud_skkio/index');
    }

   

    public function detail_crud_skkio($SKKI_ID=null)
    {
        // var_dump($SKKI_ID);
        // die();
        $detail_crud_skkio = $this->m_crud_skkio->get_history($SKKI_ID);
       
        // $data['detail_crud_skkio'] = $detail_crud_skkio;
        // // $data['hasil_edit_crud_skkio'] = $this->m_crud_skkio->insert_hasil_edit()->result();
        // $data['area'] = $detail_crud_skkio;

        $data = [
            'history' => $detail_crud_skkio,
            'ID' => $SKKI_ID
        ];
        // $data['ID']=$SKKI_ID;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_crud_skkio', $data);
        $this->load->view('templates/footer');
    }

    // public function detail_history_skki($SKKI_ID = null){
    //     // var_dump($SKKI_ID);
    //     // die();
    //     $data['ID']=$SKKI_ID;
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('detail_history_skki', $data);
    //     $this->load->view('templates/footer');
    // }
}
