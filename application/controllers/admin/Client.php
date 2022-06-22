<?php
class Client extends MY_Controller{
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
		$data['records'] = $this->Base_model->_single_data_query(array(''),'ci_client')->result_array();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/client/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){

		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('client_title', 'client_title', 'required');
        if($this->form_validation->run() == true){
    			$data['client_title'] 			= $this->input->post('client_title');
         	    $data['client_created_at']      = date('Y-m-d H:i:s');
         	  $this->Base_model->__constomdo_uploads('./uploads/client/','client_image');
              if(!empty($this->upload->data('file_name'))){
                $data['client_image'] = $this->upload->data('file_name');
              }
            if($this->Base_model->_inser_query('ci_client',$data)) {
              $this->session->set_flashdata('success', 'client have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/client');
            }
            $data['title'] = '';
    		$this->load->view('admin/includes/_header');
    		$this->load->view('admin/client/add', $data);
    		$this->load->view('admin/includes/_footer');
    	}



	public function edit(){
		$client_id =$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('client_id'=>$client_id),'ci_testimonial')->row();
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('client_title', 'client_title', 'required');
        if($this->form_validation->run() == true){ 
                $client_id 			            = $this->input->post('client_id');
        		$data['client_title'] 			= $this->input->post('client_title');
         	    $data['client_updated_at']      = date('Y-m-d H:i:s');
         	    
         	  $this->Base_model->__constomdo_uploads('./uploads/client/','client_image');
              if(!empty($this->upload->data('file_name'))){
                $data['client_image'] = $this->upload->data('file_name');
              }
            if($this->Base_model->_update_query('ci_client',$data,array('client_id'=>$client_id))) {
              $this->session->set_flashdata('success', 'client have been successfully updated !');
            }else{
                
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
             }
            redirect('admin/client');
            }
    		$this->data['title'] = '';
    		$this->load->view('admin/includes/_header');
    		$this->load->view('admin/client/edit', $this->data);
    		$this->load->view('admin/includes/_footer');
    	}

	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$client_id =$this->uri->segment(4);
		if($this->Base_model->_delete_query('ci_client',array('client_id'=>$client_id))) {
		  $this->session->set_flashdata('success','Client has been deleted Successfully.');	
	redirect('admin/client');
		}
	}

	//-----------------------------------------------------------
	public function client_status(){
		$this->rbac->check_operation_access(); // check opration permission
	    $client_id =$this->uri->segment(4);
	    $data['client_status'] = $this->uri->segment(5) == '1' ? '0' : '1';
	  if($this->Base_model->_update_query('ci_client',$data,array('client_id'=>$client_id))) {
			$this->session->set_flashdata('success', 'client status has been changed successfully');
			redirect(base_url('admin/client'));
		}else{
		    $this->session->set_flashdata('errors', 'client status has not been changed successfully');
			redirect(base_url('admin/client'));
		}
	}

}

?>