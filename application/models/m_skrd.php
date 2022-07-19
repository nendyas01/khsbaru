<?php

class M_skrd extends CI_Model
{
    function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_ijin ORDER BY surat_ijin_no ASC");
        return $query->result();
    }

    function Update($where, $data, $table)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
}
