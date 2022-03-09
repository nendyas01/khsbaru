<?php

class m_approve_pelanggaran extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(
            '
            a.no_pelanggaran, b.VENDOR_NAMA, a.tgl_kejadian, c.AREA_NAMA, a.no_spj, a.no_KHS, e.PAKET_DESKRIPSI, f.nama_kel_pelanggaran, a.evidence1, a.evidence2  
        '
        );

        $this->db->from('tb_pelanggaran_khs a');
        $this->db->from('tb_vendor b');
        $this->db->from('tb_area c');
        $this->db->from('tb_spj d');
        $this->db->from('tb_paket e');
        $this->db->from('tb_master_kelompok_pelanggaran f');
        $this->db->where('a.id_vendor = b.VENDOR_ID and a.area_kode = c.AREA_KODE and a.no_spj = d.SPJ_NO and d.PAKET_JENIS = e.PAKET_JENIS and a.id_kel_pelanggaran = f.id_kel_pelanggaran and a.status = 1');
        $this->db->order_by('no_pelanggaran');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {
        $approve_pelanggaran = $this->db->get('tb_pelanggaran');
        $this->db->select('*');
        $this->db->from('tb_pelanggaran');
        $this->db->like('no_pelanggaran', $keyword);
        return $this->db->get->result();
    }
}
