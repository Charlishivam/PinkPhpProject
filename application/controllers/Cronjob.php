<?php
class Cronjob extends MY_Home_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->model('front-end/SocialUserModel', 'SocialUserModel');
        $this->load->model('front-end/ContactModel', 'ContactModel');
        $this->load->model('front-end/Shedulemedia', 'Shedulemedia');
	}
	
	public function vendor_block_temp(){
	    date_default_timezone_set("Asia/Kolkata");
	    $this->data['todayworking'] = $this->db->select('*')->group_by('created_at')->get('vendors_schedule')->result();
    	$this->db->update('vendor',array('is_blocked'=>'1','blocked_at'=>date('Y-m-d H:i:s'),'block_duration'=>'12'));
	    foreach($this->data['todayworking'] as $key => $data){
	        $pats  = new DateTime($data->created_at);
            $today = new DateTime(date('Y-m-d'));
            $diffrence = $pats->diff($today)->format("%a"); //3
            if($diffrence < 3){ //under 2 days is not blocked
                $this->db->where('id',$data->vendor_id)->update('vendor',array('is_blocked'=>'0','blocked_at'=>null,'block_duration'=>null));
            }
	    }
	}
	
	public function send_on_whatsapp(){
	    $coonected = $this->SocialUserModel->whatsapp_connected_user();// get connected whatsaap
	    foreach($coonected->result() as $key => $data){
	        $shedule_media = $this->Shedulemedia->shedule_media_list_by_user($data->social_user_id);
	        foreach($shedule_media->result() as $key => $media){
	            $media_type = json_decode($media->schedule_social_media);
	            $current_time = strtotime(date("H:i"));
	            $media_time   = strtotime($media->schedule_time);
	            if($media_type->whatsaap == true && $current_time == $media_time){
                    $file = file_get_contents($media->schedule_file_path);
                    $wp_contact_list = $this->ContactModel->whatsapp_active_contact_list($data->social_user_id);
            	    foreach($wp_contact_list->result() as $key => $c_data){
            	        $this->whatsaap_curl($c_data->sync_contact_country_code,$c_data->sync_contacts_phone,base64_encode($file),$data->social_auth_id);
            	    }
	            }
	        }
	    }
	    
	    //tweet same time 
	    $this->tweet();
	    $this->facebook_post();
	}
	
	function whatsaap_curl($country_code,$number,$file,$sender){
	    $curl = curl_init();
	    $postdata['country_code'] = $country_code;
	    $postdata['caption'] = '';
	    $postdata['sender'] = $sender;
	    $postdata['media'] = $file;
	    $postdata['number'] = $number;
	    
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://pink7technology.herokuapp.com/api/v1/whatsapp/send-media',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 60,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($postdata),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
	}
	
	public function tweet(){
	    //for twitter connection
        $this->load->library('twitter/twitterclass');
        $tw_config['consumer_key']     = $this->data['config']['tw_key'];
        $tw_config['consumer_secret']  = $this->data['config']['tw_secret'];
        $this->twitterclass->initialize($tw_config);
        
	    $coonected = $this->SocialUserModel->twitter_connected_user();// get connected twitter
	    foreach($coonected->result() as $key => $data){
	        
	        $shedule_media = $this->Shedulemedia->shedule_media_list_by_user($data->social_user_id);
	         foreach($shedule_media->result() as $key => $media){

	            $media_type = json_decode($media->schedule_social_media);
	            $current_time = strtotime(date("H:i"));
	            $media_time   = strtotime($media->schedule_time);
	            if($media_type->twitter == true && $current_time == $media_time){
	                $this->twitterclass->tweet_post($media->schedule_file_path,$data->social_access_token,$data->social_token_secret);
	            }
	         }
	    }
	}
	
	public function facebook_post(){
	    //for facebook connection
        $this->load->library('facebook/Facebooks','facebooks');
        $config['app_id']     = $this->data['config']['app_id'];
        $config['app_secret'] = $this->data['config']['app_secret'];
        $this->facebooks->initialize($config);
        
        $coonected = $this->SocialUserModel->facebook_pages_active_for_post();// get connected facebook
        foreach($coonected->result() as $key => $data){
	        $shedule_media = $this->Shedulemedia->shedule_media_list_by_user($data->social_user_id);
	         foreach($shedule_media->result() as $key => $media){
	            $media_type = json_decode($media->schedule_social_media);
	            $current_time = strtotime(date("H:i"));
	            $media_time   = strtotime($media->schedule_time);
	            if($media_type->facebook == true && $current_time == $media_time){
    	            $content = json_decode($media->schedule_media);
    	           // $post_data['message'] = 'Facebook Blog Testing !';
    	            //$post_data['name']    = 'Facebook Blog Testing !';
    	            //$post_data['picture'] = base_url($media->schedule_file_path);
    	            $post_data['url']    = base_url($media->schedule_file_path);
    	            //$post_data['description'] = "Facebook Blog Testing !";
    	            $this->facebooks->post_publish($post_data,$data->page_access_token,$data->page_pageid);
	            }
	         }
        }
	}
}
