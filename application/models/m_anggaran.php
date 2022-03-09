<?php

class m_anggaran extends CI_Model
{
  public function tampil_data()
  {
    $this->db->select(
      '
        a.SKKI_NO,
        a.SKKI_NILAI,
        a.SKKI_JENIS, 
        a.SKKI_NILAI, 
        a.SKKI_ID,
        a.SKKI_TERPAKAI, 
        a.AREA_KODE, 
          (SELECT AREA_NAMA FROM tb_area WHERE AREA_KODE = a.AREA_KODE) AS nama_area, 
          (select count(b.spj_no) from tb_spj b where b.skki_id = a.skki_id ) as jml_spj, 
          (select sum(b.SPJ_ADD_NILAI) from tb_spj b where b.skki_id = a.skki_id) as total_spj,
          (select sum(b.pembayaran_nominal) from tb_pembayaran b, tb_spj c where b.spj_no = c.spj_no and c.skki_id = a.skki_id) as total_bayar,'
    );
    $this->db->from('tb_skko_i a');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function spj_no(){
    $this->db->select('SPJ_NO');
    $this->db->from('tb_spj');
    $this->db->like('SPJ_TANGGAL_MULAI');
    return $this->db->get()->result();
  }

  public function insert_pembayaran($data)
  {
    $this->db->insert('tb_pembayaran', $data);
  }

  // public function getnominal($tahun){
  //   $this->db->select('SPJ_ADD_NILAI, SPJ_NO, YEAR(SPJ_TANGGAL_MULAI)');
  //   $this->db->from('tb_spj');
  //   $this->db->where('YEAR(SPJ_TANGGAL_MULAI)', $tahun);
  //   $this->db->group_by('SPJ_ADD_NILAI');
  //   return $this->db->get();
  // }

  public function getnominal($id){
    $this->db->select('a.SPJ_ADD_NILAI AS nilai');
    $this->db->from('tb_spj a');
    $this->db->join('tb_progress b', 'a.SPJ_NO = b.SPJ_NO', 'left');
    $this->db->where('a.SPJ_NO', $id);
    // $this->db->where('b.PROGRESS_VALUE !=', 100);
    return $this->db->get()->row();
  }

  public function get_termin_by_no_spj($no_spj) 
  { 
  $this->db->select('*'); 
  $this->db->from('tb_termin'); 
  $this->db->where('spj_no', $no_spj); 
  return $this->db->get()->row(); 
  } 
  
  public function get_progress_by_no_spj($no_spj) 
  { 
  $this->db->select('*'); 
  $this->db->from('tb_progress'); 
  $this->db->where('spj_no', $no_spj); 
  return $this->db->get()->row(); 
  }

  // public function getval(){
  //   $this->db->select('COALESCE(MAX(PROGRESS_VALUE),0)');
  //   $this->db->from('tb_progress');
  //   $this->db->where('SPJ_NO');
  //   return $this->db->get()->row();
  // }

  // public function get_termin(){
  //   $query= "SELECT COALESCE((SELECT status FROM tb_termin WHERE SPJ_NO), '0') FROM DUAL";
  //   return $query;
  // }

  // public function get_nilai_termin1(){
  //   $query = "SELECT COALESCE((SELECT termin_1 FROM tb_termin WHERE SPJ_NO), '0') FROM DUAL";
  //   return $query;
  // }

  public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
        
    }

   
}
