<?php

class M_monitoring extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select('spj_no,
                        lokasi,
                        surat_ijin_no,
                        tgl_surat_keluar,
                        tgl_survey,
                        hasil_survey,
                        tgl_terbit_skrd,
                        biaya_retribusi');
        $this->db->from('tb_ijin');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function Monitoring_add($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
