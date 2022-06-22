<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Contact extends API_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function list($customer_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        //single customer contact records  
        $data = $this->Base_model->_all_data_optional_condetion('contact_id,contact_name,contact_mobile,contact_emial','ci_customer_contact',array('contact_customer_id'=>$customer_id),'contact_name asc');
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'error' => 'Contact data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'error' => '','data'=>$data->result()),self::HTTP_OK);
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
        if(empty($post->contact_name) || !isset($post->contact_name)){
            $this->api_return(array('status' =>false,'error' => 'Contact name is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->contact_mobile) || !isset($post->contact_mobile)){
            $this->api_return(array('status' =>false,'error' => 'Contact number is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $check = $this->Base_model->_single_data_query(array('contact_mobile'=>$post->contact_mobile,'contact_customer_id'=>$post->customer_id),'ci_customer_contact','*');
        if($check->num_rows() > 0){
            $this->api_return(array('status' =>false,'error' => 'Contact number is alredy exist !'),self::HTTP_OK);exit;
        }
        
        $data['contact_customer_id'] = $post->customer_id;
        $data['contact_name']        = $post->contact_name;
        $data['contact_mobile']      = $post->contact_mobile;
        $data['contact_create_at']   = date('Y-m-d H:i:s');
        
        if(!empty($post->contact_emial) && isset($post->contact_emial)){
            $data['contact_emial']      = $post->contact_emial;
        }
        
        if($this->Base_model->_inser_query('ci_customer_contact',$data)){
            $this->api_return(array('status' =>true,'error' => 'Contact successfully saved !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>false,'error' => 'Some have server error please try again !'),self::HTTP_OK);
    }
    
    public function update(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        
        if(empty($post->contact_id) || !isset($post->contact_id)){
            $this->api_return(array('status' =>false,'error' => 'Contact ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->contact_name) || !isset($post->contact_name)){
            $this->api_return(array('status' =>false,'error' => 'Contact name is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->contact_mobile) || !isset($post->contact_mobile)){
            $this->api_return(array('status' =>false,'error' => 'Contact number is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $data['contact_id']          = $post->contact_id;
        $data['contact_name']        = $post->contact_name;
        $data['contact_mobile']      = $post->contact_mobile;
        $data['contact_update_at']   = date('Y-m-d H:i:s');
        
        if(!empty($post->contact_emial) && isset($post->contact_emial)){
            $data['contact_emial']      = $post->contact_emial;
        }
        
        if($this->Base_model->_update_query('ci_customer_contact',$data,array('contact_id'=>$post->contact_id))){
            $this->api_return(array('status' =>true,'error' => 'Contact successfully updated !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>false,'error' => 'Some have server error please try again !'),self::HTTP_OK);
    }
}