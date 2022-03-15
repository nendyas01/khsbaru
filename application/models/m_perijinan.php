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

    public function edit_data($where, $table)
    {

        return $this->db->get_where($table, $where);
    }

    function Update($where, $data, $table)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
