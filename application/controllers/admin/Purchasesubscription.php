<?php
class Purchasesubscription extends MY_Controller
{
    function __construct(){

        parent::__construct(); 
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->model('admin/Purchasesubscription_model','Purchasesubscription_model');
       
        $this->load->helper('data_helper');
        
		   
 
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Purchasesubscription_model->get_all_purchasesubscription();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/purchasesubscription/index', $data);
		$this->load->view('admin/includes/_footer');
	}

}

?>