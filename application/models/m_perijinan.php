<?php

class m_perijinan extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select(
            '
        
        spj_no,
        jumlah_dok

        

        '
        );

        $this->db->from('tb_dokumen ');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function perijinan()
    {
    }

    public function perijinan_add($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
