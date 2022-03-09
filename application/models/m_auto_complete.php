<?php

class m_auto_complete extends CI_Model
{
    function search_barang($title)
    {
        $this->db->like('SPJ_NO', $title);
        $this->db->order_by('SPJ_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_spj')->result();
    }
}
