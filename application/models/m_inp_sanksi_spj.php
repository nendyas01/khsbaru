<?php

class m_inp_sanksi_spj extends CI_Model
{
    function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    }

    function getarea()
    {
        $query = $this->db->query("SELECT  * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    }
}
