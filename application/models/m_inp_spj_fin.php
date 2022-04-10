<?php

class m_inp_spj_fin extends CI_Model
{

    function tampil_data_dua()
    {
        $this->db->select('tmv.*, tp.status, 
        tp.paket_deskripsi as desc_paket, 
        COUNT(DISTINCT tmv.vendor_id) as total_vendor');
        $this->db->from('tb_mapping_vendor as tmv');
        $this->db->join('tb_paket as tp', 'tp.paket_jenis = tmv.paket_jenis', 'INNER');
        // $this->db->group_by('tmv.mapping_id');
        $this->db->group_by('tmv.MAPPING_TAHUN, tmv.PAKET_JENIS, tmv.MAPPING_ID');
        // $this->db->order_by('tmv.zone');
        $this->db->where('tp.status', 1);
        return $this->db->get();
    }

    public function getdata()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM tb_skko_i ORDER BY SKKI_NO ASC");
        return $query->result();
    }

    public function getpaket()
    {
        $query = $this->db->query("SELECT PAKET_JENIS, PAKET_DESKRIPSI FROM tb_paket  WHERE STATUS=1");
        return $query->result();
    }

    public function getarea()
    {
        $query = $this->db->query("SELECT AREA_KODE, AREA_NAMA FROM tb_area");
        return $query->result();
    }

    function search_spj($title)
    {
        $this->db->like('SKKI_NO', $title);
        $this->db->order_by('SKKI_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_spj')->result();
    }

    function Save($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function get_vendor_nama($spj_no)
    {
        // $this->db->distinct('c.vendor_nama');
        $this->db->select('c.vendor_nama');
        $this->db->from('tb_spj a');
        $this->db->join('tb_paket b', 'a.paket_jenis = b.paket_jenis', 'left');
        $this->db->join('tb_vendor c', 'a.vendor_id = c.vendor_id', 'left');
        // $this->db->join('tb_area d', 'a.area_kode = d.area_kode', 'left');
        $this->db->where('a.spj_no', $spj_no);
        $this->db->group_by('c.vendor_nama');
        return $this->db->get()->result();
    }

    function get_vendor($jns_paket)
    {
        $hasil = $this->db->query("SELECT v.VENDOR_ID as VENDOR_ID, v.VENDOR_NAMA as VENDOR_NAMA from tb_vendor v 
        join tb_pagu_kontrak pg on pg.VENDOR_ID=v.VENDOR_ID join tb_paket p on p.PAKET_JENIS=pg.PAKET_JENIS 
        where p.PAKET_JENIS ='$jns_paket' group by v.VENDOR_NAMA ");
        return $hasil->result();
    }
}
