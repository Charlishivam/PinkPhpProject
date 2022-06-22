<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Auth extends API_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    // login function
    public function login() {
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->mobile) || !isset($post->mobile)){
            $this->api_return(array('status' =>false,'message' => 'mobile is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->password) || !isset($post->password)){
            $this->api_return(array('status' =>false,'message' => 'Password is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        if(empty($post->device_token) || !isset($post->device_token)){
            $this->api_return(array('status' =>false,'message' => 'Firbase Device token is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $mobile    = $post->mobile;
        $password  = md5($post->password);
        if ($mobile && $password !='' && $password !=NULL):  
            $login_status = $this->Base_model->_single_data_query(array('customer_status'=>'1','customer_mobile'=>$mobile,'customer_password'=>$password),'ci_customer','*');
            if ($login_status->num_rows() <= 0):
                $response['customer_status']          = '';
                $response['customer_id']              = '';
                $response['customer_first_name']      = '';
                $response['customer_last_name']       = '';
                $response['customer_image']           = '';
                $response['customer_gender']          = '';
                $response['customer_mobile']          = '';
                $response['customer_create_at']       = '';
                $response['customer_token']           = '';
                $is_exist                             = '0';
                $this->api_return(array('status' =>false,'message' => 'Phone & Password not match.Please try again.!','data'=>$response,'is_exist'=>$is_exist),self::HTTP_OK);exit;
            endif;
            if ($login_status->num_rows() >= 0):
                $credential    =   array(  'customer_mobile' => $mobile , 'customer_password' => $password,'customer_status'=>'1');
                $this->db->where($credential);
                $this->db->update('ci_customer', array('customer_create_at' => date('Y-m-d H:i:s'),'customer_token' => $post->device_token));
                
                $user_info              = $this->Base_model->_single_data_query(array('customer_status'=>'1','customer_mobile'=>$mobile,'customer_password'=>$password),'ci_customer','*')->row();
               
                $otp_verified           = $user_info->customer_is_verified;
            
                if($otp_verified  == '1'):
                    $response['customer_status']          = '1';
                    $response['customer_id']              = $user_info->customer_id;
                    $response['customer_first_name']      = $user_info->customer_first_name;
                    $response['customer_last_name']       = $user_info->customer_last_name;
                    $response['customer_image']           = $user_info->customer_image;
                    $response['customer_gender']          = $user_info->customer_gender;
                    $response['customer_mobile']          = $user_info->customer_mobile;
                    $response['customer_create_at']       = $user_info->customer_create_at;
                    $response['customer_is_verified']     = $user_info->customer_is_verified;
                    $response['customer_token']           = $user_info->customer_token;
                    $is_exist    = '1';
                else:
                    
                    $response['customer_status']          = '1';
                    $response['customer_id']              = $user_info->customer_id;
                    $response['customer_first_name']      = $user_info->customer_first_name;
                    $response['customer_last_name']       = $user_info->customer_last_name;
                    $response['customer_image']           = $user_info->customer_image;
                    $response['customer_gender']          = $user_info->customer_gender;
                    $response['customer_mobile']          = $user_info->customer_mobile;
                    $response['customer_create_at']       = $user_info->customer_create_at;
                    $response['customer_token']           = $user_info->customer_token;
                    $response['customer_is_verified']     = $user_info->customer_is_verified;
                    $is_exist    = '0';
                    $this->api_return(array('status' =>true,'message' => 'this mobile number is not verified please verifed then login here  !','data'=>$response,'is_exist'=>$is_exist),self::HTTP_OK);exit;
                    
                endif;
            else:
                $response['customer_status']          = '';
                $response['customer_id']              = '';
                $response['customer_first_name']      = '';
                $response['customer_last_name']       = '';
                $response['customer_image']           = '';
                $response['customer_gender']          = '';
                $response['customer_mobile']          = '';
                $response['customer_create_at']       = '';
                $response['customer_token']           = '';
                $is_exist                             = '0';
                $this->api_return(array('status' =>false,'message' => 'user does not exits.!','data'=>$response,'is_exist'=>$is_exist),self::HTTP_OK);exit;
            endif;
        else:
                $response['customer_status']          = '';
                $response['customer_id']              = '';
                $response['customer_first_name']      = '';
                $response['customer_last_name']       = '';
                $response['customer_image']           = '';
                $response['customer_gender']          = '';
                $response['customer_mobile']          = '';
                $response['customer_create_at']       = '';
                $response['customer_token']           = '';
                $is_exist                             = '0';
            $this->api_return(array('status' =>false,'message' => 'Please enter valid phone & password.!','data'=>$response,'is_exist'=>$is_exist),self::HTTP_OK);exit;
        endif;
        $is_exist    = '1';
        $this->api_return(array('status' =>true,'message' => 'Data Found','data'=>$response,'is_exist'=>$is_exist),self::HTTP_OK);exit;
    }
    

    
  
    
    
    public function createuser(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->mobile) || !isset($post->mobile)){
            $this->api_return(array('status' =>false,'message' => 'User mobile is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->first_name) || !isset($post->first_name) && !is_string($post->first_name)){
            $this->api_return(array('status' =>false,'message' => 'User first name is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        if(empty($post->last_name) || !isset($post->last_name) && !is_string($post->last_name)){
            $this->api_return(array('status' =>false,'message' => 'User first name is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        if(empty($post->password) || !isset($post->password) && !is_string($post->password)){
            $this->api_return(array('status' =>false,'message' => 'Password name is empty Or missing !'),self::HTTP_OK);exit;
        }
        
       
        if(empty($post->message_key) || !isset($post->message_key)){
            $this->api_return(array('status' =>false,'message' => 'Message Key is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->device_token) || !isset($post->device_token)){
            $this->api_return(array('status' =>false,'message' => 'Firbase Device token is empty Or missing !'),self::HTTP_OK);exit;
        }
        $first_name   = $post->first_name;
        $last_name    = $post->last_name;
        $fcmtoken     = $post->device_token;
        $mobile       = $post->mobile;
        $messagekey   = $post->message_key;
        $password     = $post->password;
       
        
        $checkauth = $this->Base_model->_single_data_query(array('customer_mobile'=>$mobile),'ci_customer','*');
        if($checkauth->num_rows() <= 0){
           
            $data['customer_otp']               = '123456';
            $data['customer_token']             = $fcmtoken;
            $data['customer_status']            = '1';
            $data['customer_mobile']            = $mobile;
            $data['customer_first_name']        = $first_name;
            $data['customer_last_name']         = $last_name;
            $data['customer_password']          = md5($password );
            $data['customer_create_at']  = date('Y-m-d H:i:s');
            $lastid = $this->Base_model->_inser_query('ci_customer',$data);
            
            
            /*========================Otp for sms======================*/
            $template_customer = $this->Base_model->get_template_by_slug("otp");
            if(!empty($template_customer)){
                $variables['#OTP']          =  $data['customer_otp'];
				$variables['#message_key']  =  $messagekey;
				$smsconte              = str_replace(array_keys($variables), array_values($variables), $template_customer['content']);
			//	$this->_send_sms($mobile,$smsconte,$template_customer['template_id']);
            }
            /*========================Otp for sms======================*/
            $is_exist    = '0'; 
            $is_update   = '0'; 
            $this->api_return(array('status' =>true,'message' => 'One time password has been sent successfully your register number +91-'.$mobile.' !','otp'=>$data['customer_otp'],'is_exist'=>$is_exist,'is_update'=>$is_update),self::HTTP_OK);exit;
        }else{
            $is_exist    = '1'; 
            $is_update   = '0'; 
            $this->api_return(array('status' =>false,'message' => 'This mobile number already registered !','is_exist'=>$is_exist,'is_update'=>$is_update),self::HTTP_OK);exit;
        }
    }
    
     public function checkuserotp(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->mobile) || !isset($post->mobile)){
            $this->api_return(array('status' =>false,'message' => 'Mobile is empty Or missing !'),self::HTTP_OK);exit;
        } 
        if(empty($post->otp) || !isset($post->otp)){
            $this->api_return(array('status' =>false,'message' => 'OTP is empty Or missing !'),self::HTTP_OK);exit;
        } 
        //$username     = $post->name;
        $mobile     = $post->mobile;
        $otp        = (int)$post->otp;
        $checkauth = $this->Base_model->_single_data_query(array('customer_mobile'=>$mobile),'ci_customer','*');
        if($checkauth->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Customer data not found !'),self::HTTP_OK);exit;
        }
        
        $single = $checkauth->row();
        if($single->customer_otp == $otp && strlen($otp) == 6){
            $data['customer_otp']             = null;
            $data['customer_is_verified']    = '1';
            $this->Base_model->_update_query('ci_customer',$data,array('customer_id'=>$single->customer_id));
            $this->api_return(array('status' =>true,'message' => 'Your one time password successfully match  !','customer_id'=>$single->customer_id),self::HTTP_OK);exit;
        }else{
            $this->api_return(array('status' =>false,'message' => 'You Enter wrong OTP !'),self::HTTP_OK);exit;
        }
    }
    
    public function resendotp(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->mobile) || !isset($post->mobile)){
            $this->api_return(array('status' =>false,'message' => 'User mobile is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->otp_for) || !isset($post->otp_for)){
            $this->api_return(array('status' =>false,'message' => 'One type is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->device_token) || !isset($post->device_token)){
            $this->api_return(array('status' =>false,'message' => 'Firbase Device token is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        if(empty($post->message_key) || !isset($post->message_key)){
            $this->api_return(array('status' =>false,'message' => 'Message Key is empty Or missing !'),self::HTTP_OK);exit;
        }
        $mobile     = $post->mobile;
        $otp_for    = $post->otp_for;
        $fcmtoken   = $post->device_token;
        $messagekey = $post->message_key;
        $checkauth = $this->Base_model->_single_data_query(array('customer_mobile'=>$mobile),'ci_customer','*');
      
        
        if($otp_for == 1 && $checkauth->num_rows() > 0){
            $data['customer_otp']         = '123456'; //rand(111111,999999);
            $data['customer_token']       = $fcmtoken;
            $this->Base_model->_update_query('ci_customer',$data,array('customer_mobile'=>$mobile));
            /*========================Otp======================*/
            $template_customer = $this->Base_model->get_template_by_slug("otp");
            if(!empty($template_customer)){
                $variables['#OTP']          =  $data['customer_otp'];
				$variables['#message_key']  =  $messagekey;
				$smsconte              = str_replace(array_keys($variables), array_values($variables), $template_customer['content']);
			//	$this->_send_sms($mobile,$smsconte,$template_customer['template_id']);
            }
           
            /*========================Otp======================*/
            $this->api_return(array('status' =>true,'message' => 'One time password has been resend successfully your register number +91-'.$mobile.' !','otp'=>$data['customer_otp']),self::HTTP_OK);exit;
        }else{
            $this->api_return(array('status' =>false,'message' => 'This otp type is not configured !'),self::HTTP_OK);exit;
        }
    }
    
    public function _send_sms($mobile,$message,$tmpid = null,$unicode = null){
      //Your authentication key
      $authKey = "4ae2c029edbb60021d673a961d9159b6";
      //Multiple mobiles numbers separated by comma
      $mobileNumber =$mobile;
      //Sender ID,While using route4 sender id should be 6 characters long.
      $senderId = "DKRNTI";
      //Your message to send, Add URL encoding here.
      $message = urlencode($message);
      //Define route 
      $route = "4";
      //Prepare you post parameters
      $postData = array(
          'authkey'     => $authKey,
          'mobiles'     => $mobileNumber,
          'message'     => $message,
          'sender'      => $senderId,
          'route'       => $route,
          'DLT_TE_ID'   =>$tmpid
      );
      //API URL
      //$url="https://api.msg91.com/api/v2/sendsms";
      $url="https://smsapi.thedigitalkranti.com/api/v1/sms/send";

      // init the resource
      $ch = curl_init();
      curl_setopt_array($ch, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => $postData
      ));
      //Ignore SSL certificate verification
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      //get response
      $output = curl_exec($ch);
      curl_close($ch);
      return $output ;
    }
}