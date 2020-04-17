<?php 
 
class M_register extends CI_Model{	
	function register($table, $value){		
		return $this->db->insert($table,$value);
	}	
}