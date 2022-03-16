<?php

class m_upl_sanksi_khs extends CI_Model
{
    function search_spj($title)
    {
        $this->db->like('no_pelanggaran', $title, 'BOTH');
        $this->db->order_by('no_pelanggaran', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_pelanggaran_khs')->result();
    }
    function Update($where, $data, $table)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
}
