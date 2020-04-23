<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function tambah_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
	}
}
