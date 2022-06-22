<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Message extends API_Controller {
    
    public function __construct() {
        parent::__construct();
    
       
    }
    
    public function list($customer_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        if(empty($customer_id) || !is_numeric($customer_id)){
            $this->api_return(array('status' =>false,'error' => 'Customer ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $message_type = $this->input->get('message_type');
        if($message_type > 2 || !is_numeric($message_type)){
            $this->api_return(array('status' =>false,'error' => 'Message type not allowed !'),self::HTTP_OK);exit;
        }
        
        $data = array();
        //single customer contact records  
        $weblink = $this->WeblinkModel->_ganrate_weblink_by_customer_id($customer_id);
        if($message_type == 0){
            
          $dataen = $this->Base_model->_all_data_optional_condetion("*",'ci_customer_message',array('message_customer_id'=>$customer_id,'message_language'=>'en','message_type'=>$message_type),'message_id desc');
        }else{
          $dataen = $this->Base_model->_all_data_optional_condetion("*",'ci_customer_message',array('message_customer_id'=>$customer_id,'message_language'=>'en'),'message_id desc');  
        }
        
        foreach($dataen->result() as $key => $dataa){
            $dataen->result()[$key]->message_content = $dataa->message_content.' '.$weblink;
        }
        
        if($message_type == 0){
          $datahi = $this->Base_model->_all_data_optional_condetion("*",'ci_customer_message',array('message_customer_id'=>$customer_id,'message_language'=>'hi','message_type'=>$message_type),'message_id desc');
        }else{
          $datahi = $this->Base_model->_all_data_optional_condetion("*",'ci_customer_message',array('message_customer_id'=>$customer_id,'message_language'=>'hi'),'message_id desc');
        }
        
        foreach($datahi->result() as $key => $dataa){
            $datahi->result()[$key]->message_content = $dataa->message_content.' '.$weblink;
        }
        
        $data['hi'] = $datahi->result();
        $data['en'] = $dataen->result();
        
        if($dataen->num_rows() <= 0 && $datahi->num_rows() <= 0){
            $this->api_return(array('status' =>false,'error' => 'Message data not found !'),self::HTTP_OK);exit;
        }
        
        if($dataen->num_rows() > 0 || $datahi->num_rows() > 0){
            $this->api_return(array('status' =>true,'error' => '','data'=>$data),self::HTTP_OK);
        }
    }
    
    public function create(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        
        if(empty($post->customer_id) || !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'error' => 'User ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->message_content) || !isset($post->message_content)){
            $this->api_return(array('status' =>false,'error' => 'Message Content is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->message_language) || !isset($post->message_language)){
            $this->api_return(array('status' =>false,'error' => 'Message Language is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(@$post->message_type > 2){
            $this->api_return(array('status' =>false,'error' => 'Message type not allowed !'),self::HTTP_OK);exit;
        }
        
        if(!isset($post->message_type) ){
            $this->api_return(array('status' =>false,'error' => 'Message Type is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $data['message_customer_id']= $post->customer_id;
        $data['message_content']    = $post->message_content;
        $data['message_language']   = $post->message_language;
        $data['message_create_at']  = date('Y-m-d H:i:s');
        $data['message_type']       = @$post->message_type;
        
        if($this->Base_model->_inser_query('ci_customer_message',$data)){
            $this->api_return(array('status' =>true,'error' => 'Message successfully saved !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>false,'error' => 'Some have server error please try again !'),self::HTTP_OK);
    }
    
    public function update(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        
        if(empty($post->message_id) || !isset($post->message_id)){
            $this->api_return(array('status' =>false,'error' => 'Message ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->message_content) || !isset($post->message_content)){
            $this->api_return(array('status' =>false,'error' => 'Message Content is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->message_language) || !isset($post->message_language)){
            $this->api_return(array('status' =>false,'error' => 'Message Language is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(!isset($post->message_type)){
            $this->api_return(array('status' =>false,'error' => 'Message Type is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(@$post->message_type > 2){
            $this->api_return(array('status' =>false,'error' => 'Message type not allowed !'),self::HTTP_OK);exit;
        }
        $data['message_id']         = $post->message_id;
        $data['message_content']    = $post->message_content;
        $data['message_language']   = $post->message_language;
        $data['message_update_at']  = date('Y-m-d H:i:s');
        $data['message_type']       = @$post->message_type;
        
        if($this->Base_model->_update_query('ci_customer_message',$data,array('message_id'=>$post->message_id))){
            $this->api_return(array('status' =>true,'error' => 'Message successfully updated !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>false,'error' => 'Some have server error please try again !'),self::HTTP_OK);
    }
    
    public function setcurrent(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        
        if(empty($post->message_id) || !isset($post->message_id)){
            $this->api_return(array('status' =>false,'error' => 'Message ID is empty Or missing !'),self::HTTP_OK);exit;
        }

        if(empty($post->customer_id) || !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'error' => 'Customer ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(@$post->message_type > 2){
            $this->api_return(array('status' =>false,'error' => 'Message type not allowed !'),self::HTTP_OK);exit;
        }
        if(!isset($post->message_type)){
            $this->api_return(array('status' =>false,'error' => 'Message Type is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $check = $this->Base_model->_single_data_query(array('message_id'=>$post->message_id,'message_customer_id'=>$post->customer_id,'message_type'=>@$post->message_type),'ci_customer_message','*');
        
        if($check->num_rows() <= 0 ){
            $this->api_return(array('status' =>false,'error' => 'Message data not found !'),self::HTTP_OK);exit;
        }
        
        $this->Base_model->_update_query('ci_customer_message',array('message_current_active'=>'0'),array('message_customer_id'=>$post->customer_id,'message_current_active'=>'1','message_type'=>@$post->message_type));
        
        $data['message_update_at']      = date('Y-m-d H:i:s');
        $data['message_current_active'] = '1';
        if($this->Base_model->_update_query('ci_customer_message',$data,array('message_customer_id'=>$post->customer_id,'message_id'=>$post->message_id,'message_type'=>@$post->message_type))){
            $this->api_return(array('status' =>true,'error' => 'Message successfully updated !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>false,'error' => 'Some have server error please try again !'),self::HTTP_OK);
    }
    
    public function getcurrent($customer_id = null){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);

        if(empty($customer_id) || !is_numeric($customer_id)){
            $this->api_return(array('status' =>false,'error' => 'Customer ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        $weblink = $this->WeblinkModel->_ganrate_weblink_by_customer_id($customer_id);
        $currentsms = $this->SmsModel->_get_current_sms_by_customer_id($customer_id);
        
        if(empty($currentsms)){
            $this->api_return(array('status' =>false,'error' => 'Current slected message data not found !'),self::HTTP_OK);exit;
        }
        
        foreach($currentsms->result() as $key => $data){
            $currentsms->result()[$key]->message_content = $data->message_content.' '.$weblink;
        }
        
        $this->api_return(array('status' =>true,'error' => 'Data Found !','data'=>$currentsms->result()),self::HTTP_OK);exit;
    }
}