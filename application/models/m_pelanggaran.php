<?php

class m_pelanggaran extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(
            '
            SELECT a.no_pelanggaran, 
            b.VENDOR_NAMA, 
            a.tgl_kejadian, 
            c.AREA_NAMA, 
            a.no_spj, 
            a.no_KHS, 
            e.PAKET_DESKRIPSI, 
            f.nama_kel_pelanggaran, 
            a.evidence1, 
            a.evidence2 
            '
        );

        $this->db->from('tb_spj a');
        $this->db->from('tb_vendor b');
        $this->db->from('tb_area c');
        $this->db->from('tb_spj d');
        $this->db->from('tb_paket e');
        $this->db->from('tb_master_kelompok_pelanggaran f');
        $this->db->where('a.id_vendor = b.VENDOR_ID');
        $this->db->where('a.area_kode = c.AREA_KODE');
        $this->db->where('a.no_spj = d.SPJ_NO');
        $this->db->where('d.PAKET_JENIS = e.PAKET_JENIS');
        $this->db->where('a.id_kel_pelanggaran = f.id_kel_pelanggaran');
        $this->db->where('a.status = 1');
        $this->db->order_by('no_pelanggaran ');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {
        $progress = $this->db->get('tb_pelanggaran_khs');
        $this->db->select('*');
        $this->db->from('tb_pelanggaran_khs');
        $this->db->like('no_pelanggaran', $keyword);
        return $this->db->get->result();
    }

    public function inp_pel_khs()
    {
    }

    public function inp_sanksi_spj()
    {
    }

    public function upl_sanksi_spj()
    {
    }

    public function upl_sanksi_khs()
    {
    }

    public function app_pel()
    {
    }

    public function getdata()
    {
        $query = $this->db->query("SELECT * from tb_trans_sanksi_khs where tgl_upload = '0000-00-00'");
        return $query->result();
    }

    public function list_pelanggaran()
    {
    }

    public function list_sanksi_spj()
    {
    }

    public function list_sanksi()
    {
    }

    public function sanksi_siap_cetak()
    {
    }
}
