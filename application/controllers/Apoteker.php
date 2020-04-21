<?php
class Pendata extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('m_apoteker');

		if ($this->session->userdata("access") != "apoteker"){
			redirect("forbidden");
		}
 
	}

	public function index(){
		$data['judul'] = 'Apotek24 - Apoteker';
		$data_resep = $this->m_apoteker->get_resep();
		$this->load->view('apoteker/templates/sidebar', $data);
		$this->load->view('apoteker/templates/header', $data);
		$this->load->view('apoteker/body/index',['data'=>$data_resep]);
		$this->load->view('apoteker/templates/footer');
	}

	public function createResep(){

		$data = [
			"id_resep" => $this->input->post('id_resep',true),
			"id_user" => $this->input->post('id_user',true),
			"tgl_resep" => $this->input->post('tgl_resep',true),
			"deskripsi" => $this->input->post('deskripsi',true),
		];
		$this->m_apoteker->tambah_resep($data);
		redirect('/apoteker');
	}

	public function updateResep(){
		$data = [
			"tgl_resep" => $this->input->post('tgl_resep',true),
			"deskripsi" => $this->input->post('deskripsi',true),
		];
		$id_resep = $this->input->post('id_resep',true);
		$this->m_apoteker->edit_resep($id_resep,$data);
		redirect('/apoteker');
	}

	public function deleteResep($id_resep){
		$this->m_apoteker->hapus_resep($id_resep);
		redirect('/apoteker');

	}




}