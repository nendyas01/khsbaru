<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_registrasi extends CI_Model
{
    public function getarea()
    {

        $query = $this->db->query("SELECT * FROM tb_area ORDER BY AREA_NAMA ASC");
        return $query->result();
    }

    public function getrole()
    {
        $query = $this->db->query("SELECT * FROM tb_role ORDER BY role_nama ASC");
        return $query->result();
    }
}
