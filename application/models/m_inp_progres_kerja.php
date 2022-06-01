<?php

class m_inp_progres_kerja extends CI_Model
{
    /* public function sselect_spj_no()
    {
        $query = $this->db->query("SELECT DISTINCT a.spj_no 
        FROM tb_spj a, tb_skko_i b 
        WHERE a.skki_no = b.skki_no and b.area_kode = a.area_kode ORDER BY a.spj_input_date ASC");
        return $query->result();
    } */

    /*  function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    } */

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
