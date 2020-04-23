<?php
class Kasir extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('m_pendata');
		$this->load->model('m_transaksi');

		if ($this->session->userdata("access") != "kasir"){
			redirect("forbidden");
		}
 
	}

	public function index(){
		$data['judul'] = 'Apotek24 - Kasir';
		$data_obat = $this->m_pendata->get_obat();
		$this->load->view('kasir/templates/sidebar', $data);
		$this->load->view('kasir/templates/header', $data);
		$this->load->view('kasir/body/index',['data'=>$data_obat]);
		$this->load->view('kasir/templates/footer');
	}
	public function createtransaksi(){
		$data = [
			"data_transaksi" => $this->input->post('data',true),
			"total" => $this->input->post('total',true),
			"tanggal_transaksi" => date("Y-m-d")
		];
		$this->m_transaksi->tambah_transaksi($data);
		redirect('/kasir');

	}


	





}