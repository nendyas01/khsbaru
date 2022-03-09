<?php

class m_list_amandemen extends CI_Model
{


    public function tampil_data()
    {
        $this->db->select(
            '
        
        a.SPJ_NO, 
        a.SPJ_TANGGAL_AKHIR, 
        a.SPJ_NILAI,
        b.ADDENDUM_NO,
        b.ADDENDUM_DESKRIPSI
        '
        );

        $this->db->from('tb_spj a');
        $this->db->from('tb_addendum b');
        $this->db->where('a.SPJ_NO = b.SPJ_NO ');
        $this->db->order_by('SPJ_NO');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
