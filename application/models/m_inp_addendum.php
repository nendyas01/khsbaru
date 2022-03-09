<?php

class m_inp_addendum extends CI_Model
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

    function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    }

    function getskkio()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_skko_i ORDER BY SKKI_NO ASC");
        return $query->result();
    }

    public function input_data($data, $table)
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
}
