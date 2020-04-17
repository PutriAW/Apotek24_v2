<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pendata extends CI_Model {

	public function GetObat(){
		$this->db->select('*');
		$this->db->from('obat');
		$query = $this->db->get();
		return $query->result();
	}

	public function hapus_obat($id_obat)
	{
		$this->db->where('id_obat', $id_obat);
		return $this->db->delete('obat');
	}

	public function edit_obat($id_obat,$data)
	{
		$this->db->where('id_obat', $id_obat);
		return $this->db->update('obat', $data);
	}

	public function tambah_obat($data)
	{
		$this->db->insert('obat', $data);
	}
}
