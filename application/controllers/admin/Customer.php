<?php
class Customer extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
        $this->load->model('Base_model');
        $this->load->model('Home_model');
        $this->load->helper('data_helper');
		    $this->load->model('admin/Customer_model','Customer_model');
		    $this->load->model('front-end/SocialUserModel', 'SocialUserModel');
		  
		    
		              
 
    }


	//-----------------------------------------------------------
	public function index(){

		$data['title'] = '';
		$data['records'] = $this->Customer_model->get_all_customer();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/customer/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	public function add(){	
	  // now code for add product category
		$this->rbac->check_operation_access(); // check opration permission
		$this->form_validation->set_rules('customer_first_name', 'customer name', 'required');
		$this->form_validation->set_rules('customer_last_name', ' customer last name', 'required');
		$this->form_validation->set_rules('customer_mobile', 'customer_mobile', 'required');
		$this->form_validation->set_rules('customer_email', 'customer_email', 'required');
	

        if($this->form_validation->run() == true){ 
        			$data['customer_first_name']   = $this->input->post('customer_first_name');
        			$data['customer_last_name']    = $this->input->post('customer_last_name');
        			$data['customer_name']         = $this->input->post('customer_first_name').' '.$this->input->post('customer_last_name');
        			$data['customer_mobile']       = $this->input->post('customer_mobile');
        			$data['customer_designation']  = $this->input->post('customer_designation');
        			$data['customer_email']        = $this->input->post('customer_email');
        			$data['customer_dob']          = $this->input->post('customer_dob');
        			$data['customer_anniversary']  = $this->input->post('customer_anniversary');
        			$data['customer_organisation'] = $this->input->post('customer_organisation');
        			$data['customer_address']      = $this->input->post('customer_address');
        			$data['customer_about_org']    = $this->input->post('customer_about_org');
        			
        			$data['customer_status']       = '1';
        		    $data['customer_create_at']        = date('Y-m-d H:i:s');
                 $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_image');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_image'] = 'uploads/customer/'.$this->upload->data('file_name');
                  }
                      
                  $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_logo1');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_logo1'] = $this->upload->data('file_name');
                  }
                  
                  $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_logo2');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_logo2'] = $this->upload->data('file_name');
                  }
                  
                   $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_logo3');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_logo3'] = $this->upload->data('file_name');
                  }
        			$returcustomerid = $this->Customer_model->create_new_customer($data);
                    $returnid = $returcustomerid;
              
                    if($returnid){
                      $this->session->set_flashdata('success', 'Customer have been successfully created !');
                    }else{
                        $this->session->set_flashdata('error', 'Some have error ! please try again ');
                    }
                    redirect('admin/customer');
        }
       

     $data['title'] = '';
      
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/customer/add', $data);
		$this->load->view('admin/includes/_footer');
	}




	    public function edit(){

			 $customer_id=$this->uri->segment(4);
		     $this->data['single'] = $this->Base_model->_single_data_query(array('customer_id'=>$customer_id),'ci_customer')->row();

		     $this->data['address'] = $this->Base_model->_single_data_query(array('ad_userid'=>$customer_id),'ci_address')->row();


	    		  $this->rbac->check_operation_access(); // check opration permission
					$this->form_validation->set_rules('customer_first_name', 'customer name', 'required');
					$this->form_validation->set_rules('customer_last_name', ' customer last name', 'required');
					$this->form_validation->set_rules('customer_mobile', 'customer_mobile', 'required');
					$this->form_validation->set_rules('customer_email', 'customer_email', 'required');
			
        	if($this->form_validation->run() == true){ 
              $customer_id = $this->input->post('customer_id');
              $data['customer_first_name'] = $this->input->post('customer_first_name');
        	  $data['customer_last_name']  = $this->input->post('customer_last_name');
        	  $data['customer_name']       = $this->input->post('customer_first_name').' '.$this->input->post('customer_last_name');
        	  $data['customer_designation']  = $this->input->post('customer_designation');
        			$data['customer_email']        = $this->input->post('customer_email');
        			$data['customer_dob']          = $this->input->post('customer_dob');
        			$data['customer_anniversary']  = $this->input->post('customer_anniversary');
        			$data['customer_organisation'] = $this->input->post('customer_organisation');
        			$data['customer_address']      = $this->input->post('customer_address');
        			$data['customer_about_org']    = $this->input->post('customer_about_org');
        			
        			$data['customer_status']       = '1';
        		    $data['customer_create_at']        = date('Y-m-d H:i:s');
                 $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_image');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_image'] = 'uploads/customer/'.$this->upload->data('file_name');
                  }
                      
                  $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_logo1');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_logo1'] = $this->upload->data('file_name');
                  }
                  
                  $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_logo2');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_logo2'] = $this->upload->data('file_name');
                  }
                  
                   $this->Base_model->__constomdo_uploads('./uploads/customer/','customer_logo3');
                  if(!empty($this->upload->data('file_name'))){
                    $data['customer_logo3'] = $this->upload->data('file_name');
                  }


          
           
            if($this->Base_model->_update_query('ci_customer',$data,array('customer_id'=>$customer_id))) {
            $this->session->set_flashdata('success', 'Customer have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again');
            }
            redirect('admin/customer');
        }


		$this->data['title'] = '';
	    $this->load->view('admin/includes/_header');
		$this->load->view('admin/customer/edit', $this->data);
		$this->load->view('admin/includes/_footer');
	}



	//------------------------------------------------------------
	public function delete($id=''){
		$this->rbac->check_operation_access(); // check opration permission
		$customer_id = $this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('customer_id'=>$customer_id),'ci_customer')->row();
		$this->data['address'] = $this->Base_model->_single_data_query(array('ad_userid'=>$customer_id),'ci_address')->row();


		if($this->Base_model->_delete_query('ci_customer',array('customer_id'=>$customer_id))) {
			$this->Base_model->_delete_query('ci_address',array('ad_userid'=>$customer_id));
			 unlink('/uploads/customer/',$this->data['single']->customer_image);
		  $this->session->set_flashdata('success','customer has been deleted Successfully.');	
		  redirect('admin/customer');
		}
	}

	//-----------------------------------------------------------
	public function customer_status(){
		$this->rbac->check_operation_access(); // check opration permission
	  $customer_id = $this->uri->segment(4);
		$this->data['single'] = $this->Base_model->_single_data_query(array('customer_id'=>$customer_id),'ci_customer')->row();
	  $data['customer_status'] = $this->uri->segment(5) == '1' ? '0' : '1';

	  if($this->Base_model->_update_query('ci_customer',$data,array('customer_id'=>$customer_id))) {
			$this->session->set_flashdata('success', 'Customer Status has been changed successfully');
			redirect(base_url('admin/customer'));
		}else{
		    $this->session->set_flashdata('errors', 'Customer Status has not been changed successfully');
			redirect(base_url('admin/customer'));
		}
	}

	public function view(){
		  $customer_id=$this->uri->segment(4);
		  $this->data['single']        = $this->Base_model->_single_data_query(array('customer_id'=>$customer_id),'ci_customer')->row_array();
		  $this->data['address']       = $this->Base_model->_single_data_query(array('ad_userid'=>$customer_id),'ci_address')->row_array();
		  $this->data['contactlist']   = $this->Customer_model->get_all_contactlist($customer_id);
		  $this->data['purchasesubscription'] = $this->Home_model->get_all_purchasesubscription($customer_id);
		  
            $this->data['social'] = array(
                //'fb_login_url'=>$this->facebooks->login_for_user_access_tokens($redirect_url),
                'fb_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('facebook',$customer_id),
                //'tw_login_url'=>$this->twitterclass->login_for_user_url($tw_redirect_url),
                'tw_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('twitter',$customer_id),
                'wp_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('whatsapp',$customer_id),
                //'insta_login_url'=>$this->facebooks->instagram_login_for_user_access_tokens($redirect_url),
                'insta_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('instagram',$customer_id),
            );
            
          $this->data['sync_contacts'] = $this->Base_model->_single_data_query(array('sync_contacts_customer_id' => $this->data['userid']), 'ci_sync_contacts')->result();
          $this->data['schedule']      = $this->Home_model->get_all_schedule($customer_id);
          $this->data['delivered']     = $this->Base_model->_single_data_query(array('schedule_customer_id' => $this->data['userid'],'schedule_is_send' => '1'), 'ci_scheduled_media')->result();

		  $this->data['title'] = '';
		  $this->load->view('admin/includes/_header');
		  $this->load->view('admin/customer/view', $this->data);
		  $this->load->view('admin/includes/_footer');
		}
	


	


}

?>