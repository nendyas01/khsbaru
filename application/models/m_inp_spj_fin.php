<?php

class m_inp_spj_fin extends CI_Model
{

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
}
