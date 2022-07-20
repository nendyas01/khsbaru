<?php

class M_inp_sanksi_spj extends CI_Model
{
    /* function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    }

    function getarea()
    {
        $query = $this->db->query("SELECT  * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    } */

    function search_spj($title)
    {
        $this->db->like('SPJ_NO', $title);
        $this->db->order_by('SPJ_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_spj')->result();
    }

    public function get_prov($title)
    {
        $this->db->like('AREA_NAMA', $title, 'BOTH');
        $this->db->order_by('AREA_NAMA', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_area')->result();
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

    public function Get_Where($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function kodeotomatis()
    {

        $this->db->select('RIGHT(tb_sanksi_spj.id_sanksi_spj,5)as id_sanksi_spj', FALSE);
        $this->db->order_by('id_sanksi_spj', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_sanksi_spj');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_sanksi_spj) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $tahun = date("Ym");
        $kodetampil = $tahun . $batas;
        return $kodetampil;
    }
}
