<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_ticket extends CI_Model{
    public function GetData($id){
        $this->db->select('*');    
        $this->db->from('t_registration AS a');
        $this->db->where('a.user_id', $id);
        $this->db->where('a.status_id', '4');

        $query = $this->db->get();
        return $query->result();
    }


}
?>