<?php

class Pendata extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

		if ($this->session->userdata("access") != "pendata"){
			redirect("login");
		}
 
	}


	public function index(){
		$data['judul'] = 'Apotek24 - Home';
		$this->load->view('pendata/templates/sidebar', $data);
		$this->load->view('pendata/templates/header', $data);
		$this->load->view('pendata/body/index');
		$this->load->view('pendata/templates/footer');
	}

}