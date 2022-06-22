<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends MY_Home_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('functions_helper');  
        $this->load->model('Base_model');
        $this->load->model('front-end/GreetingModel','GreetingModel');
        $this->load->model('front-end/SocialUserModel', 'SocialUserModel');
        $this->load->model('front-end/Shedulemedia', 'Shedulemedia');
        $this->data['userid'] = $this->session->userdata('customer_id');
        user_auth_check();
    }
    
    public function index(){
        $greeting_id = base64_decode($this->uri->segment(2));
        $this->data['single'] = $this->GreetingModel->get_single_greeting_details_by_id($greeting_id);
        
                    
        /*check connected social media by user id */
        $this->data['connection'] = array(
            'fb_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('facebook',$this->data['userid']),
            'tw_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('twitter',$this->data['userid']),
            'insta_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('facebook',$this->data['userid']),
            'whsp_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('whatsapp',$this->data['userid'])
            );
        /*check connected social media by user id */
        $this->data['user'] = $this->Base_model->_single_data_query(array('customer_id'=>$this->data['userid']),'ci_customer','*')->row();
         
        if(
            empty($this->input->post('whatsapp')) &&
            empty($this->input->post('twitter')) && 
            empty($this->input->post('instagram')) &&
            empty($this->input->post('facebook')) ){
                
            if(empty($this->input->post('whatsapp'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
            if(empty($this->input->post('twitter'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
            if(empty($this->input->post('instagram'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
            if(empty($this->input->post('facebook'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
        }
        
        $this->form_validation->set_rules('logo_position', 'Logo Position', 'required');
        if($this->input->post('schedule') =='schedule' || $this->input->post('schedule') == 'publish'){
            $this->form_validation->set_rules('date', 'Schedule Date', 'required');
            $this->form_validation->set_rules('hours', 'Hours', 'required');
            $this->form_validation->set_rules('minutes', 'Minutes', 'required');
            $this->form_validation->set_rules('am_pm', 'Am Pm', 'required');
        }
        $this->form_validation->set_rules('logo', 'Logo', 'required');
        if ($this->form_validation->run() == TRUE){
            
            $single_media = $this->data['single']->row();
            if(empty($single_media)){
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
                redirect($_SERVER['HTTP_REFERER']);
            }
            
            /*image watter mark adding and save new locartion user wise*/
            $this->load->library('mediamodification');
            $media_config['logo_position'] = $this->input->post('logo_position');
            $media_config['logo_path']     = $this->input->post('logo');
            $media_config['dest_dir_path'] = 'uploads/schedule-media/user-'.$this->data['userid'].'/'; 
            $media_config['original_file'] = $single_media->greeting_image;
            $media_config['original_dir_path'] = "uploads/greeting/";
            $this->mediamodification->initialize($media_config);
            if($this->mediamodification->do_modify()){
                $file_data = $this->mediamodification->get_data();
                /*after image manypulation */
                if(!empty($single_media)){
                   $single_media->greeting_schedule_file_name = $file_data['file_name'];
                   $single_media->greeting_schedule_file_path = $file_data['file_with_path'];
                   $data['schedule_file_path'] = $file_data['file_with_path'];
                }
            };
            /*image watter mark adding and save new locartion user wise*/
            
            $data['schedule_logo_position'] = $this->input->post('logo_position');
            $data['schedule_social_media'] = json_encode(array(
                'facebook'=>!empty($this->input->post('facebook')) ? true : false,
                'whatsaap'=>!empty($this->input->post('whatsapp'))  ? true : false,
                'instagram'=>!empty($this->input->post('instagram'))  ? true : false,
                'twitter'=>!empty($this->input->post('twitter'))  ? true : false)
                );
                
            if($this->input->post('preview') == "preview" || $this->input->post('schedule') == "schedule"){
                $time = $this->input->post('hours').':'.$this->input->post('minutes');
                $data['schedule_date'] = $this->input->post('date');
                $data['schedule_time'] = $time;
            }else{
                $data['schedule_date'] = date('Y-m-d H:i:s');
                $data['schedule_time'] = date('H:i',strtotime('+1 minutes'));
            }
            
            $data['schedule_media'] = json_encode($single_media);
            $data['schedule_create_at'] = date('Y-m-d H:i:s');
            $data['schedule_update_at'] = date('Y-m-d H:i:s');
            $data['schedule_customer_id'] = $this->data['userid'];
            $data['schedule_logo']    = $this->input->post('logo');
            $data['schedule_is_publish']  = '0'; //is drauft
            $data['schedule_content'] = $this->input->post('content');
            
            if($lastid = $this->Base_model->_inser_query('ci_scheduled_media',$data)){
               $this->session->set_flashdata('success', 'Your media has been successfully scheduled !');
               
               if($this->input->post('preview') == "preview"){
                   redirect('single/preview/'.base64_encode($lastid));
               }
               redirect('user/schedule');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/schedule');
        }
        
        $this->load->view('front-end/single-view-page',$this->data);
    }
    
    public function scheduleedit(){
        $schedule_id                     = $this->uri->segment(3);
        $this->data['schedule_detail']   = $this->Base_model->_single_data_query(array('schedule_id'=>$schedule_id),'ci_scheduled_media','*')->row();
        $greeting_details                = json_decode($this->data['schedule_detail']->schedule_media);
        $greeting_id                     = $greeting_details->greeting_id;
        $this->data['single']            = $this->GreetingModel->get_single_greeting_details_by_id($greeting_id);
        
                    
        /*check connected social media by user id */
        $this->data['connection'] = array(
            'fb_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('facebook',$this->data['userid']),
            'tw_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('twitter',$this->data['userid']),
            'insta_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('facebook',$this->data['userid']),
            'whsp_connection'=>$this->SocialUserModel->check_connection_by_user_id_and_provider('whatsapp',$this->data['userid'])
            );
        /*check connected social media by user id */
        $this->data['user'] = $this->Base_model->_single_data_query(array('customer_id'=>$this->data['userid']),'ci_customer','*')->row();
         
        if(
            empty($this->input->post('whatsapp')) &&
            empty($this->input->post('twitter')) && 
            empty($this->input->post('instagram')) &&
            empty($this->input->post('facebook')) ){
                
            if(empty($this->input->post('whatsapp'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
            if(empty($this->input->post('twitter'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
            if(empty($this->input->post('instagram'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
            if(empty($this->input->post('facebook'))){
                $this->form_validation->set_rules('facebook', 'Social media', 'required');
            }
        }
        
        $this->form_validation->set_rules('logo_position', 'Logo Position', 'required');
        if($this->input->post('schedule') =='schedule' || $this->input->post('schedule') == 'publish'){
            $this->form_validation->set_rules('date', 'Schedule Date', 'required');
            $this->form_validation->set_rules('hours', 'Hours', 'required');
            $this->form_validation->set_rules('minutes', 'Minutes', 'required');
            $this->form_validation->set_rules('am_pm', 'Am Pm', 'required');
        }
        $this->form_validation->set_rules('logo', 'Logo', 'required');
        if ($this->form_validation->run() == TRUE){
            
            $single_media = $this->data['single']->row();
            if(empty($single_media)){
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
                redirect($_SERVER['HTTP_REFERER']);
            }
            
            /*image watter mark adding and save new locartion user wise*/
            $this->load->library('mediamodification');
            $media_config['logo_position'] = $this->input->post('logo_position');
            $media_config['logo_path']     = $this->input->post('logo');
            $media_config['dest_dir_path'] = 'uploads/schedule-media/user-'.$this->data['userid'].'/'; 
            $media_config['original_file'] = $single_media->greeting_image;
            $media_config['original_dir_path'] = "uploads/greeting/";
            $this->mediamodification->initialize($media_config);
            if($this->mediamodification->do_modify()){
                $file_data = $this->mediamodification->get_data();
                /*after image manypulation */
                if(!empty($single_media)){
                   $single_media->greeting_schedule_file_name = $file_data['file_name'];
                   $single_media->greeting_schedule_file_path = $file_data['file_with_path'];
                   $data['schedule_file_path'] = $file_data['file_with_path'];
                }
            };
            /*image watter mark adding and save new locartion user wise*/
            
            $data['schedule_logo_position'] = $this->input->post('logo_position');
            $data['schedule_social_media'] = json_encode(array(
                'facebook'=>!empty($this->input->post('facebook')) ? true : false,
                'whatsaap'=>!empty($this->input->post('whatsapp'))  ? true : false,
                'instagram'=>!empty($this->input->post('instagram'))  ? true : false,
                'twitter'=>!empty($this->input->post('twitter'))  ? true : false)
                );
            
            if($this->input->post('preview') == "preview" || $this->input->post('schedule') == "schedule"){
                $time = $this->input->post('hours').':'.$this->input->post('minutes');
                $data['schedule_date'] = $this->input->post('date');
                $data['schedule_time'] = $time;
            }else{
                $data['schedule_date'] = date('Y-m-d H:i:s');
                $data['schedule_time'] = date('H:i',strtotime('+1 minutes'));
            }
            
            $data['schedule_time'] = $time;
            $data['schedule_media'] = json_encode($single_media);
            $data['schedule_create_at'] = date('Y-m-d H:i:s');
            $data['schedule_update_at'] = date('Y-m-d H:i:s');
            $data['schedule_customer_id'] = $this->data['userid'];
            $data['schedule_logo']    = $this->input->post('logo');
            $data['schedule_is_publish']  = '0'; //is drauft
            $data['schedule_content'] = $this->input->post('content');
           if($this->Base_model->_update_query('ci_scheduled_media', $data, array('schedule_id' => $schedule_id))) {
               $this->session->set_flashdata('success', 'Your media has been successfully updateed !');
               if($this->input->post('preview') == "preview"){
                   redirect('single/preview/'.base64_encode($schedule_id));
               }
               redirect('user/schedule');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('user/schedule');
        }
        
        $this->load->view('front-end/schedule-edit-page',$this->data);
    }
    
    public function preview(){
        $schedule_id = base64_decode($this->uri->segment(3));
        $this->data['media'] = $this->Shedulemedia->shedule_media_by_id($schedule_id);
        $this->load->view('front-end/greeting-preview',$this->data);
    }
    
    public function publish(){
        $schedule_id = base64_decode($this->uri->segment(3));
        $data['schedule_update_at'] = date('Y-m-d H:i:s');
        $data['schedule_is_publish']  = '1'; //is complete for publish
        if($this->Base_model->_update_query('ci_scheduled_media', $data, array('schedule_id' => $schedule_id))) {
           $this->session->set_flashdata('success', 'Your media has been successfully updateed !');
        }else{
            $this->session->set_flashdata('error', 'Some have error ! please try again ');
        }
        redirect('user/schedule');
    }
}
