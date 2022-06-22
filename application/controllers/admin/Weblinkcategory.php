<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Weblinkcategory extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/WeblinkModel','WeblinkModel');
		$this->load->model('Base_model');
    }
    
    public function index(){
        $this->data['records'] = $this->WeblinkModel->get_all_category();
        $this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/weblink-category-index-page',$this->data);
		$this->load->view('admin/includes/_footer');
    }
    public function create(){
        $this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('cat_name', 'category name', 'required');
        if($this->form_validation->run() == true){ 
              $data['cat_parents'] = 0;
              $data['cat_level']   = 1;
              $data['cat_name']    =  $this->input->post('cat_name');
              $data['cat_slug']    =  slugify($this->input->post('cat_name'));
              $data['cat_create_at']= date('Y-m-d H:i:s');
              $this->Base_model->__constomdo_uploads('./uploads/category/','cat_image');
              if(!empty($this->upload->data('file_name'))){
                $data['cat_image'] = $this->upload->data('file_name');
              }
    
            if($this->Base_model->_inser_query('ci_weblink_categories',$data)) {
              $this->session->set_flashdata('success', 'category have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/weblinkcategory');
        }
        $this->data['records'] = $this->WeblinkModel->get_all_category();
        $this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/weblink-category-create-page',$this->data);
		$this->load->view('admin/includes/_footer');
    }
    
    public function update(){
		$category_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('cat_id'=>$category_id),'ci_weblink_categories')->row();

		$this->rbac->check_operation_access(); // check opration permission
  	    $this->form_validation->set_rules('cat_name', 'category Name', 'required');
        if($this->form_validation->run() == true){ 
        			$category_id = $this->input->post('cat_id');
              $data['cat_parents'] = 0;
              $data['cat_level'] = 1;
              $data['cat_name'] =  $this->input->post('cat_name');
              $data['cat_slug'] =  slugify($this->input->post('cat_name'));
              $data['cat_update_at']        = date('Y-m-d H:i:s');
 
              $this->Base_model->__constomdo_uploads('./uploads/category/','cat_image');
              if(!empty($this->upload->data('file_name'))){
                $data['cat_image'] = $this->upload->data('file_name');
                 unlink('/uploads/category/',$this->data['single']->cat_image);
              }
            if($this->Base_model->_update_query('ci_weblink_categories',$data,array('cat_id'=>$category_id))) {
              $this->session->set_flashdata('success', 'category have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/weblinkcategory');
        }
		$this->data['title'] = '';
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/weblink-category-update-page',$this->data);
		$this->load->view('admin/includes/_footer');
	}
	
    
    public function remove($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$cat_id = $this->uri->segment(4);
	  $this->data['single'] = $this->Base_model->_single_data_query(array('cat_id'=>$cat_id),'ci_weblink_categories')->row();
		if($this->Base_model->_delete_query('ci_weblink_categories',array('cat_id'=>$id))) {
			 unlink('/uploads/category/',$this->data['single']->cat_image);
		  $this->session->set_flashdata('success','category has been deleted Successfully.');	
		  redirect('admin/weblinkcategory');
		}
	}
	
	public function status(){
		$this->rbac->check_operation_access(); // check opration permission
	  $id = $this->uri->segment(4);
	  $data['cat_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_weblink_categories',$data,array('cat_id'=>$id))) {
			$this->session->set_flashdata('success', 'category Status has been changed successfully');
			redirect(base_url('admin/weblinkcategory'));
		}else{
		    $this->session->set_flashdata('errors', 'category Status has not been changed successfully');
			redirect(base_url('admin/weblinkcategory'));
		}
	}
}