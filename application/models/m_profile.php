<?php

class m_retribusi extends CI_Model
{

    function getdata()
    {
        $this->db->select('USERNAME, PASSWORD, email, jabatan, AREA_KODE');
        $this->db->from('tb_user');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
