<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class User extends API_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['user_profile'] = 'uploads/images/';
        
    }
    
    public function details($id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        if(empty($id)){
            $this->api_return(array('status' =>false,'error' => 'User id is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(!is_numeric($id)){
            $this->api_return(array('status' =>false,'error' => 'User id is invalid !'),self::HTTP_OK);exit;
        }
        
        $data = $this->UserModel->_user_details($id);
        
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'error' => 'User data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'error' => '','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    
    public function get_user_details(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post          = json_decode(file_get_contents('php://input'));
        if(empty($post->user_id) || !isset($post->user_id)):
            $this->api_return(array('status' =>false,'message' => 'User Id is Empty!'),self::HTTP_OK);exit;
        endif;
        $user_id  = $post->user_id;
        //single customer contact records  
        $data    = $this->UserModel->_user_details($user_id);
    
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'User data not found !'),self::HTTP_OK);exit;
        }
        if($data->num_rows() > 0){
            $value                              = $data->row(); 
            $response['customer_id']            = $value->customer_id;
            $response['customer_first_name']    = $value->customer_first_name;
            $response['customer_last_name']     = $value->customer_last_name;
            $response['customer_mobile']        = $value->customer_mobile;
            $response['customer_email']         = $value->customer_email;
            $response['customer_create_at']     = $value->customer_create_at;
            $response['customer_image']         = $value->customer_image;
            $this->api_return(array('status' =>true,'message' => 'User data found !','data'=>$response),self::HTTP_OK);
        }
    }
    
    // update profile function
    public function update_profile(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input')); 
        if(!isset($post->customer_id) || empty($post->customer_id)){
             $this->api_return(array('status' =>false,'message' => 'User Id Not Found !'),self::HTTP_OK);exit;
        }
        if(isset($post->email) && !empty($post->email)){
            $data['customer_email']      = $post->email;
        }
        if(isset($post->first_name) && !empty($post->first_name)){
            $data['customer_first_name'] = $post->first_name;
        }
        if(isset($post->last_name) && !empty($post->last_name)){
            $data['customer_last_name']  = $post->last_name;
        }
        if(isset($post->phone) && !empty($post->phone)){
            $data['customer_mobile']     = $post->phone;
        }
        $user_id = $post->customer_id;
        if($this->Base_model->_update_query('ci_customer',$data,array('customer_id'=>$user_id))){
            $this->api_return(array('status' =>true,'message' => 'User profile successfully updated !'),self::HTTP_OK);exit;
        }else{
            $this->api_return(array('status' =>false,'message' => 'Some have server issue !'),self::HTTP_OK);exit;
        }
    }
    
     public function userprofile_update(){
        $this->_apiConfig([
            'methods' => ['POST'], // 'GET', 'OPTIONS'
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);

        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->customer_id) && !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'message' => 'Customer ID Missing Or empty !'),self::HTTP_OK);exit;
        }
        if(empty($post->image) && !isset($post->image)){
            $this->api_return(array('status' =>false,'message' => 'Image ID Missing Or empty !'),self::HTTP_OK);exit;
        }
        
            $image          = $post->image;
            $customer_id    = $post->customer_id;
         
            if(!empty($post->image) && isset($post->image)):
                $data['customer_image']  = 'uploads/images/'.$this->base64ToImage($image,$this->data['user_profile']);
            endif;
         
            
            if($this->Base_model->_update_query('ci_customer',$data,array('customer_id'=>$customer_id))){ 
                $this->api_return(array('status' =>true,'message' => 'Profile has been successfully uploaded !'),self::HTTP_OK); 
            }else{
                $this->api_return(array('status' =>false,'message' => 'Some have server error !'),self::HTTP_OK); 
            }
      
    }
    
    
    // image upload base
    function base64ToImage($base64,$path=null){
        $base64  = 'data:image/png;base64,'.$base64;
        $image_parts  = explode(";base64,",$base64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type   = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imagename    = uniqid().'.png'; 
        $file = 'uploads/profile/'.$imagename ;
        
        if(!empty($path)){
          $file = $path.$imagename ;  
        }
        
        if(file_put_contents($file, $image_base64)){
            return $imagename;
        }else{
            return false;
        }
    }
    
   
    
    
   
}