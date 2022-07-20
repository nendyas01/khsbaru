<?php

class M_upl_sanksi_spj extends CI_Model
{
    function search_spj($title)
    {
        $this->db->like('id_sanksi_spj', $title, 'BOTH');
        $this->db->order_by('id_sanksi_spj', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_sanksi_spj')->result();
    }

    public function get_prov($title)
    {
        $this->db->like('AREA_NAMA', $title, 'BOTH');
        $this->db->order_by('AREA_NAMA', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_area')->result();
    }

    /* function Update($where, $table)
    {
        $this->db->update($table, $where);
        return $this->db->affected_rows();
    } */

    function update_data($data, $where, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getarea()
    {
        $query = $this->db->query("SELECT AREA_KODE, AREA_NAMA FROM tb_area");
        return $query->result();
    }

    function Save($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function no_spj($no_spj)
    {
        $this->db->select('*');
        $this->db->from('tb_');
        $this->db->where('spj_no', $no_spj);
        return $this->db->get()->row();
    }

    /* function Update($where, $data, $table)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    } */
}
