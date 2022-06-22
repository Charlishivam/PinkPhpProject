<?php
class Slider extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		    $this->load->model('admin/Slider_model', 'Slider_model');

		    

		   
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Slider_model->get_all_slider();

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/slider/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){

	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('slider_type', 'slider Type', 'required');
		$slider = $this->data['sliderpath'];

		

        if($this->form_validation->run() == true){ 
        	
              $data['slider_type'] = $this->input->post('slider_type');
              $data['slider_position'] = $this->input->post('slider_position');
              $data['create_date_time']        = date('Y-m-d H:i:s');
              $this->Base_model->__constomdo_uploads('./uploads/slider/','slider_image');
              if(!empty($this->upload->data('file_name'))){
                $data['slider_image'] = $this->upload->data('file_name');
              }
    
            if($this->Base_model->_inser_query('ci_slider',$data)) {
              $this->session->set_flashdata('success', 'Slider have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/slider');
        }
       

        $data['title'] = '';
      
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/slider/add', $data);
		$this->load->view('admin/includes/_footer');
	}



	public function edit(){
		$slider_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('slider_id'=>$slider_id),'ci_slider')->row();

		$this->rbac->check_operation_access(); // check opration permission
  			$this->form_validation->set_rules('slider_type', 'slider Name', 'required');
        if($this->form_validation->run() == true){ 
        			$slider_id = $this->input->post('slider_id');
              $data['slider_type'] = $this->input->post('slider_type');
              $data['slider_position'] = $this->input->post('slider_position');
              $data['update_date_time']        = date('Y-m-d H:i:s');
              $this->Base_model->__constomdo_uploads('./uploads/slider/','slider_image');
              if(!empty($this->upload->data('file_name'))){
                $data['slider_image'] = $this->upload->data('file_name');
                 unlink('/uploads/slider/',$this->data['single']->slider_image);
              }
            if($this->Base_model->_update_query('ci_slider',$data,array('slider_id'=>$slider_id))) {
              $this->session->set_flashdata('success', 'slider have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/slider');
        }
		$this->data['title'] = '';
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/slider/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$id = $this->uri->segment(4);
	  $this->data['single'] = $this->Base_model->_single_data_query(array('slider_id'=>$slider_id),'ci_slider')->row();
		if($this->Base_model->_delete_query('ci_slider',array('slider_id'=>$id))) {
			 unlink('/uploads/slider/',$this->data['single']->slider_image);
		  $this->session->set_flashdata('success','slider has been deleted Successfully.');	
		  redirect('admin/slider');
		}
	}

	//-----------------------------------------------------------
	public function status(){
		$this->rbac->check_operation_access(); // check opration permission
	  $id = $this->uri->segment(4);
	  $data['status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_slider',$data,array('slider_id'=>$id))) {
			$this->session->set_flashdata('success', 'slider Status has been changed successfully');
			redirect(base_url('admin/slider'));
		}else{
		    $this->session->set_flashdata('errors', 'slider Status has not been changed successfully');
			redirect(base_url('admin/slider'));
		}
	}


	


}

?>