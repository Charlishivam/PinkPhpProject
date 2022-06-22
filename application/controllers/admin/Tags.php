<?php
class Tags extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model', 'Base_model');
		$this->load->model('admin/tags_model', 'tags_model');
		
    }

	//---------------------------------------------------------		
	public function index(){

		$this->rbac->check_operation_access(); // check opration permission

		$data['title'] = '';
		$data['records'] = $this->tags_model->get_all_tags();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/tags/index', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	//-----------------------------------------------------------
	public function add(){

		$this->rbac->check_operation_access(); // check opration permission
		if($this->input->post('submit')){
			$this->form_validation->set_rules('tag_name', 'Tag Name', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/tags/add'),'refresh');
			}
			else{
			    $data = array(
					'tag_name' 	            => $this->input->post('tag_name'),
					'status' 	            => $this->input->post('status'),
								
				);
				$data = $this->security->xss_clean($data);
				$result = $this->tags_model->add_tags($data);
				if($result){
					$this->session->set_flashdata('success', 'Tag has been added successfully!');
					redirect(base_url('admin/tags/index'));
				}
			}
		}
		else{
			$data['title'] = '';

			$this->load->view('admin/includes/_header');
			$this->load->view('admin/tags/add', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	//-----------------------------------------------------------
	public function edit($id=0){
        //$tag_id = $this->input->post('tag_id');
        
        $tag_id =$this->uri->segment(4);
        

		$this->rbac->check_operation_access(); // check opration permission
		if($this->input->post('submit')){
			$this->form_validation->set_rules('tag_name', 'Tag Name', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/tags/edit/'.$id),'refresh');
			}
			else{
				$data = array(
					'tag_name' 	            => $this->input->post('tag_name'),
					'status' 	            => $this->input->post('status'),					
				);
				
			    $tag_id = $this->input->post('tag_id');
				$data 	= $this->security->xss_clean($data);
				$result = $this->tags_model->edit_tags($data, $tag_id);
				$result = true;
				if($result){
					$this->session->set_flashdata('Success', 'Tag has been updated sussessfully');
					redirect(base_url('admin/tags/index'));
				}
			}
		}
		else{
			$data['title'] = '';
			$data['single'] = $this->tags_model->get_tags_by_id($tag_id);
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/tags/edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	//------------------------------------------------------------
	public function delete($id=''){

		$this->rbac->check_operation_access(); // check opration permission

		$this->tags_model->delete_tags($id);

		$this->session->set_flashdata('msg','Tag has been deleted sussessfully');	
		redirect('admin/tags/index');
	}
	
	
	//-----------------------------------------------------------
	public function tags_status(){
		
	  $tag_id              = $this->uri->segment(4);
	  $data['status']      = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_tags',$data,array('tag_id'=>$tag_id))) {
			$this->session->set_flashdata('success', 'tag status has been changed successfully');
				redirect('admin/tags/index');
		}else{
		    $this->session->set_flashdata('errors', 'tag status has not been changed');
				redirect('admin/tags/index');
		}
	}
}

?>