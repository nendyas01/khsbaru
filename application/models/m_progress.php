<?php

class m_progress extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(
            '
            a.SPJ_NO, 
            g.ADDENDUM_NILAI,
            a.SPJ_TANGGAL_AKHIR, 
            f.AREA_NAMA, 
            b.VENDOR_NAMA, 
            c.PAKET_DESKRIPSI,  
            a.SPJ_DESKRIPSI 
        '
        );

        $this->db->from('tb_spj a');
        $this->db->join('tb_vendor b',  'a.VENDOR_ID=b.VENDOR_ID', 'left');
        $this->db->join('tb_paket c',  'a.PAKET_JENIS = c.PAKET_JENIS', 'left');
        $this->db->join('tb_skko_i e',  'a.SKKI_NO = e.SKKI_NO', 'left');
        $this->db->join('tb_area f',  'e.AREA_KODE = f.AREA_KODE', 'left');
        $this->db->join('tb_addendum g',  'a.SPJ_NO = g.SPJ_NO', 'left');
        $this->db->where('a.vendor_id != 106 and a.PAKET_JENIS != 0');


        /*$this->db->from('tb_addendum p'); */
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {

        $progress = $this->db->get('tb_spj');
        $this->db->select('*');
        $this->db->from('tb_spj');
        $this->db->like('SPJ_NO', $keyword);
        return $this->db->get->result();
    }

    public function getarea()
    {
        $query = $this->db->query("SELECT  * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    }
}
