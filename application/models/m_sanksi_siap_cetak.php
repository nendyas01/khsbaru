<?php

class M_sanksi_siap_cetak extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(

            'b.AREA_NAMA, 
            a.id_sanksi, 
            a.id_sanksi_spj, 
            a.no_pelanggaran,
            (SELECT d.nama_kel_pelanggaran from tb_master_kelompok_pelanggaran d WHERE 
            d.id_kel_pelanggaran = (SELECT e.id_kel_pelanggaran from tb_pelanggaran_khs e WHERE e.no_pelanggaran = a.no_pelanggaran)) as jenis_pelanggaran,
            a.no_spj,
            (select f.VENDOR_NAMA from tb_vendor f WHERE f.VENDOR_ID = (SELECT g.VENDOR_ID from tb_spj g WHERE g.spj_no = a.no_spj)) as nama_vendor,
            (select NO_PJN from tb_pagu_kontrak WHERE VENDOR_ID = a.id_vendor  and PAKET_JENIS = paket) as no_kontrak,
            c.PAKET_DESKRIPSI as paket,
            a.id_master_sanksi'
        );
        $this->db->from('tb_trans_sanksi_khs a');
        $this->db->from('tb_area b');
        $this->db->from('tb_paket c');
        $this->db->where('a.area_kode = b.AREA_KODE and a.paket = c.PAKET_JENIS');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {

        $trans_sanksi = $this->db->get('tb_trans_sanksi_khs');
        $this->db->select('*');
        $this->db->from('tb_trans_sanksi_khs');
        $this->db->like('id_sanksi', $keyword);
        return $this->db->get->result();
    }
}
