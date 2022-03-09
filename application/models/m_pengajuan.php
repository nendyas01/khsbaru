<?php

class m_pengajuan extends CI_Model
{

    function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    }
}
