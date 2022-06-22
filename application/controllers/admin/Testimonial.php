<?php
class Testimonial extends MY_Controller{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		$this->load->model('admin/Testimonial_model', 'Testimonial_model');

    }

	 // echo "<pre>"; print_r($_POST); echo "<pre>"; die(); 
	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Testimonial_model->get_all_testimonial();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/testimonial/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){

		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('testimonial_title', 'testimonial_title', 'required');
        if($this->form_validation->run() == true){
            
    			$data['testimonial_title'] 			= $this->input->post('testimonial_title');
    			$data['testimonial_subtitle'] 		= $this->input->post('testimonial_subtitle');
    			$data['testimonial_description']    = $this->input->post('testimonial_description');
         	    $data['testimonial_created_at']     = date('Y-m-d H:i:s');
         	    
         	  $this->Base_model->__constomdo_uploads('./uploads/testimonial/','testimonial_image');
              if(!empty($this->upload->data('file_name'))){
                $data['testimonial_image'] = $this->upload->data('file_name');
              }
            if($this->Base_model->_inser_query('ci_testimonial',$data)) {
              $this->session->set_flashdata('success', 'testimonial have been successfully created !');
            }else{
                
              
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/testimonial');
            }
            $data['title'] = '';
    		$this->load->view('admin/includes/_header');
    		$this->load->view('admin/testimonial/add', $data);
    		$this->load->view('admin/includes/_footer');
    	}



	public function edit(){
		$testimonial_id =$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('testimonial_id'=>$testimonial_id),'ci_testimonial')->row();
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('testimonial_title', 'testimonial_title', 'required');
        if($this->form_validation->run() == true){ 
                $testimonial_id 			        = $this->input->post('testimonial_id');
        		$data['testimonial_title'] 			= $this->input->post('testimonial_title');
    			$data['testimonial_subtitle'] 		= $this->input->post('testimonial_subtitle');
    			$data['testimonial_description']    = $this->input->post('testimonial_description');
         	    $data['testimonial_updated_at']      = date('Y-m-d H:i:s');
         	    
         	  $this->Base_model->__constomdo_uploads('./uploads/testimonial/','testimonial_image');
              if(!empty($this->upload->data('file_name'))){
                $data['testimonial_image'] = $this->upload->data('file_name');
              }
            if($this->Base_model->_update_query('ci_testimonial',$data,array('testimonial_id'=>$testimonial_id))) {
              $this->session->set_flashdata('success', 'testimonial have been successfully updated !');
            }else{
                
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
             }
            redirect('admin/testimonial');
            }
    		$this->data['title'] = '';
    		$this->load->view('admin/includes/_header');
    		$this->load->view('admin/testimonial/edit', $this->data);
    		$this->load->view('admin/includes/_footer');
    	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$testimonial_id =$this->uri->segment(4);
		if($this->Base_model->_delete_query('ci_testimonial',array('testimonial_id'=>$testimonial_id))) {
		  $this->session->set_flashdata('success','Alert has been deleted Successfully.');	
	redirect('admin/testimonial');
		}
	}

	//-----------------------------------------------------------
	public function testimonial_status(){
		$this->rbac->check_operation_access(); // check opration permission
	    $testimonial_id =$this->uri->segment(4);
	    $data['testimonial_status'] = $this->uri->segment(5) == '1' ? '0' : '1';
	  if($this->Base_model->_update_query('ci_testimonial',$data,array('testimonial_id'=>$testimonial_id))) {
			$this->session->set_flashdata('success', 'testimonial status has been changed successfully');
			redirect(base_url('admin/testimonial'));
		}else{
		    $this->session->set_flashdata('errors', 'testimonial status has not been changed successfully');
			redirect(base_url('admin/testimonial'));
		}
	}

}

?>