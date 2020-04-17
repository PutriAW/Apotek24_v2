<?php

class Register extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_register');
 
	}

	public function index(){
		$data['judul'] = 'Apotek24 - Register';
		$this->load->view('register', $data);
	}

	function register(){
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jenis_kelamin');
		$birth_place = $this->input->post('tempat_lahir');
		$birth_day = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$phone = $this->input->post('phone');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$re_pass = $this->input->post('re-password');
 
		$data = array(
			'nama' => $nama,
			'jenis_kelamin' => $jk,
			'tempat_lahir' => $birth_place,
			'tgl_lahir' => $birth_day,
			'alamat' => $alamat,
			'no_hp' => $phone,
			'username' => $username,
			'password' => $password
			);
		$this->m_register->register('users', $data);
		redirect('login');
	}

}