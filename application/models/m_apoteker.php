<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_apoteker extends CI_Model {

	public function get_resep(){
		$this->db->select('*');
		$this->db->from('resep');
		$query = $this->db->get();
		return $query->result();
	}

	public function hapus_resep($id_resep)
	{
		$this->db->where('id_resep', $id_resep);
		return $this->db->delete('resep');
	}

	public function edit_resep($id_resep,$data)
	{
		$this->db->where('id_resep', $id_resep);
		return $this->db->update('resep', $data);
	}

	public function tambah_resep($data)
	{
		$this->db->insert('resep', $data);
	}
}
