<?php
class Subcategory extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		    $this->load->model('admin/Subcategory_model','Subcategory_model');

		    

		   
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Subcategory_model->get_all_subcategory();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subcategory/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){

	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('cat_name', 'subcategory name', 'required');
		$this->form_validation->set_rules('cat_parents', 'category name', 'required');
        if($this->form_validation->run() == true){ 
        	
              $data['cat_parents'] = $this->input->post('cat_parents');
              $data['cat_level'] = 2;
              $cat_name = $this->input->post('cat_name');
              $data['cat_name'] =  $cat_name;
              $data['cat_slug'] =  slugify($cat_name);
              $data['cat_create_at']        = date('Y-m-d H:i:s');
              
    
            if($this->Base_model->_inser_query('ci_categories',$data)) {
              $this->session->set_flashdata('success', 'Subcategory have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/subcategory');
        }
       

        $this->data['title'] = '';
        $this->data['cat_parents'] = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>1),'ci_categories','Select Category Name','');


      
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subcategory/add', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	public function edit(){
		$category_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('cat_id'=>$category_id),'ci_categories')->row();

		    $this->rbac->check_operation_access(); // check opration permission
  			$this->form_validation->set_rules('cat_name', 'category Name', 'required');
        if($this->form_validation->run() == true){ 
        			$category_id = $this->input->post('cat_id');
        			$data['cat_parents'] = $this->input->post('cat_parents');
              $data['cat_level'] = 2;
              $cat_name = $this->input->post('cat_name');
              $data['cat_name'] =  $cat_name;
              $data['cat_slug'] =  slugify($cat_name);
              $data['cat_update_at']        = date('Y-m-d H:i:s');
 
            
            if($this->Base_model->_update_query('ci_categories',$data,array('cat_id'=>$category_id))) {
              $this->session->set_flashdata('success', 'subcategory have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/subcategory');
        }
		 $this->data['title'] = '';


    $this->data['cat_parents'] = $this->Base_model->_dropdownlist('cat_id','cat_name',array('cat_level'=>1),'ci_categories','Select Category Name','');
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subcategory/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$cat_id = $this->uri->segment(4);
	  $this->data['single'] = $this->Base_model->_single_data_query(array('cat_id'=>$cat_id),'ci_categories')->row();
		if($this->Base_model->_delete_query('ci_categories',array('cat_id'=>$cat_id))) {
			
		  $this->session->set_flashdata('success','subcategory has been deleted Successfully.');	
		  redirect('admin/subcategory');
		}
	}

	//-----------------------------------------------------------
	public function subcategory_status(){
		$this->rbac->check_operation_access(); // check opration permission
	  $id = $this->uri->segment(4);
	  $data['cat_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_categories',$data,array('cat_id'=>$id))) {
			$this->session->set_flashdata('success', 'subcategory Status has been changed successfully');
			redirect(base_url('admin/subcategory'));
		}else{
		    $this->session->set_flashdata('errors', 'subcategory Status has not been changed successfully');
			redirect(base_url('admin/subcategory'));
		}
	}


	


}

?>