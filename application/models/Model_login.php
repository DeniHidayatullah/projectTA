<?php 
 
class Model_login extends CI_Model{	
	function get($where = array()) {
        if($where) {
            return $this->db->get_where("user",$where);
        } else {
            return $this->db->get("user");
        }
    }

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}