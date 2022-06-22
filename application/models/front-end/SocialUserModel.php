<?php defined('BASEPATH') or exit('No direct script access allowed');
class SocialUserModel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function fb_social_user_create_or_update($data,$user_id){  
        $user_data['social_status']     = 1;  
        $user_data['social_email']      = @$data['email'];  
        $user_data['social_name']       = @$data['name'];     
        $user_data['social_access_token']= @$data['access_token_set'];     
        $user_data['social_auth_id']    = @$data['id'];     
        $user_data['social_auth_provider']= 'facebook';     
        $user_data['social_user_id'] = @$user_id;  
        $user_data['social_photo'] = @$data['picture']['url'];  
        $user_data['social_phone'] = "";  
        
        if($this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>"facebook"))->get('ci_social_authenticate')->num_rows() <= 0){
            $user_data['social_create_date']= date('Y-m-d H:i:s');  
            $user_data['social_details'] = json_encode($user_data);
            $this->db->insert('ci_social_authenticate',$user_data);
        }else{
            $user_data['social_update_date']= date('Y-m-d H:i:s');  
            $user_data['social_details'] = json_encode($user_data);
            $this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>"facebook"))->update('ci_social_authenticate',$user_data);
        }
    }
    
    public function get_details_by_provider_and_user_id($auth_provider = "", $user_id){
        
        $this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>$auth_provider));
        $result = $this->db->get('ci_social_authenticate');
        return $result;
    }
    
    public function social_disconnected_by_provider_and_user_id($auth_provider = "", $user_id){
        
        $user_data['social_status']     = 0;  
        $user_data['social_update_date']= date('Y-m-d H:i:s');  
        $this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>$auth_provider))->update('ci_social_authenticate',$user_data);
    }
    
    public function tw_social_user_create_or_update($data,$user_id){  
        $user_data['social_status']      = 1;  
        $user_data['social_email']       = "";  
        $user_data['social_name']        = @$data['screen_name'];     
        $user_data['social_access_token']= @$data['oauth_token'];   
        $user_data['social_token_secret']= @$data['oauth_token_secret'];   
        $user_data['social_auth_id']     = @$data['user_id'];     
        $user_data['social_auth_provider']= 'twitter';     
        $user_data['social_user_id']     = @$user_id;  
        $user_data['social_photo']       = "";  
        $user_data['social_phone']       = "";  
        
        if($this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>"twitter"))->get('ci_social_authenticate')->num_rows() <= 0){
            $user_data['social_create_date']= date('Y-m-d H:i:s');  
            $user_data['social_details'] = json_encode($user_data);
            $this->db->insert('ci_social_authenticate',$user_data);
        }else{
            $user_data['social_update_date']= date('Y-m-d H:i:s');  
            $user_data['social_details'] = json_encode($user_data);
            $this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>"twitter"))->update('ci_social_authenticate',$user_data);
        }
    }
    
    public function check_connection_by_user_id_and_provider($auth_provider = "", $user_id){
        $this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>$auth_provider,'social_status'=>'1'));
        $result = $this->db->get('ci_social_authenticate');
        if($result->num_rows() > 0){
            return true;
        }
        return false;
    }
    
    public function whats_social_user_create_or_update($user_id){  
        $user_data['social_status']      = 1;  
        $user_data['social_email']       = "";  
        $user_data['social_name']        = "";     
        $user_data['social_access_token']= md5($user_id);   
        $user_data['social_token_secret']= md5($user_id);
        $user_data['social_auth_id']     = md5($user_id);     
        $user_data['social_auth_provider']= 'whatsapp';     
        $user_data['social_user_id']     = @$user_id;  
        $user_data['social_photo']       = "";  
        $user_data['social_phone']       = "";  
        
        if($this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>"whatsapp"))->get('ci_social_authenticate')->num_rows() <= 0){
            $user_data['social_create_date']= date('Y-m-d H:i:s');  
            $user_data['social_details'] = json_encode($user_data);
            $this->db->insert('ci_social_authenticate',$user_data);
        }else{
            $user_data['social_update_date']= date('Y-m-d H:i:s');  
            $user_data['social_details'] = json_encode($user_data);
            $this->db->where(array('social_user_id'=>$user_id,'social_auth_provider'=>"whatsapp"))->update('ci_social_authenticate',$user_data);
        }
    }
    
    public function whatsapp_connected_user(){
        $this->db->select('*');
        $this->db->where('social_status','1');
        $this->db->where('social_auth_provider','whatsapp');
        return $this->db->get('ci_social_authenticate');
    }
    
    public function twitter_connected_user(){
        $this->db->select('*');
        $this->db->where('social_status','1');
        $this->db->where('social_auth_provider','twitter');
        return $this->db->get('ci_social_authenticate');
    }
    
    public function fb_pages_create_or_update($pages_result,$user_id){
        /*============store page information===========*/
        foreach($pages_result as $key => $data){
            $pages_data['page_cover'] = $data['cover']['source'];
            $pages_data['page_email'] = $data['emails'][0];
            $pages_data['page_picture'] = $data['picture']['url'];
            $pages_data['page_pageid'] = $data['id'];
            $pages_data['page_name'] = $data['name'];
            $pages_data['page_username'] = $data['username'];
            $pages_data['page_access_token'] = $data['access_token'];
            $pages_data['page_customer_id'] = $user_id;
            
            if($this->db->where(array('page_customer_id'=>$user_id,'page_pageid'=>$pages_data['page_pageid']))->get('ci_facebook_page')->num_rows() <= 0){
                $pages_data['page_create_at'] = date('Y-m-d H:i:s');
                $this->db->insert('ci_facebook_page',$pages_data);
            }else{
                $pages_data['page_update_at'] = date('Y-m-d H:i:s');
                $this->db->where(array('page_customer_id'=>$user_id,'page_pageid'=>$pages_data['page_pageid']))->update('ci_facebook_page',$pages_data);
            }
        }
    }
    
    public function facebook_pages_active_for_post(){
        $this->db->select('*');
        $this->db->where('page_is_post','1');
        $this->db->where('page_status','1');
        $this->db->where('social_status','1');
        $this->db->where('social_auth_provider','facebook');
        $this->db->join('ci_social_authenticate','ci_social_authenticate.social_user_id = ci_facebook_page.page_customer_id');
        return $this->db->get('ci_facebook_page');
    }
}