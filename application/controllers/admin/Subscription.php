<?php
class Subscription extends MY_Controller
{
    function __construct(){

        parent::__construct(); 
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->helper('data_helper');
		    //$this->load->model('admin/SubcriprionPackage_model','SubcriprionPackage_model');
 
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Base_model->_single_data_query(array(''),'ci_subcription_package')->result_array();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subcriptionpackage/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){	
	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('ci_sp_title', 'ci_sp_title', 'required');
		$this->form_validation->set_rules('ci_sp_amount', 'ci_sp_amount', 'required');
		

            if($this->form_validation->run() == true){ 
    		$data['ci_sp_title']            = $this->input->post('ci_sp_title');
    		$data['ci_sp_amount']           = $this->input->post('ci_sp_amount');
    		$data['ci_sp_type']             = $this->input->post('ci_sp_type');
    	    $data['ci_sp_created_at']       = date('Y-m-d H:i:s');
            $this->Base_model->__constomdo_uploads('./uploads/package/','ci_sp_image');
            if(!empty($this->upload->data('file_name'))){
                $data['ci_sp_image'] = 'uploads/package/'.$this->upload->data('file_name');
            }
        
            if($this->Base_model->_inser_query('ci_subcription_package',$data)){
                  $lastid           = $this->db->insert_id();
                  $sp_vehicle_id    = $this->input->post('sp_vehicle_id');
                  foreach ($sp_vehicle_id as $i => $record) {
                    $sp[$i]['subscription_id']      = $lastid;
                    $sp[$i]['description']          = $record['description'];
                    $sp[$i]['subscription_description_created_at'] =  date('Y-m-d H:i:s');
    
                  }
                  $this->db->insert_batch('subscription_description',$sp);
              $this->session->set_flashdata('success', 'Packages have been successfully created !');
            }else{
                 
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            
           
            redirect('admin/subscription');
        }
       

        $data['title'] = '';
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/subcriptionpackage/add', $data);
		$this->load->view('admin/includes/_footer');
	}




	    public function edit(){

			 $ci_sp_id=$this->uri->segment(4);
		     $this->data['single'] = $this->Base_model->_single_data_query(array('ci_sp_id'=>$ci_sp_id),'ci_subcription_package')->row();

    	     // now code for add product category
    		 $this->rbac->check_operation_access(); // check opration permission
    		 $this->form_validation->set_rules('ci_sp_title', 'ci_sp_title', 'required');
    		 $this->form_validation->set_rules('ci_sp_amount', 'ci_sp_amount', 'required');
					
        	if($this->form_validation->run() == true){ 
        	    $ci_sp_id                       = $this->input->post('ci_sp_id');
        	    $data['ci_sp_title']            = $this->input->post('ci_sp_title');
        		$data['ci_sp_amount']           = $this->input->post('ci_sp_amount');
        		$data['ci_sp_type']             = $this->input->post('ci_sp_type');
        	    $data['ci_sp_updated_at']        = date('Y-m-d H:i:s');
                $this->Base_model->__constomdo_uploads('./uploads/package/','ci_sp_image');
                if(!empty($this->upload->data('file_name'))){
                    $data['ci_sp_image'] = 'uploads/package/'.$this->upload->data('file_name');
                }

            if($this->Base_model->_update_query('ci_subcription_package',$data,array('ci_sp_id'=>$ci_sp_id))) {
                
                  $sp_vehicle_id        = $this->input->post('sp_vehicle_id');
                  $sp_description       = $this->input->post('sp_description');
                  $subscription_description_id  = $this->input->post('subscription_description_id');
                  if(!empty($subscription_description_id)){
                      foreach ($subscription_description_id as $jj => $record) {
                      $sp[$jj]['subscription_description_id']            = $record;
                      $sp[$jj]['subscription_id']                        = $ci_sp_id;
                      $sp[$jj]['description']                            = $sp_description[$jj];
                      $sp[$jj]['subscription_description_updated_at']    = date('Y-m-d H:i:s');
                    }
                    $this->db->update_batch('subscription_description',$sp,'subscription_description_id');
                  }
                  $sp_id    = $this->input->post('sp_id');
                  if(!empty($sp_id)){
                    foreach ($sp_id as $i => $record) {
                        $sp_new[$i]['subscription_id']  = $ci_sp_id;
                        $sp_new[$i]['description']      = $record['description'];
                        $sp_new[$i]['subscription_description_created_at']    =  date('Y-m-d H:i:s');
                        
                        if(!empty($record['description'])){
                          $this->db->insert_batch('subscription_description',$sp_new);
                        }
                      }
                  }
            $this->session->set_flashdata('success', 'Subcription have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again');
            }
            redirect('admin/subscription');
        }


		$this->data['title'] = '';
	    $this->load->view('admin/includes/_header');
		$this->load->view('admin/subcriptionpackage/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}
	
      //------------------------------------------------------------
      public function descriptiondelete($subscription_description_id=''){
        $this->rbac->check_operation_access(); // check opration permission
        $subscription_description_id = $this->uri->segment(4);
        if($this->Base_model->_delete_query('subscription_description',array('subscription_description_id'=>$subscription_description_id))) {
          $this->session->set_flashdata('success','subscription description has been deleted Successfully.'); 
          redirect($_SERVER['HTTP_REFERER']);
        }
      }



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$ci_sp_id=$this->uri->segment(4);
		if($this->Base_model->_delete_query('ci_subcription_package',array('ci_sp_id'=>$ci_sp_id))) {
		  $this->session->set_flashdata('success','subcription has been deleted Successfully.');	
		  redirect('admin/subscription');
		}
	}

	//-----------------------------------------------------------
	public function subcription_package_status(){
		$this->rbac->check_operation_access(); // check opration permission
	    $ci_sp_id=$this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('ci_sp_id'=>$ci_sp_id),'ci_subcription_package')->row();
	    $data['ci_sp_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_subcription_package',$data,array('ci_sp_id'=>$ci_sp_id))) {
			$this->session->set_flashdata('success', 'subcription package status has been changed successfully');
			redirect('admin/subscription');
		}else{
		    $this->session->set_flashdata('errors', 'subcription package status not been changed successfully');
			redirect('admin/subscription');
		}
	}


}

?>