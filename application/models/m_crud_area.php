<?php

class m_crud_area extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('AREA_KODE,
                        AREA_NAMA,
                        AREA_ZONE,');
        $this->db->from('tb_area ');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /* public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    } */

    /*  public function getjenis(){
        $query=$this->db->query("SELECT * FROM tb_skko_i ORDER BY SKKI_JENIS ASC");
        return $query->result();
    }
 */
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

    public function detail_data($AREA_KODE = NULL)
    {
        $query = $this->db->get_where('tb_area', array('AREA_KODE' => $AREA_KODE))->row();
        return $query;
    }
}
