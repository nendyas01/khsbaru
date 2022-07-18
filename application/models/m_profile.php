<?php

class M_profile extends CI_Model
{

    function getdata()
    {
        $this->db->select('USERNAME,PASSWORD,email');
        $this->db->from('tb_user');
        $this->db->where('username',$this->session->userdata("username"));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
