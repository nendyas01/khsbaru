<?php

class m_perijinan_add extends CI_Model
{


    public function edit($table)
    {
        return $this->db->get_where($table);
    }

    public function update_data($data, $table)
    {
        $this->db->update($table, $data);
    }
}
