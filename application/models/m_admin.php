<?php 
 
class M_admin extends CI_Model{	
	function get_user_and_access(){		
                $builder = $this->db;
                $builder->from('users');
                $builder->select('users.*, access.access');
                $builder->join('access', 'users.id_user = access.id_user', 'left');
                
                return $builder->get()->result();
        }
        function add_access($value){
                return $this->db->insert('access',$value);
        }
}