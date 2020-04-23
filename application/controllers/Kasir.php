<?php
class Kasir extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('m_pendata');
		$this->load->model('m_kasir');

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

	public function create_dat_transaksi(){
		if ($this->input->post('data',true)!=''){
			$id = uniqid('TR-');
			$data =[
				"id_transaksi" => $id,
				"data_transaksi" => $this->input->post('data',true),
				"total" => $this->input->post('total',true),
				"tanggal_transaksi" => date("Y-m-d")
			];
			$this->m_kasir->tambah_transaksi($data);
		}
		redirect('/kasir');
	}

	public function edit_dat_transaksi(){
		if ($this->input->post('data',true)!=''){
			$id = $this->input->post('id_transaksi',true);
			$data = [
				"id_transaksi" => $this->input->post('id_transaksi',true),
				"data_transaksi" => $this->input->post('data',true),
				"total" => $this->input->post('total',true),
				"tanggal_transaksi" => $this->input->post('tanggal_transaksi',true)
			];
			$this->m_kasir->edit_transaksi($id,$data);
		}
		redirect('/kasir/daftar_tr');
	}

	public function delete_dat_transaksi($id){
		$this->m_kasir->hapus_transaksi($id);
		redirect('/kasir/daftar_tr');

	}

	public function daftar_tr(){
		$data['judul'] = 'Apotek24 - Kasir';
		$data_transaksi['transaksi']= $this->m_kasir->get_transaksi();
		$this->load->view('kasir/templates/sidebar', $data);
		$this->load->view('kasir/templates/header', $data);
		$this->load->view('kasir/body/daftar_transaksi',$data_transaksi);
		$this->load->view('kasir/templates/footer');
	}

	public function edit_tr($id){
		$data['judul'] = 'Apotek24 - Kasir';
		$data_transaksi['data']=$this->m_pendata->get_obat();;
		$data_transaksi['datatr']= $this->m_kasir->get_transaksi_id($id);
		$this->load->view('kasir/templates/sidebar', $data);
		$this->load->view('kasir/templates/header', $data);
		$this->load->view('kasir/body/edit_transaksi',$data_transaksi);
		$this->load->view('kasir/templates/footer');
	}
	
	
}