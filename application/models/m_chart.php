<?php
Class M_chart extends CI_Model
 { 
function jml_total_spj(){
    $this->db->select('a.AREA_KODE, COUNT(DISTINCT SPJ_NO) AS total');
    $this->db->from('tb_spj a');
    $this->db->group_by('a.AREA_KODE');
    $total_spj = $this->db->get();
    $result = $total_spj->result();
    return $result;
}

function getarea(){
    $query = $this->db->query("SELECT * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
}

function tahun(){
    $this->db->select('YEAR(SPJ_TANGGAL_MULAI) as tahun');
    $this->db->from('tb_spj');
    $this->db->group_by('tahun');
    return $this->db->get()->result(); 
}

function tahun_paket(){
    $this->db->select('YEAR(SPJ_TANGGAL_MULAI) as tahun_paket');
    $this->db->from('tb_spj');
    $this->db->group_by('tahun_paket');
    return $this->db->get()->result(); 
}

// function getpaket(){
//     $query = $this->db->query("SELECT * FROM tb_paket ORDER BY PAKET_DESKRIPSI ASC");
//     return $query->result();
// }
function getpaket2($tahun){
    $query = $this->db->query("SELECT * FROM tb_paket INNER JOIN tb_spj ON tb_spj.PAKET_JENIS = tb_paket.PAKET_JENIS
    WHERE YEAR(tb_spj.SPJ_TANGGAL_MULAI) = '$tahun' GROUP BY tb_paket.PAKET_DESKRIPSI");
    return $query->result();
}

function jumlah_gangguan($area_kode, $tahun){
    $this->db->select('MONTH(SPJ_TANGGAL_MULAI) as bulan, MONTHNAME(SPJ_TANGGAL_MULAI) as nama_bulan,  YEAR(SPJ_TANGGAL_MULAI) as tahun');
    $this->db->select("count(IF(gangguan = 0, 1, NULL)) as total_gangguan"); 
    $this->db->select("count(IF(gangguan = 1, 1, NULL)) as total_tidak_gangguan"); 
    $this->db->from('tb_spj');
    $this->db->where('YEAR(SPJ_TANGGAL_MULAI)', $tahun);

    if (!empty($area_kode)) {
        $this->db->where('AREA_KODE', $area_kode);
    }

    if (!empty($tahun)) {
        $this->db->where('YEAR(SPJ_TANGGAL_MULAI)', $tahun);
    }

    $this->db->group_by('bulan');
    return $this->db->get()->result(); 
}

function jml_paket($area_kode, $tahun){

    $this->db->select('MONTH(SPJ_TANGGAL_MULAI) as bulan, MONTHNAME(SPJ_TANGGAL_MULAI) as nama_bulan,  YEAR(SPJ_TANGGAL_MULAI) as tahun, s.SPJ_NILAI');
    $this->db->select("count(IF(p.PAKET_JENIS = 13, 1, NULL)) as paket_1"); 
    $this->db->select("count(IF(p.PAKET_JENIS = 14, 1, NULL)) as paket_2"); 
    $this->db->select("count(IF(p.PAKET_JENIS = 15, 1, NULL)) as paket_3"); 
    $this->db->from('tb_spj as s');
    $this->db->join('tb_paket as p', 'p.PAKET_JENIS=s.PAKET_JENIS', 'LEFT');
    $this->db->where('p.status', 1);
    $this->db->group_by(array('MONTH(s.SPJ_TANGGAL_MULAI)'));

    if (!empty($area_kode)) {
        $this->db->where('AREA_KODE', $area_kode);
    }

    if (!empty($tahun)) {
        $this->db->where('YEAR(s.SPJ_TANGGAL_MULAI)', $tahun);
    }
    return $this->db->get()->result();
    // $this->db->group_by('bulan');
    // return $this->db->get()->result(); 

}

function jml_pagu_spj($paket_jenis, $tahun){
    $this->db->select('YEAR(a.SPJ_TANGGAL_MULAI) AS tahun , c.VENDOR_NAMA, b.PAKET_JENIS, c.VENDOR_NAMA as nama_vendor,
    SUM(a.SPJ_NILAI) AS total_spj_nilai,SUM(b.PAGU_KONTRAK) AS total_pagu');
    $this->db->from('tb_spj a');
    $this->db->join('tb_pagu_kontrak b', 'b.PAKET_JENIS=a.PAKET_JENIS');
    $this->db->join('tb_vendor c', 'c.VENDOR_ID=a.VENDOR_ID');
    // $this->db->where('YEAR(a.SPJ_TANGGAL_MULAI) AS tahun');

    if (!empty($paket_jenis)) {
        $this->db->where('b.PAKET_JENIS', $paket_jenis);
    }

    if (!empty($tahun)) {
        $this->db->where('YEAR(a.SPJ_TANGGAL_MULAI)', $tahun);
    }
    $this->db->group_by('c.VENDOR_NAMA', 'b.PAKET_JENIS');
    return $this->db->get()->result(); 

}

}
?>
