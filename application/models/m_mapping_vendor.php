<?php
class M_mapping_vendor extends CI_Model
{
    function tampil_data_dua()
    {
        $this->db->select('tmv.*, tp.status, COUNT(DISTINCT ta.area_kode) as total_area, 
        tp.paket_deskripsi as desc_paket, 
        COUNT(DISTINCT tmv.vendor_id) as total_vendor');
        $this->db->from('tb_mapping_vendor as tmv');
        $this->db->join('tb_paket as tp', 'tp.paket_jenis = tmv.paket_jenis', 'INNER');
        $this->db->join('tb_area as ta', 'ta.area_kode = tmv.area_kode');
        // $this->db->group_by('tmv.mapping_id');
        $this->db->group_by('tmv.MAPPING_TAHUN, tmv.PAKET_JENIS, tmv.MAPPING_ID');
        // $this->db->order_by('tmv.zone');
        $this->db->where('tp.status', 1);
        return $this->db->get();
    }

    public function get_vendor_nama($mapping_id)
    {
        // $this->db->distinct('c.vendor_nama');
        $this->db->select('c.vendor_nama');
        $this->db->from('tb_mapping_vendor a');
        $this->db->join('tb_paket b', 'a.paket_jenis = b.paket_jenis', 'left');
        $this->db->join('tb_vendor c', 'a.vendor_id = c.vendor_id', 'left');
        // $this->db->join('tb_area d', 'a.area_kode = d.area_kode', 'left');
        $this->db->where('a.mapping_id', $mapping_id);
        $this->db->group_by('c.vendor_nama');
        return $this->db->get()->result();
    }

    public function get_area_nama($mapping_id)
    {
        // $this->db->distinct();
        $this->db->select('c.area_nama');
        $this->db->from('tb_mapping_vendor a');
        $this->db->join('tb_paket b', 'a.paket_jenis = b.paket_jenis', 'left');
        $this->db->join('tb_area c', 'a.area_kode = c.area_kode', 'left');
        $this->db->where('a.mapping_id', $mapping_id);
        $this->db->group_by('c.area_nama');
        return $this->db->get()->result();
    }


    function getID()
    {
        $this->db->select('MAX(mapping_id) as total_mapping');
        // $this->db->group_by('mapping_id');
        return $this->db->get('tb_mapping_vendor');
    }



    function get_vendor($jns_paket)
    {
        $hasil = $this->db->query("SELECT v.VENDOR_ID as VENDOR_ID, v.VENDOR_NAMA as VENDOR_NAMA from tb_vendor v 
        join tb_pagu_kontrak pg on pg.VENDOR_ID=v.VENDOR_ID join tb_paket p on p.PAKET_JENIS=pg.PAKET_JENIS 
        where p.PAKET_JENIS ='$jns_paket' group by v.VENDOR_NAMA ");
        return $hasil->result();
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getarea()
    {
        $query = $this->db->query("SELECT * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    }


    public function getpaket()
    {
        $query = $this->db->query("SELECT PAKET_JENIS, PAKET_DESKRIPSI FROM tb_paket  WHERE STATUS=1");
        return $query->result();
    }

    // public function edit_data($where, $table)
    // {
    //     return $this->db->get_where($table, $where);
    // }

    // public function update_data($where, $data, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->update($table, $data);
    // }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
