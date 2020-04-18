<?php

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}

	public function index(){
		$data['judul'] = 'Apotek24 - Login';
		$this->load->view('login', $data);
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("users",$where);
		if($cek->num_rows() > 0){

			$user = $cek->result()[0];

			$w_access = array(
				'id_user' => $user->id_user,
			);
			$access = $this->m_login->cek_login("access",$w_access)->result()[0];
 
			$data_session = array(
				'nama' => $user->nama,
				'access' => $access->access,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url($access->access));
 
		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}