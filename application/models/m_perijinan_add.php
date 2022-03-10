<?php

class m_perijinan_add extends CI_Model
{


    public function edit_data($table)
    {
        return $this->db->get_where($table);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
