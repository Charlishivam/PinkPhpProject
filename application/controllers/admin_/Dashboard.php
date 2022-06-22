<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->rbac->check_module_access();

		$this->load->model('admin/dashboard_model', 'dashboard_model');
	}

	//--------------------------------------------------------------------------
	public function index(){
		$data['title'] = 'Dashboard';
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/index', $data);
    	$this->load->view('admin/includes/_footer');
	}


	//--------------------------------------------------------------------------
	public function index_2(){
		$data['title'] = 'Dashboard';
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/index2');
    	$this->load->view('admin/includes/_footer');
	}


 
	
	
}

?>	
