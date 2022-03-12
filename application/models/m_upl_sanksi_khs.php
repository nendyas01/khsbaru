<?php

class m_upl_sanksi_khs extends CI_Model
{
    function search_spj($title)
    {
        $this->db->like('id_sanksi_spj', $title, 'BOTH');
        $this->db->order_by('id_sanksi_spj', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_sanksi_spj')->result();
    }
}
