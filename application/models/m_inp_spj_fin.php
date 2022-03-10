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

    function search_spj($title)
    {
        $this->db->like('SKKI_NO', $title);
        $this->db->order_by('SKKI_NO', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_spj')->result();
    }
}
