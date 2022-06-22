<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Socialapps extends MY_Home_Controller {

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
    
    public function redirect_twitter(){
        $oauth_token = $this->input->get('oauth_token');
        $oauth_verifier = $this->input->get('oauth_verifier');
        //for twitter connection
        $this->load->library('twitter/twitterclass');
        $tw_config['consumer_key']     = $this->data['config']['tw_key'];
        $tw_config['consumer_secret']  = $this->data['config']['tw_secret'];
        
        $this->twitterclass->initialize($tw_config);
        $credentials =  $this->twitterclass->verification_user_tokens($this->input->get());
        if(!empty($credentials)){
            $this->SocialUserModel->tw_social_user_create_or_update($credentials,$this->data['userid']);
            $this->session->set_flashdata('success',"Media Connected Successfully!");
            redirect(base_url()."user/socialmedia");
        }else{
            $this->session->set_flashdata('success',"Something went wrong ! Connection twitter !");
            redirect(base_url()."user/socialmedia"); 
        }
    }
    
    public function redirect_whatsaap(){
        $this->SocialUserModel->whats_social_user_create_or_update($this->data['userid']);
        $this->session->set_flashdata('success',"Media Connected Successfully!");
        redirect(base_url()."user/socialmedia");
    }
    
    public function redirect_rx_link(){
        //for facebook connection
        $this->load->library('facebook/Facebooks','facebooks');
        $config['app_id']     = $this->data['config']['app_id'];
        $config['app_secret'] = $this->data['config']['app_secret'];
        $this->facebooks->initialize($config);
        
        $redirect_url = base_url()."socialapps/redirect_rx_link/";
        $access_token = '';
        $user_info = $this->facebooks->login_callback($redirect_url);
        
        if(isset($user_info['status']) && $user_info['status'] == '0')
        {   
            $this->session->set_flashdata('error',"Something went wrong ".$user_info['message']);
            redirect(base_url()."user/socialmedia");
        }else{
            $access_token = @$user_info['access_token_set'];
            $this->SocialUserModel->fb_social_user_create_or_update($user_info,$this->data['userid']);
            
            $pages_result = $this->facebooks->get_page_list($access_token);
            $this->SocialUserModel->fb_pages_create_or_update($pages_result,$this->data['userid']);
        }
        
        $this->session->set_flashdata('success',"Media Connected Successfully!");
        redirect(base_url()."user/socialmedia");
    }
    
    public function dashboard(){
        
    }
    
    public function disconnected(){
       $auth_provider = $this->uri->segment(3); 
       $this->SocialUserModel->social_disconnected_by_provider_and_user_id($auth_provider,$this->data['userid']); 
       $this->session->set_flashdata('success',"Media DisConnected Successfully !");
       redirect(base_url()."user/socialmedia");
    }
    
    public function conatct(){
        $whatsaap = $this->SocialUserModel->get_details_by_provider_and_user_id('whatsapp',$this->data['userid']);
        if($whatsaap->num_rows() <= 0){
            $this->session->set_flashdata('error',"Media Data not found !");
            redirect(base_url()."user/socialmedia");
        }
        $single_whatsaap = $whatsaap->row();
        
        $post['sender'] = md5($this->data['userid']);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://pink7technology.herokuapp.com/api/v1/whatsapp/get-contacts',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_POSTFIELDS =>json_encode($post),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $api_response = json_decode($response);
        if($api_response->status == true){
            $contact_data = array();
            foreach($api_response->data as $key => $data){
                if(!$data->isGroup){
                   $contact_data[$key]['sync_contacts_customer_id'] = $this->data['userid'];
                   $contact_data[$key]['sync_contacts_name']        = $data->name;
                   $contact_data[$key]['sync_contacts_phone']      = substr($data->id->user,2,10);
                   $contact_data[$key]['sync_contact_country_code']= substr($data->id->user,0,2);
                   $contact_data[$key]['sync_contact_is_whatsapp'] = 1;
                }
            }
            $this->db->insert_batch('ci_sync_contacts', $contact_data); 
            $this->session->set_flashdata('success',"Contact import succefully !");
            redirect(base_url()."user/socialmedia");
        }else{
            $this->session->set_flashdata('error',"Media Not connected !");
            redirect(base_url()."user/socialmedia");
        }
    }
}
