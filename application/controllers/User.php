<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Home_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('front-end/BaseModel', 'BaseModel');
        $this->load->model('front-end/SocialUserModel', 'SocialUserModel');
        $this->load->model('Base_model', 'Base_model');
        $this->load->model('Home_model', 'Home_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->data['userid'] = $this->session->userdata('customer_id');
    }

    public function index() {
        $this->form_validation->set_rules('name', 'User Name', 'required|trim');
        $this->form_validation->set_rules('mobile', 'Mobile number', 'required|trim|is_unique[ci_customer.customer_mobile]', array('is_unique' => 'This %s is alredy exists !'));
        if ($this->form_validation->run() == true) {
            $data['customer_name'] = $this->input->post('name');
            $data['customer_mobile'] = $this->input->post('mobile');
            $data['customer_create_at'] = date('Y-m-d H:i:s');
            $data['customer_otp'] = '1234';
            if ($lastid = $this->BaseModel->_inser_query('ci_customer', $data)) {
                $this->session->set_userdata(array('customer_id' => $lastid));
                /*============================Otp for sms======================*/
                $template_customer = $this->BaseModel->get_template_by_slug("otp");
                if (!empty($template_customer)) {
                    $variables['#OTP'] = $data['customer_otp'];
                    $variables['#message_key'] = "pink7.thedigitalkranti.com";
                    $smscontentotp = str_replace(array_keys($variables), array_values($variables), $template_customer['content']);
                    $this->_send_sms($data['customer_mobile'], $smscontentotp, $template_customer['template_id']);
                    if ($this->BaseModel->_update_query('ci_customer', array('customer_otp' => $variables['#OTP']), array('customer_mobile' => $data['customer_mobile'])));
                    /*========================Otp for sms======================*/
                    $this->session->set_flashdata('success', 'One time password have been sent your registered mobile number !');
                    redirect('login/otp');
                } else {
                    $this->session->set_flashdata('error', 'Oops! Something went wrong ! Help us improve your experience by sending an error report  !');
                    redirect('user');
                }
            }
        }
        $this->load->view('front-end/register-page', $this->data);
    }

    public function companyinfo() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['single'] = $this->Base_model->_single_data_query(array('customer_id' => $this->data['userid']), 'ci_customer')->row();
        $this->form_validation->set_rules('orgname', 'Organisation Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Customer Address', 'required|trim');
        if ($this->form_validation->run() == true) {
            $data['customer_organisation'] = $this->input->post('orgname');
            $data['customer_address'] = $this->input->post('address');
            $data['customer_about_org'] = $this->input->post('about_org');
            $data['customer_create_at'] = date('Y-m-d H:i:s');
            $this->Base_model->__constomdo_uploads('./uploads/images/customer/', 'customer_logo1');
            if (!empty($this->upload->data('file_name'))) {
                $data['customer_logo1'] = $this->upload->data('file_name');
            }
            $this->Base_model->__constomdo_uploads('./uploads/images/customer/', 'customer_logo2');
            if (!empty($this->upload->data('file_name'))) {
                $data['customer_logo2'] = $this->upload->data('file_name');
            }
            $this->Base_model->__constomdo_uploads('./uploads/images/customer/', 'customer_logo3');
            if (!empty($this->upload->data('file_name'))) {
                $data['customer_logo3'] = $this->upload->data('file_name');
            }
            if ($this->Base_model->_update_query('ci_customer', $data, array('customer_id' => $this->data['userid']))) {
                $this->session->set_flashdata('success', 'Customer have been successfully Update !');
            } else {
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/dashboard');
        }
         $this->load->view('front-end/main-dashboard-page', $this->data);
    }

    public function dashboard() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['upcoming_data']          =  $this->Home_model->all_today_record()->result();
        $this->data['single']                 = $this->Base_model->_single_data_query(array('customer_id' => $this->data['userid']), 'ci_customer')->row();
        $this->data['schedule']               = $this->Base_model->_single_data_query(array('schedule_customer_id' => $this->data['userid']), 'ci_scheduled_media')->result();
        $this->data['subscription_records']   = $this->Home_model->get_all_purchasesubscription($this->data['userid']);
        $this->data['sync_contacts_records']  = $this->Base_model->_single_data_query(array('sync_contacts_customer_id' => $this->data['userid']), 'ci_sync_contacts')->result();
        $this->data['schedule']               = $this->Home_model->get_all_schedule($this->data['userid']);
        $this->data['delivered']               = $this->Base_model->_single_data_query(array('schedule_customer_id' => $this->data['userid'],'schedule_is_send' => '1'), 'ci_scheduled_media')->result();
      
        
         //for facebook connection
        $this->load->library('facebook/Facebooks','facebooks');
        $config['app_id']     = $this->data['config']['app_id'];
        $config['app_secret'] = $this->data['config']['app_secret'];
        $this->facebooks->initialize($config);
        $redirect_url = base_url()."socialapps/redirect_rx_link";
        
        //for twitter connection
        // $this->load->library('twitter/twitterclass');
        // $tw_config['consumer_key']     = $this->data['config']['tw_key'];
        // $tw_config['consumer_secret']  = $this->data['config']['tw_secret'];
        // $this->twitterclass->initialize($tw_config);
        // $tw_redirect_url = base_url()."socialapps/redirect_twitter";
        
        
        //for instagram connection
        $this->load->library('facebook/Instagram');
        $config['app_id']     = $this->data['config']['ins_app_id'];
        $config['app_secret'] = $this->data['config']['ins_app_secret'];
        $this->instagram->initialize($config);
        $redirect_url = base_url()."socialapps/redirect_instagram";
        
        $this->data['social'] = array(
            'fb_login_url'=>$this->facebooks->login_for_user_access_tokens($redirect_url),
            'fb_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('facebook',$this->data['userid']),
            //'tw_login_url'=>$this->twitterclass->login_for_user_url($tw_redirect_url),
            //'tw_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('twitter',$this->data['userid']),
            'wp_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('whatsapp',$this->data['userid']),
            'insta_login_url'=>$this->instagram->instagram_login_for_user_access_tokens($redirect_url),
            'insta_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('instagram',$this->data['userid']),
        );
        
      
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required|trim');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'required|trim');
        if ($this->form_validation->run() == true) {
            $customer_id = $this->input->post('customer_id');
            $data['customer_name'] = $this->input->post('customer_name');
            $data['customer_email'] = $this->input->post('customer_email');
            $data['customer_mobile'] = $this->input->post('customer_mobile');
            $data['customer_dob'] = $this->input->post('customer_dob');
            $data['customer_anniversary'] = $this->input->post('customer_anniversary');
            $data['customer_gender'] = $this->input->post('customer_gender');
            $this->Base_model->__constomdo_uploads('./uploads/images/customer/', 'customer_image');
            if (!empty($this->upload->data('file_name'))) {
                $data['customer_image'] = 'uploads/images/customer/' . $this->upload->data('file_name');
            }
            if ($this->Base_model->_update_query('ci_customer', $data, array('customer_id' => $this->data['userid']))) {
                $this->session->set_flashdata('success', 'Customer have been successfully Update !');
            } else {
               
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/dashboard');
        }
        
        $this->load->view('front-end/main-dashboard-page', $this->data);
    }
    
    public function userinfo() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['single'] = $this->Base_model->_single_data_query(array('customer_id' => $this->data['userid']), 'ci_customer')->row();
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required|trim');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'required|trim');
        if ($this->form_validation->run() == true) {
            $customer_id = $this->input->post('customer_id');
            $data['customer_name'] = $this->input->post('customer_name');
            $data['customer_email'] = $this->input->post('customer_email');
            $data['customer_mobile'] = $this->input->post('customer_mobile');
            $data['customer_dob'] = $this->input->post('customer_dob');
            $data['customer_anniversary'] = $this->input->post('customer_anniversary');
            $data['customer_gender'] = $this->input->post('customer_gender');
            $this->Base_model->__constomdo_uploads('./uploads/images/customer/', 'customer_image');
            if (!empty($this->upload->data('file_name'))) {
                $data['customer_image'] = 'uploads/images/customer/' . $this->upload->data('file_name');
            }
            if ($this->Base_model->_update_query('ci_customer', $data, array('customer_id' => $this->data['userid']))) {
                $this->session->set_flashdata('success', 'Customer have been successfully Update !');
            } else {
                echo $this->db->last_query();
                die();
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/userinfo');
        }
        
        $this->load->view('front-end/dashbord-page', $this->data);
    }

    public function socialmedia() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;

        //for facebook connection
        $this->load->library('facebook/Facebooks','facebooks');
        $config['app_id']     = $this->data['config']['app_id'];
        $config['app_secret'] = $this->data['config']['app_secret'];
        $this->facebooks->initialize($config);
        $redirect_url = base_url()."socialapps/redirect_rx_link";
        
        //for twitter connection
        $this->load->library('twitter/twitterclass');
        $tw_config['consumer_key']     = $this->data['config']['tw_key'];
        $tw_config['consumer_secret']  = $this->data['config']['tw_secret'];
        
        $this->twitterclass->initialize($tw_config);
        $tw_redirect_url = base_url()."socialapps/redirect_twitter";
        
        //for instagram connection
        $this->load->library('facebook/Instagram');
        $config['app_id']     = $this->data['config']['ins_app_id'];
        $config['app_secret'] = $this->data['config']['ins_app_secret'];
        $this->instagram->initialize($config);
        $redirect_url = base_url()."socialapps/redirect_instagram";
        
        $this->data['social'] = array(
            'fb_login_url'=>$this->facebooks->login_for_user_access_tokens($redirect_url),
            'fb_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('facebook',$this->data['userid']),
            'tw_login_url'=>$this->twitterclass->login_for_user_url($tw_redirect_url),
            'tw_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('twitter',$this->data['userid']),
            'wp_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('whatsapp',$this->data['userid']),
            'insta_login_url'=>$this->facebooks->instagram_login_for_user_access_tokens($redirect_url),
            'insta_user_data'=>$this->SocialUserModel->get_details_by_provider_and_user_id('instagram',$this->data['userid']),
        );
        
        $this->load->view('front-end/socialmedia-page', $this->data);
    }

    public function upcomingevents() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['tag_greeting_data']       =  $this->Home_model->all_today_record()->result();
        $this->load->view('front-end/upcomingevents-page', $this->data);
    }
    
    public function upcomingimage() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $event_id = $this->uri->segment(3);
        $this->data['greeting_data']       =  $this->Base_model->_single_data_query(array('greeting_event_id'=>$event_id),'ci_greeting','*')->result();
        $this->load->view('front-end/upcomingimage-page', $this->data);
    }
    public function synccontacts() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['records'] = $this->Base_model->_single_data_query(array('sync_contacts_customer_id' => $this->data['userid']), 'ci_sync_contacts')->result();
        $this->load->view('front-end/synccontacts-page', $this->data);
    }
    
    public function syncadd() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
    
        $this->data['records'] = $this->Base_model->_single_data_query(array('sync_contacts_customer_id' => $this->data['userid']), 'ci_sync_contacts')->result();
        $this->form_validation->set_rules('sync_contacts_name', 'sync contacts name', 'required|trim');
        $this->form_validation->set_rules('sync_contacts_phone', 'sync contacts phone', 'required|trim');
        if ($this->form_validation->run() == true) {
            $data['sync_contacts_name']             = $this->input->post('sync_contacts_name');
            $data['sync_contacts_phone']            = $this->input->post('sync_contacts_phone');
            $data['sync_contacts_email']            = $this->input->post('sync_contacts_email');
            $data['sync_contacts_customer_id']      = $this->data['userid'];
            $data['sync_contacts_fav']              = $this->input->post('sync_contacts_fav');
            $data['sync_contact_country_code']      = $this->input->post('sync_contact_country_code');
            $data['sync_contact_is_whatsapp']       = $this->input->post('sync_contact_is_whatsapp');
            $data['sync_contacts_created_at']       = date('Y-m-d H:i:s');
            if ($this->Base_model->_inser_query('ci_sync_contacts', $data)) {
                $this->session->set_flashdata('success', 'Customer contact list data have been successfully create !');
            } else {
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/dashboard');
        }
        
        $this->load->view('front-end/syncadd-page', $this->data);
    }
    
    public function syncedit() {
        $contact_id =$this->uri->segment(3);
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['single'] = $this->Base_model->_single_data_query(array('sync_contacts_id' => $contact_id), 'ci_sync_contacts')->row();
        $this->form_validation->set_rules('sync_contacts_name', 'sync contacts name', 'required|trim');
        $this->form_validation->set_rules('sync_contacts_phone', 'sync contacts phone', 'required|trim');
        if ($this->form_validation->run() == true) {
            $sync_contacts_id                       = $this->input->post('sync_contacts_id');
            $data['sync_contacts_name']             = $this->input->post('sync_contacts_name');
            $data['sync_contacts_phone']            = $this->input->post('sync_contacts_phone');
            $data['sync_contacts_email']            = $this->input->post('sync_contacts_email');
            $data['sync_contacts_customer_id']      = $this->data['userid'];
            $data['sync_contacts_fav']              = $this->input->post('sync_contacts_fav');
            $data['sync_contact_country_code']      = $this->input->post('sync_contact_country_code');
            $data['sync_contact_is_whatsapp']       = $this->input->post('sync_contact_is_whatsapp');
            $data['sync_contacts_created_at']       = date('Y-m-d H:i:s');
            if ($this->Base_model->_update_query('ci_sync_contacts', $data, array('sync_contacts_id' => $sync_contacts_id))) {
                $this->session->set_flashdata('success', 'Customer contact list data have been successfully update !');
            } else {
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/dashboard');
        }
        
        $this->load->view('front-end/syncedit-page', $this->data);
    }
    
    	//------------------------------------------------------------
	public function syncdelete($id =''){
		$contact_id =$this->uri->segment(3);
		$this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
		if($this->db->delete('ci_sync_contacts',array('sync_contacts_id'=>$contact_id))) {
		  $this->session->set_flashdata('success','Customer contact has been deleted Successfully.');	
		  redirect('user/dashboard');
		}
	}
	
	 public function sync_upload_file(){

        $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/octet-stream');
      	$this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
      if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
          if(is_uploaded_file($_FILES['file']['tmp_name'])){
              //open uploaded csv file with read only mode
              $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
              // skip first line
              // if your csv file have no heading, just comment the next line
              fgetcsv($csvFile);
              //parse data from csv file line by line
              while(($line = fgetcsv($csvFile)) !== FALSE){
                  //check whether member already exists in database with same email
                  $result = $this->db->get_where("ci_sync_contacts", array("sync_contacts_phone"=>$line[2]))->result();
                  if(count($result) > 0){
                      //update member data
                      $this->db->update("ci_sync_contacts",array("sync_contacts_name"=>$line[0],
                       "sync_contact_country_code"=>$line[1],
                       "sync_contacts_phone"=>$line[2],
                       "sync_contacts_email"=>$line[3],
                       ),
                      array("sync_contacts_phone"=>$line[2]));
                  }else{
                      //insert member data into database
                      $this->db->insert("ci_sync_contacts", array("sync_contacts_name"=>$line[0],
                        "sync_contact_country_code"=>$line[1],
                        "sync_contacts_phone"=>$line[2],
                        "sync_contacts_email"=>$line[3]
                        ));
                        $last_id = $this->db->insert_id();
                        $update['sync_contacts_created_at']   = date('Y-m-d H:i:s');
                        $update['sync_contacts_customer_id']  = $this->data['userid'];
                        $this->Base_model->_update_query('ci_sync_contacts',$update,array('sync_contacts_id'=>$last_id));

                  }
              }
              //close opened csv file
              fclose($csvFile);

              $this->session->set_flashdata('success', 'Customer Conatct have been import successfully!');
          }else{
              $this->session->set_flashdata('error', 'Some have error ! please try again');
          }
      }else{
         $this->session->set_flashdata('error', 'Invalid file ! please try again');
      }

      redirect('user/dashboard');
  
  }
  
  public function schedule() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['schedule'] = $this->Home_model->get_all_schedule($this->data['userid']);
        $this->load->view('front-end/schedule-page', $this->data);
    }
    
        	//------------------------------------------------------------
	public function scheduldelete($id =''){
		$schedule_id =$this->uri->segment(3);
		$this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
		if($this->db->delete('ci_scheduled_media',array('schedule_id'=>$schedule_id))) {
		  $this->session->set_flashdata('success','Schedule contact has been deleted Successfully.');	
		  redirect('user/schedule');
		}
	}
	
	  public function delivered() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $this->data['tag_greeting_data'] = $this->Home_model->all_today_record()->result();
        $this->data['schedule'] = $this->Base_model->_single_data_query(array('schedule_customer_id' => $this->data['userid'],'schedule_is_send' => '1'), 'ci_scheduled_media')->result();
        $this->load->view('front-end/delivered-page', $this->data);
    }
}