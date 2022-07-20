<?php

class M_inp_progres_kerja extends CI_Model
{

    function search_spj($title)
    {
        $this->db->like('SPJ_NO', $title);
        $this->db->order_by('SPJ_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_spj')->result();
    }

    function Save($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function Get_Where($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // public function tampil_data()
    // {
    //     $this->db->select('AREA_KODE,
    //                     AREA_NAMA,
    //                     AREA_ZONE,');
    //     $this->db->from('tb_area ');
    //     $query = $this->db->get();
    //     $result = $query->result();
    //     return $result;
    // }
}
