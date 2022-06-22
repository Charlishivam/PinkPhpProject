<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->rbac->check_module_access();
        $this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('Base_model', 'Base_model');
	}

	//--------------------------------------------------------------------------
	public function index(){
	    $this->data['totaltemplates']     = $this->Base_model->_run_query("select * from ci_greeting ")->num_rows();
	    $this->data['totaluser']        = $this->Base_model->_run_query("select * from ci_customer ")->num_rows();
	    $this->data['totalcategory']    = $this->Base_model->_run_query("select * from ci_categories WHERE cat_parents = 0")->num_rows();
	    $this->data['totalsubcategory']    = $this->Base_model->_run_query("select * from ci_categories WHERE cat_level = 2")->num_rows();
	    $this->data['totaltags']        = $this->Base_model->_run_query("select * from ci_tags ")->num_rows();
	    $this->data['totalslider']        = $this->Base_model->_run_query("select * from ci_slider ")->num_rows();
	    
		$data['title'] = 'Dashboard';
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/index', $this->data);
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
