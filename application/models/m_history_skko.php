<?php 

class m_history_skko extends CI_Model{
    public function __construct(){ 
        parent::__construct(); 
        $this->load->model('m_history_skko'); 
    }
    
    public function history_skko()
    {
        $query = $this->db->query("SELECT * FROM tb_skko_i ORDER BY SKKI_NO");
        return $query->result();
    }

}
 ?>