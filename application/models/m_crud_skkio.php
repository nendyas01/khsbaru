<?php

class m_crud_skkio extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('a.SKKI_JENIS,
                        a.SKKI_ID,
                        a.SKKI_NO,
                        a.AREA_KODE,
                        a.SKKI_NILAI,
                        a.SKKI_TERPAKAI,
                        a.SKKI_TANGGAL,
                        (SELECT AREA_NAMA FROM tb_area WHERE AREA_KODE = a.AREA_KODE) AS nama_area,');
        $this->db->from('tb_skko_i a');
        return $this->db->get(); // Tadi ga ada ininya perhatiin lagi
    }
    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    }

    public function getjenis()
    {
        $query = $this->db->query("SELECT * FROM tb_skko_i ORDER BY SKKI_JENIS ASC");
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

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_data($SKKI_ID = NULL)
    {

        $query = $this->db->get_where('tb_skko_i', array('SKKI_ID' => $SKKI_ID))->row();
        return $query;
    }

    public function get_history($SKKI_ID)
    {
        $this->db->select('*, h.SKKI_ID as hid, h.SKKI_NO as hno, h.SKKI_JENIS as hjenis,h.SKKI_NILAI as hnilai')
            ->from('tb_history_skkio h')
            ->join('tb_skko_i sk', 'h.SKKI_ID = sk.SKKI_ID', 'left')
            ->join('tb_area a', 'h.AREA_KODE = a.AREA_KODE', 'left')
            // ->group_by('ID', $ID);
            ->where('h.SKKI_ID', $SKKI_ID)
            ->order_by('ID', $SKKI_ID);
        return $this->db->get();
    }
}
