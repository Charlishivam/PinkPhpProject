<?php
class Category extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		    $this->load->model('admin/Category_model','Category_model');

		    

		   
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Category_model->get_all_category();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/category/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){

	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('cat_name', 'category name', 'required');
        if($this->form_validation->run() == true){ 
        	
              $data['cat_parents'] = 0;
              $data['cat_level'] = 1;
              $cat_name = $this->input->post('cat_name');
              $data['cat_name'] =  $cat_name;
              $data['cat_slug'] =  slugify($cat_name);
              $data['cat_create_at']        = date('Y-m-d H:i:s');
             
    
            if($this->Base_model->_inser_query('ci_categories',$data)) {
              $this->session->set_flashdata('success', 'category have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/category');
        }
       

        $data['title'] = '';
      
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/category/add', $data);
		$this->load->view('admin/includes/_footer');
	}



	public function edit(){
		$category_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('cat_id'=>$category_id),'ci_categories')->row();

		    $this->rbac->check_operation_access(); // check opration permission
  			$this->form_validation->set_rules('cat_name', 'category Name', 'required');
        if($this->form_validation->run() == true){ 
        			$category_id = $this->input->post('cat_id');
              $data['cat_parents'] = 0;
              $data['cat_level'] = 1;
              $cat_name = $this->input->post('cat_name');
              $data['cat_name'] =  $cat_name;
              $data['cat_slug'] =  slugify($cat_name);
              $data['cat_update_at']        = date('Y-m-d H:i:s');
 
              
            if($this->Base_model->_update_query('ci_categories',$data,array('cat_id'=>$category_id))) {
              $this->session->set_flashdata('success', 'category have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/category');
        }
		$this->data['title'] = '';
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/category/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$cat_id = $this->uri->segment(4);
	    $this->data['single'] = $this->Base_model->_single_data_query(array('cat_id'=>$cat_id),'ci_categories')->row();
	    
		if($this->Base_model->_delete_query('ci_categories',array('cat_id'=>$id))) {
		  $this->Base_model->_delete_query('ci_categories',array('cat_parents'=>$id));
		  $this->Base_model->_delete_query('ci_greeting',array('greeting_cat_id'=>$id));
		  $this->session->set_flashdata('success','category subcategory and greeting teamplate  has been deleted Successfully.');	
		  redirect('admin/category');
		}
	}

	//-----------------------------------------------------------
	public function category_status(){
		$this->rbac->check_operation_access(); // check opration permission
	  $id = $this->uri->segment(4);
	  $data['cat_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_categories',$data,array('cat_id'=>$id))) {
			$this->session->set_flashdata('success', 'category Status has been changed successfully');
			redirect(base_url('admin/category'));
		}else{
		    $this->session->set_flashdata('errors', 'category Status has not been changed successfully');
			redirect(base_url('admin/category'));
		}
	}


	


}

?>