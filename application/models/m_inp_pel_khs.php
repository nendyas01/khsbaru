<?php

class m_inp_pel_khs extends CI_Model
{
    /* public function sselect_spj_no()
    {
        $query = $this->db->query("SELECT DISTINCT a.spj_no 
        FROM tb_spj a, tb_skko_i b 
        WHERE a.skki_no = b.skki_no and b.area_kode = a.area_kode ORDER BY a.spj_input_date ASC");
        return $query->result(); 
    } */

    /* public function select_spj_no()
    {
        $query = $this->db->query("SELECT DISTINCT a.spj_no FROM tb_spj a, tb_skko_i b WHERE a.skki_no = b.skki_no and b.area_kode = a.area_kode");
        return $query->result();
    }
    
    public function select_spj_no()
    {
        $query = $this->db->query("SELECT DISTINCT a.spj_no FROM tb_spj a, tb_skko_i b WHERE a.skki_no = b.skki_no and b.area_kode = a.area_kode");
        return $query->result();
    } */

    /* function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
        return $query->result();
    }
 */
    /* function getarea()
    {
        $query = $this->db->query("SELECT  * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    } */

    /* public function get_spj($title)
    {
        $this->db->distinct('*');
        $this->db->from('tb_spj');
        $this->db->order_by('SPJ_NO', 'ASC');
        return $this->db->get('spj')->result();

        /* $query = $this->db->query("SELECT DISTINCT * FROM tb_spj ORDER BY SPJ_NO ASC");
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
    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tb_master_pelanggaran");
        return $query->result();
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

        $this->db->select('RIGHT(tb_pelanggaran_khs.no_pelanggaran,5)as no_pelanggaran', FALSE);
        $this->db->order_by('no_pelanggaran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_pelanggaran_khs');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_pelanggaran) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $tahun = date("Ym");
        $kodetampil = $tahun . $batas;
        return $kodetampil;
    }
}
