<?php

class m_crud_kontrak extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('VENDOR_ID,
                        PAKET_JENIS,
                        PAGU_KONTRAK,
                        TERPAKAI,
                        RANKING,
                        NO_PJN,
                        TGL_PJN,
                        NO_RKS,
                        TGL_RKS,
                        NO_SPP,
                        TGL_SPP,
                        NO_PENAWARAN,
                        TGL_PENAWARAN,
                        sanksi_terakhir,
                        id_sanksi,
                        tgl_sanksi,
                        tgl_akhir,
                        punishment,
                        BLOCKED');
        $this->db->from('tb_pagu_kontrak');
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

    public function detail_data($VENDOR_ID = NULL)
    {

        $query = $this->db->get_where('tb_pagu_kontrak', array('VENDOR_ID' => $VENDOR_ID))->row();
        return $query;
    }
}
