<?php
class Subsubcategory extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		    $this->load->model('admin/Subsubcategory_model','Subsubcategory_model');
		    $this->load->model('admin/Subcategory_model','Subcategory_model');

		    

		   
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Subsubcategory_model->get_all_subsubcategory();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subsubcategory/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){

	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('greeting_sub_cat_id', 'sub subcategory name', 'required');
		
        if($this->form_validation->run() == true){ 
        	
              $data['greeting_sub_cat_id'] = $this->input->post('greeting_sub_cat_id');
              $data['greeting_create_at']        = date('Y-m-d H:i:s');
              $this->Base_model->__constomdo_uploads('./uploads/greeting/','greeting_image');
              if(!empty($this->upload->data('file_name'))){
                $data['greeting_image'] = $this->upload->data('file_name');
              }
    
            if($this->Base_model->_inser_query('ci_greeting',$data)) {
              $this->session->set_flashdata('success', 'Greeting have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/subsubcategory');
        }
       

        $this->data['title'] = '';
        $this->data['cat_parents'] = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>2),'ci_categories','Select Subcategory Name','');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subsubcategory/add', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	public function edit(){
		$greeting_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('greeting_id'=>$greeting_id),'ci_greeting')->row();

		    $this->rbac->check_operation_access(); // check opration permission
  			$this->form_validation->set_rules('greeting_sub_cat_id', 'sub subcategory name', 'required');
        if($this->form_validation->run() == true){ 
        	  $greeting_id = $this->input->post('greeting_id');
              $data['greeting_sub_cat_id'] = $this->input->post('greeting_sub_cat_id');
              $data['greeting_update_at']        = date('Y-m-d H:i:s');
 
              $this->Base_model->__constomdo_uploads('./uploads/greeting/','greeting_image');
              if(!empty($this->upload->data('file_name'))){
                $data['greeting_image'] = $this->upload->data('file_name');
                 unlink('/uploads/greeting/',$this->data['single']->greeting_image);
              }
              
             //echo "<pre>"; print_r($data); echo "</pre>"; die();
            if($this->Base_model->_update_query('ci_greeting',$data,array('greeting_id'=>$greeting_id))) {
              $this->session->set_flashdata('success', 'greeting have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/subsubcategory');
        }
		 $this->data['title'] = '';


    $this->data['cat_parents'] = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>2),'ci_categories','Select Sub Category Name','');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subsubcategory/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$greeting_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('greeting_id'=>$greeting_id),'ci_greeting')->row();
		if($this->Base_model->_delete_query('ci_greeting',array('cat_id'=>$cat_id))) {
			 unlink('/uploads/greeting/',$this->data['single']->greeting_image);
		  $this->session->set_flashdata('success','subsubcategory has been deleted Successfully.');	
		  redirect('admin/subsubcategory');
		}
	}

	//-----------------------------------------------------------
	public function subsubcategory_status(){
		$this->rbac->check_operation_access(); // check opration permission
	  $greeting_id = $this->uri->segment(4);
	  $data['greeting_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_greeting',$data,array('greeting_id'=>$greeting_id))) {
			$this->session->set_flashdata('success', 'greeting Status has been changed successfully');
			redirect(base_url('admin/subsubcategory'));
		}else{
		    $this->session->set_flashdata('errors', 'greeting Status has not been changed successfully');
			redirect(base_url('admin/subsubcategory'));
		}
	}


	


}

?>