<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Settings extends API_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function user($cusomer_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        if(empty($cusomer_id) || !is_numeric($cusomer_id)){
            $this->api_return(array('status' =>false,'error' => 'Customer ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $data['setting_customer_id'] = $cusomer_id;
        $check = $this->Base_model->_single_data_query(array('setting_customer_id'=>$cusomer_id),'ci_customer_setting','*');
        if($check->num_rows() <= 0){
            $this->Base_model->_inser_query('ci_customer_setting',$data);
        }
        
        $details = $this->Base_model->_single_data_query(array('setting_customer_id'=>$cusomer_id),'ci_customer_setting','*');
        if($details->num_rows() > 0){
            $this->api_return(array('status' =>true,'error' => '','data'=>$details->row()),self::HTTP_OK);exit;
        }
    }
    
    public function update(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->customer_id) || !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'error' => 'Customer ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $id = $post->customer_id;
        $data['setting_customer_id'] = $id;
        if(!empty($post->setting_sms_service) && isset($post->setting_sms_service)){
            $data['setting_sms_service'] = $post->setting_sms_service;
        }
        
        if(!empty($post->setting_whatsapp_service) && isset($post->setting_whatsapp_service)){
            $data['setting_whatsapp_service'] = $post->setting_whatsapp_service;
        }
        if(!empty($post->setting_default_sim) && isset($post->setting_default_sim)){
            $data['setting_default_sim'] = $post->setting_default_sim;
        }
        if(!empty($post->setting_push_notification) && isset($post->setting_push_notification)){
            $data['setting_push_notification'] = $post->setting_push_notification;
        }
        if(!empty($post->setting_repeat_mode) && isset($post->setting_repeat_mode)){
            $data['setting_repeat_mode'] = $post->setting_repeat_mode;
        }
        if(!empty($post->setting_uniq_setting) && isset($post->setting_uniq_setting)){
            $data['setting_uniq_setting'] = $post->setting_uniq_setting;
        }
        
        $check = $this->Base_model->_single_data_query(array('setting_customer_id'=>$id),'ci_customer_setting','*');
        if($check->num_rows() <= 0){
            $this->Base_model->_inser_query('ci_customer_setting',$data);
        }
        if($this->Base_model->_update_query('ci_customer_setting',$data,array('setting_customer_id'=>$id))){
            $this->api_return(array('status' =>true,'error' => 'Settings successfully updated !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>false,'error' => 'Some have server error please try again !'),self::HTTP_OK);
    }
}