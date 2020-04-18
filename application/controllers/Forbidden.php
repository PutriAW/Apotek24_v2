<?php
class Forbidden extends CI_Controller{
	// function __construct(){
	// 	parent::__construct();		
 
	// }

	public function index(){
        $access = $this->session->userdata("access");
		$data['judul'] = 'Apotek24 - Forbidden Access';
		$this->load->view($access.'/templates/sidebar', $data);
		$this->load->view($access.'/templates/header', $data);
		$this->load->view('404');
		$this->load->view($access.'/templates/footer');
    }
}