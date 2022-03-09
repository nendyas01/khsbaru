<?php

class m_retribusi extends CI_Model
{

    function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_ijin ORDER BY surat_ijin_no ASC");
        return $query->result();
    }
}
