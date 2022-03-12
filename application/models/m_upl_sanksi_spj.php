<?php

class m_upl_sanksi_spj extends CI_Model
{
    function search_spj($title)
    {
        $this->db->like('id_sanksi_spj', $title, 'BOTH');
        $this->db->order_by('id_sanksi_spj', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_sanksi_spj')->result();
    }

    public function get_prov($title)
    {
        $this->db->like('AREA_NAMA', $title, 'BOTH');
        $this->db->order_by('AREA_NAMA', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_area')->result();
    }
}
