<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasir extends CI_Model {

	public function get_transaksi(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_transaksi_id($id){
		$this->db->where('id_transaksi', $id);
		$query = $this->db->get('transaksi')->row_array();
		return $query;
	}

	public function get_obat(){
		$this->db->select('*');
		$this->db->from('obat');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
	}

	public function edit_transaksi($id, $data){
		$this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
	}

	public function hapus_transaksi($id){
		$this->db->where('id_transaksi', $id);
		$this->db->delete('transaksi');
	}


	
}
