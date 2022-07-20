<?php

class M_list_sanksi extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(
            '
            (SELECT b.VENDOR_NAMA FROM tb_vendor b WHERE b.VENDOR_ID = a.VENDOR_ID) as vendor,
            (SELECT c.NO_PJN from tb_pagu_kontrak c WHERE c.PAKET_JENIS = a.PAKET_JENIS and c.VENDOR_ID = a.VENDOR_ID) as no_khs,
            (SELECT d.PAKET_DESKRIPSI from tb_paket d WHERE d.PAKET_JENIS = a.PAKET_JENIS) as paket,
            a.ZONE,
            (SELECT e.id_sanksi from tb_trans_sanksi_khs e WHERE e.id_vendor = a.VENDOR_ID and e.paket = a.PAKET_JENIS and e.id_master_sanksi = "TT1") as TT1
            '
        );

        $this->db->from('tb_mapping_vendor a');
        $this->db->where('a.MAPPING_TAHUN = 2017');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {
        $list_sanksi = $this->db->get('tb_vendor');
        $this->db->select('*');
        $this->db->from('ttb_vendor');
        $this->db->like('VENDOR_NAMA', $keyword);
        return $this->db->get->result();
    }
}
