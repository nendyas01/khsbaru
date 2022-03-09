<?php
class m_mapping_vendor extends CI_Model
{

    // function tampil_data_dua()
    // {
    //     $this->db->select('tmv.*, tp.status, ta.area_kode, tp.paket_deskripsi as desc_paket, COUNT( tmv.vendor_id) as total_vendor');
    //     $this->db->from('tb_mapping_vendor as tmv');
    //     $this->db->join('tb_paket as tp', 'tp.paket_jenis = tmv.paket_jenis', 'INNER');
    //     $this->db->join('tb_area as ta', 'ta.area_kode = tmv.area_kode');
    //     $this->db->group_by(array('tmv.mapping_id'));
    //     // $this->db->group_by('tmv.ZONE, tmv.MAPPING_TAHUN, tmv.PAKET_JENIS, tmv.MAPPING_ID');
    //     $this->db->order_by('tmv.zone');
    //     $this->db->where('tp.status', 1);
    //     return $this->db->get();
    // }

    function tampil_data_dua()
    {
        $this->db->select('tmv.*, tp.status, ta.area_kode, tp.paket_deskripsi as desc_paket, COUNT(DISTINCT tmv.vendor_id) as total_vendor');
        $this->db->from('tb_mapping_vendor as tmv');
        $this->db->join('tb_paket as tp', 'tp.paket_jenis = tmv.paket_jenis', 'INNER');
        $this->db->join('tb_area as ta', 'ta.area_kode = tmv.area_kode');
        $this->db->group_by('tmv.mapping_id');
        // $this->db->group_by('tmv.ZONE, tmv.MAPPING_TAHUN, tmv.PAKET_JENIS, tmv.MAPPING_ID');
        // $this->db->order_by('tmv.zone');
        $this->db->where('tp.status', 1);
        return $this->db->get();
    }






    function tampil_data_by_mapping($id)
    {
        $this->db->select('tmv.*, ta.area_nama, tp.status, tp.paket_deskripsi as desc_paket, tv.vendor_nama');
        $this->db->from('tb_mapping_vendor as tmv');
        $this->db->join('tb_area as ta', 'ta.area_kode = tmv.area_kode', 'LEFT');
        $this->db->join('tb_paket as tp', 'tp.paket_jenis = tmv.paket_jenis', 'LEFT');
        $this->db->join('tb_vendor as tv', 'tv.vendor_id = tmv.vendor_id', 'LEFT');

        // $this->db->group_start();
        //     $this->db->where('tmv.ZONE', $VENDOR_ID);
        //     $this->db->where('tmv.MAPPING_TAHUN', $MAPPING_TAHUN);
        //     $this->db->where('tmv.PAKET_JENIS', $PAKET_JENIS);
        // $this->db->group_end();

        $this->db->where('tmv.mapping_id', $id);
        return $this->db->get();
    }

    function getID()
    {
        $this->db->select('MAX(mapping_id) as total_mapping');
        // $this->db->group_by('mapping_id');
        return $this->db->get('tb_mapping_vendor');
    }

    // function getMAPPINGTAHUN()
    // {
    //     $this->db->select('MAX(MAPPING_TAHUN) as total_mapping');
    //     // $this->db->group_by('mapping_id');
    //     return $this->db->get('tb_mapping_vendor');
    // }



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


