<?php

class M_inp_addendum extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select('SPJ_NO,
                        ADDENDUM_NO,
                        ADDENDUM_NILAI,
                        TGL_ADDENDUM,
                        ADDENDUM_TANGGAL_AKHIR,
                        ADDENDUM_DESKRIPSI,
                        SKKIO_NO,
                        ');
        $this->db->from('tb_addendum ');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

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

    function search_skkio($title)
    {
        $this->db->like('SKKI_NO', $title);
        $this->db->order_by('SKKI_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_skko_i')->result();
    }

    function getskkio()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_skko_i ORDER BY SKKI_NO ASC");
        return $query->result();
    }
    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tb_spj");
        return $query->result();
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
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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
}
