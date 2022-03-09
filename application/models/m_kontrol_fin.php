<?php

class m_kontrol_fin extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select(
            '  
            e.vendor_nama, x.rating_laporan_audit, x.fin_limit, x.fin_current, x.jumlah_area, c.paket_deskripsi, x.vendor_id, x.paket_jenis,
            (select pk.pagu_kontrak from tb_pagu_kontrak pk where pk.vendor_id = x.vendor_id and pk.paket_jenis = x.paket_jenis  ) as PAGU_KONTRAK,
            (select ((pk.terpakai/pk.pagu_kontrak)*100) from tb_pagu_kontrak pk where pk.vendor_id = x.vendor_id and pk.paket_jenis = x.paket_jenis  ) as PERSEN_KONTRAK,
            x.zone,
            x.mapping_tahun as tahun
            FROM
            (SELECT DISTINCT b.mapping_tahun,b.paket_jenis, b.zone, a.vendor_id, a.rating_laporan_audit, a.fin_limit, a.fin_current , (select COUNT(d.AREA_KODE) from tb_mapping_vendor d where d.VENDOR_ID = a.vendor_id and d.PAKET_JENIS = b.paket_jenis) as jumlah_area
            from
            tb_fin_vendor a left join tb_mapping_vendor b on a.vendor_id = b.vendor_id) as x 
            left join tb_paket c on c.paket_jenis = x.paket_jenis 
            inner join tb_vendor e on e.vendor_id = x.vendor_id
            AND c.STATUS = 1
            ORDER BY e.vendor_nama DESC
            
        '

        );
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_keyword($keyword)
    {
        $kontrol_fin = $this->db->get('tb_mapping_vendor');
        //$data=$kontrol_fin->result(); 
        $this->db->select('*');
        $this->db->from('tb_mapping_vendor');
        $this->db->like('ZONE', $keyword);
        $this->db->or_like('VENDOR_ID', $keyword);
        return $this->db->get->result();
    }

    function edit_data($where, $edit)
    {
        return $this->db->get_where($edit, $where);
    }

    public function tambah()
    {
    }

    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tb_addendum ORDER BY SPJ_NO ASC");
        return $query->result();
    }

    public function getjenis()
    {
        $query = $this->db->query("SELECT * FROM tb_skko_i ORDER BY SKKI_NO ASC");
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

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }



    public function tambah_list()
    {
    }
}
