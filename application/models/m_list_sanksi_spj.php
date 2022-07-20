<?php

class M_list_sanksi_spj extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(

            'b.AREA_NAMA, a.no_spj,
            (select NO_PJN from tb_pagu_kontrak WHERE VENDOR_ID = a.id_vendor and PAKET_JENIS = paket) as NO_KONTRAK,
            c.PAKET_DESKRIPSI as paket,
            a.id_sanksi,
            d.tgl_input,
            d.jenis_sanksi
            '
        );
        $this->db->from('tb_trans_sanksi_khs a');
        $this->db->from('tb_area b');
        $this->db->from('tb_paket c');
        $this->db->from('tb_sanksi_spj d');
        $this->db->where('a.no_spj = d.no_spj');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {

        $sanksi_ls = $this->db->get('tb_trans_sanksi_khs');
        $this->db->select('*');
        $this->db->from('tb_trans_sanksi_khs');
        $this->db->like('id_sanksi', $keyword);
        return $this->db->get->result();
    }
}
