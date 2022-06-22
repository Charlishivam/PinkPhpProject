<?php
class Contactus extends MY_Controller{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		
    }

	 // echo "<pre>"; print_r($_POST); echo "<pre>"; die(); 
	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Base_model->_single_data_query(array(''),'ci_contact_us')->result_array();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/contactus/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	





	//------------------------------------------------------------


	//-----------------------------------------------------------


}

?>