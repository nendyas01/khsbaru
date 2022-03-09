<?php

class m_list_sanksi_spj extends CI_Model
{
    public function tampil_data()
    {
        /* $this->db->select(
            '
        
        a.no_pelanggaran, 
        a.tgl_kejadian, 
        b.VENDOR_NAMA, 
        c.AREA_NAMA, 
        a.no_spj, 
        a.no_KHS,
            (SELECT d.PAKET_DESKRIPSI from tb_paket d WHERE d.PAKET_JENIS = (SELECT e.PAKET_JENIS from tb_spj e WHERE e.SPJ_NO = a.no_spj) ) as paket,
            (SELECT f.nama_kel_pelanggaran from tb_master_kelompok_pelanggaran f WHERE f.id_kel_pelanggaran = a.id_kel_pelanggaran) as jenis,
            (SELECT g.KETERANGAN from tb_status_pelanggaran g WHERE g.STATUS = a.status) as status,
            "CEK" as REF,
        '
        );

        $this->db->from('tb_pelanggaran_khs a');
        $this->db->from('tb_vendor b');
        $this->db->from('tb_area c');
        $this->db->where('a.id_vendor = b.VENDOR_ID and a.area_kode = c.AREA_KODE');

        $query = $this->db->get();
        $result = $query->result();
        return $result; */
    }

    /* public function get_keyword($keyword)
    {
        $approve_pelanggaran = $this->db->get('tb_pelanggaran');
        $this->db->select('*');
        $this->db->from('tb_pelanggaran');
        $this->db->like('no_pelanggaran', $keyword);
        return $this->db->get->result();
    } */
}
