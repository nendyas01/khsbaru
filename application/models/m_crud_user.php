<?php

class m_crud_user extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('tb_user.*,tb_area.AREA_NAMA,tb_area.AREA_ZONE');
        $this->db->from('tb_user');
        $this->db->join('tb_area', 'tb_area.AREA_KODE = tb_user.AREA_KODE', 'inner');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getarea()
    {
        $query = $this->db->query("SELECT * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    }

    public function getrole()
    {
        $query = $this->db->query("SELECT * FROM tb_role ORDER BY role_nama ASC");
        return $query->result();
    }


    public function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_data($USERNAME = NULL)
    {

        $query = $this->db->get_where('tb_user', array('USERNAME' => $USERNAME))->row();
        return $query;
    }
}
