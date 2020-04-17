<?php

class Pendata extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('M_Pendata');

		if ($this->session->userdata("access") != "pendata"){
			redirect("login");
		}
 
	}

	public function index(){
		$data['judul'] = 'Apotek24 - Home';
		$data_obat = $this->M_Pendata->GetObat();
		$this->load->view('pendata/templates/sidebar', $data);
		$this->load->view('pendata/templates/header', $data);
		$this->load->view('pendata/body/index',['data'=>$data_obat]);
		$this->load->view('pendata/templates/footer');
	}

	public function createObat(){

		$data = [
			"id_obat" => $this->input->post('id_obat',true),
			"nama_obat" => $this->input->post('nama_obat',true),
			"jenis" => $this->input->post('jenis',true),
			"dosis" => $this->input->post('dosis',true),
			"expire_date" => $this->input->post('expire_date',true),
			"komposisi" => $this->input->post('komposisi',true),
			"indikasi" => $this->input->post('indikasi',true),
			"aturan_pakai" => $this->input->post('aturan_pakai',true),
			"harga" => $this->input->post('harga',true),
			"id_supplier" => $this->input->post('id_supplier',true),
		];
		$this->M_Pendata->tambah_obat($data);
		redirect('/pendata');

	}

	public function updateObat(){
		$data = [
			"nama_obat" => $this->input->post('nama_obat',true),
			"jenis" => $this->input->post('jenis',true),
			"dosis" => $this->input->post('dosis',true),
			"expire_date" => $this->input->post('expire_date',true),
			"komposisi" => $this->input->post('komposisi',true),
			"indikasi" => $this->input->post('indikasi',true),
			"aturan_pakai" => $this->input->post('aturan_pakai',true),
			"harga" => $this->input->post('harga',true),
			"id_supplier" => $this->input->post('id_supplier',true),
		];
		$id_obat = $this->input->post('id_obat',true);
		$this->M_Pendata->edit_obat($id_obat,$data);
		redirect('/pendata');
	}

	public function deleteObat($id_obat){
		$this->M_Pendata->hapus_obat($id_obat);
		redirect('/pendata');

	}




}