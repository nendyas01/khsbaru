<?php

class m_inp_sanksi_spj extends CI_Model
{
    /* function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    }

    function getarea()
    {
        $query = $this->db->query("SELECT  * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    } */

    function search_spj($title)
    {
        $this->db->like('SPJ_NO', $title);
        $this->db->order_by('SPJ_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_spj')->result();
    }

    public function get_prov($title)
    {
        $this->db->like('AREA_NAMA', $title, 'BOTH');
        $this->db->order_by('AREA_NAMA', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_area')->result();
    }
}
