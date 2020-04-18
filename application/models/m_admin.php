<?php 
 
class M_admin extends CI_Model{	
	function get_user_and_access(){		
        $builder = $this->db;
        $builder->from('users');
        $builder->select('*');
        $builder->join('access', 'users.id_user = access.id_user');
        
        return $builder->get()->result();
	}
}