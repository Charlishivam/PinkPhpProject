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
            
              $tags                         = $this->input->post('tag_id');
		      if(!empty($tags)){
			    $tag = json_encode($tags);
		       }
              
              $data['greeting_tag_id']     = $tag;
              $data['greeting_cat_id']     = $this->input->post('greeting_cat_id');
              
              $data['greeting_name']            = $this->input->post('greeting_name');
              $data['greeting_description']     = $this->input->post('greeting_description');
              $data['greeting_event_id']         = $this->input->post('greeting_event_id');
           
              $data['greeting_sub_cat_id'] = $this->input->post('greeting_sub_cat_id');
              $data['greeting_create_at']  = date('Y-m-d H:i:s');
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
       
        $this->data['all_event']        = $this->Base_model->_dropdownlist('upcomming_events_id','upcomming_events_title',array('upcomming_events_status'=>'1'),'ci_upcomming_events','Select Event Name','');
        
       
        $this->data['tags']             = $this->Base_model->_dropdownlist('tag_id','tag_name',array('status'=>'1'),'ci_tags','','');
        $this->data['parents']          = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>1),'ci_categories','Select Category Name','');
        $this->data['cat_parents']      = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>2),'ci_categories','Select Subcategory Name','');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subsubcategory/add', $this->data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function get_sub_category(){

		$main_cat_id  =  $this->input->post('greeting_cat_id');
		$data['subcategory']=$this->Base_model->all_sub_cat_by_main_id($main_cat_id);
		print_r(json_encode($data['subcategory']));

	}



	public function edit(){
		$greeting_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('greeting_id'=>$greeting_id),'ci_greeting')->row();

		    $this->rbac->check_operation_access(); // check opration permission
  			$this->form_validation->set_rules('greeting_sub_cat_id', 'sub subcategory name', 'required');
        if($this->form_validation->run() == true){ 
        	  $greeting_id = $this->input->post('greeting_id');
        	  
        	  $tags                         = $this->input->post('tag_id');
		      if(!empty($tags)){
			    $tag = json_encode($tags);
		       }
              
              $data['greeting_tag_id']        = $tag;
              $data['greeting_name']          = $this->input->post('greeting_name');
              $data['greeting_description']   = $this->input->post('greeting_description');
              $data['greeting_event_id']      = $this->input->post('greeting_event_id');
              $data['greeting_cat_id']        = $this->input->post('greeting_cat_id');
              $data['greeting_sub_cat_id']    = $this->input->post('greeting_sub_cat_id');
              $data['greeting_update_at']     = date('Y-m-d H:i:s');
 
              $this->Base_model->__constomdo_uploads('./uploads/greeting/','greeting_image');
              if(!empty($this->upload->data('file_name'))){
                $data['greeting_image'] = $this->upload->data('file_name');
                 unlink('/uploads/greeting/',$this->data['single']->greeting_image);
              }
              
             
            if($this->Base_model->_update_query('ci_greeting',$data,array('greeting_id'=>$greeting_id))) {
              $this->session->set_flashdata('success', 'greeting have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/subsubcategory');
        }
		$this->data['title'] = '';
		$this->data['all_event']        = $this->Base_model->_dropdownlist('upcomming_events_id','upcomming_events_title',array('upcomming_events_status'=>'1'),'ci_upcomming_events','Select Event Name','');
        $this->data['parents']          = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>1),'ci_categories','Select Category Name','');
        $this->data['tags']             = $this->Base_model->_dropdownlist('tag_id','tag_name',array('status'=>'1'),'ci_tags','','');
        $this->data['cat_parents']      = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>2),'ci_categories','Select Sub Category Name','');
        $data['tags']                   = $this->Subsubcategory_model->get_all_tags();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subsubcategory/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$greeting_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('greeting_id'=>$greeting_id),'ci_greeting')->row();
		if($this->Base_model->_delete_query('ci_greeting',array('greeting_id'=>$greeting_id))) {
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