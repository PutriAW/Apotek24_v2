<?php

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_admin');
 
	}

	public function index(){
		$data['judul'] = 'Apotek24 - Admin';
		// $data_obat = $this->m_pendata->get_obat();
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/body/index');
		$this->load->view('admin/templates/footer');
    }
    
    public function users(){
        $data['judul'] = 'Apotek24 - Admin';
        $data_user = $this->m_admin->get_user_and_access();
        $this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/body/user', ['data'=>$data_user]);
		$this->load->view('admin/templates/footer');
    }

}