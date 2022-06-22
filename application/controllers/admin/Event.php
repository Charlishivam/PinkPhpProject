<?php
class Event extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		$this->load->model('admin/Event_model','Event_model');

		    

		   
    }
	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Event_model->get_all_event();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/event/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){
	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('upcomming_events_title', 'Title required', 'required');
        if($this->form_validation->run() == true){ 
        
              $data['upcomming_events_title']       =  $this->input->post('upcomming_events_title');
              $data['upcomming_events_date']        =  $this->input->post('upcomming_events_date');
              $data['upcomming_events_time']        =  $this->input->post('upcomming_events_time');
              $data['upcomming_events_created_at']  = date('Y-m-d H:i:s');
              $this->Base_model->__constomdo_uploads('./uploads/upcomming_events_image/','upcomming_events_image');
              if(!empty($this->upload->data('file_name'))){
                $data['upcomming_events_image'] = 'uploads/upcomming_events_image/'.$this->upload->data('file_name');
              }
    
            if($this->Base_model->_inser_query('ci_upcomming_events',$data)) {
              $this->session->set_flashdata('success', 'event have been successfully created !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/event');
        }
       

        $data['title'] = '';
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/event/add', $data);
		$this->load->view('admin/includes/_footer');
	}



	public function edit(){
		$upcomming_events_id = $this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('upcomming_events_id'=>$upcomming_events_id),'ci_upcomming_events')->row();

		$this->rbac->check_operation_access(); // check opration permission
  		$this->form_validation->set_rules('upcomming_events_title', 'Title required', 'required');
        if($this->form_validation->run() == true){ 
              $upcomming_events_id                  =  $this->input->post('upcomming_events_id');
        	  $data['upcomming_events_title']       =  $this->input->post('upcomming_events_title');
              $data['upcomming_events_date']        =  $this->input->post('upcomming_events_date');
              $data['upcomming_events_time']        =  $this->input->post('upcomming_events_time');
              $data['upcomming_events_updated_at']  = date('Y-m-d H:i:s');
              $this->Base_model->__constomdo_uploads('./uploads/upcomming_events_image/','upcomming_events_image');
              if(!empty($this->upload->data('file_name'))){
                $data['upcomming_events_image'] = 'uploads/upcomming_events_image/'.$this->upload->data('file_name');
              }
            if($this->Base_model->_update_query('ci_upcomming_events',$data,array('upcomming_events_id'=>$upcomming_events_id))) {
              $this->session->set_flashdata('success', 'event have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/event');
        }
		$this->data['title'] = '';
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/event/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$upcomming_events_id = $this->uri->segment(4);
	    $this->data['single'] = $this->Base_model->_single_data_query(array('upcomming_events_id'=>$upcomming_events_id),'ci_upcomming_events')->row();
		if($this->Base_model->_delete_query('ci_upcomming_events',array('upcomming_events_id'=>$upcomming_events_id))) {
		  $this->session->set_flashdata('success','upcomming_events has been deleted Successfully.');	
		  redirect('admin/event');
		}
	}

	//-----------------------------------------------------------
	public function event_status(){
	  $this->rbac->check_operation_access(); // check opration permission
	  $upcomming_events_id = $this->uri->segment(4);
	  $data['upcomming_events_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_upcomming_events',$data,array('upcomming_events_id'=>$upcomming_events_id))) {
			$this->session->set_flashdata('success', 'category Status has been changed successfully');
			redirect(base_url('admin/event'));
		}else{
		    $this->session->set_flashdata('errors', 'category Status has not been changed successfully');
			redirect(base_url('admin/event'));
		}
	}


	


}

?>