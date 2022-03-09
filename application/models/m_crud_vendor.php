<?php

class m_crud_vendor extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('VENDOR_ID,
                        VENDOR_NAMA,
                        TAHUN,
                        DIREKSI_VENDOR,
                        EMAIL,
                        TELEPON,
                        STATUS,
                        EMAIL_2,
                        JABATAN');
        $this->db->from('tb_vendor ');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
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

    function detail_crud_vendor($VENDOR_ID = NULL)
    {
        $query = $this->db->get_where('tb_vendor', array('VENDOR_ID' => $VENDOR_ID))->row();
        return $query;
    }
}
