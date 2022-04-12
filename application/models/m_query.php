<?php

class m_query extends CI_Model
{

    public function M_DeleteMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_mahasiswa');
    }
}
