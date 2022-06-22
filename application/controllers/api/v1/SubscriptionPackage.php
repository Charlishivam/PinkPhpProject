<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class SubscriptionPackage extends API_Controller {
    
    public function __construct() {
        parent::__construct();
       
    }
    
    public function monthly_subscription_package(){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        //single customer contact records  
        $data = $this->Base_model->_single_data_query(array('ci_sp_type'=>'1'),'ci_subcription_package');
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'monthly subscription package data not found !'),self::HTTP_OK);exit;
        }
        if($data->num_rows() > 0){
        foreach($data->result() as $key => $value):
            $data->result()[$key]->ci_sp_image  = base_url().$value->ci_sp_image;
        endforeach;
            $this->api_return(array('status' =>true,'message' => 'monthly subscription package data found !','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    public function yearly_subscription_package(){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        //single customer contact records  
        $data = $this->Base_model->_single_data_query(array('ci_sp_type'=>'2'),'ci_subcription_package');
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'yearly subscription package data not found !'),self::HTTP_OK);exit;
        }
        if($data->num_rows() > 0){
        foreach($data->result() as $key => $value):
            $data->result()[$key]->ci_sp_image  = base_url().$value->ci_sp_image;
        endforeach;
            $this->api_return(array('status' =>true,'message' => 'yearly subscription package data found !','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    
    // get check_validated_subscription_plan
    public function store_subscription_payment_info() {
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input')); 
        
        if(!isset($post->plan_id) || empty($post->plan_id)){
            $this->api_return(array('status' =>false,'message' => 'Plan ID is missing Or Empty !'),self::HTTP_OK);exit;
        }
        if(!isset($post->user_id) || empty($post->user_id)){
            $this->api_return(array('status' =>false,'message' => 'User ID is missing Or Empty !'),self::HTTP_OK);exit;
        }
        
        if(!isset($post->payment_method) || empty($post->payment_method)){
            $this->api_return(array('status' =>false,'message' => 'Payemnt Method is missing Or Empty !'),self::HTTP_OK);exit;
        }
        
        $plan_id           = $post->plan_id;
        $user_id           = $post->user_id;
        $method            = $post->payment_method;
        $packagedata       = $this->Base_model->_single_data_query(array('ci_sp_id'=>$plan_id),'ci_subcription_package','*')->row();
        $subcription_status  =   $this->MembershipPackageModel->check_user_subscription_status($user_id,$plan_id);
        if($subcription_status == "active"):
            $this->api_return(array('status' =>false,'message' => 'Your subscription is active !'),self::HTTP_OK);exit; 
        endif;
        
        $total_amount  = $packagedata->ci_sp_amount;
        $package_type  = $packagedata->ci_sp_type;
        // get wallets amount 
        // if($payment_mode  == 'wallet'):
        //     $walletscheack = $this->WalletsModel->_get_total_wallet_amount($user_id)->row();
        //      if($walletscheack->balence <= $total_amount):
        //         $this->api_return(array('status' =>false,'error' => 'You have less money in your wallet first you recharge then you buy from wallet !'),self::HTTP_OK);exit;
        //     endif;
        // endif; 
        
        $data['transaction_id']             =   'MEM'.rand(111111,999999);
        $data['plan_id']                    =   $plan_id;
        $data['user_id']                    =   $user_id;
        $data['currency']                   =   'INR';
        $data['paid_amount']                =   (int)$total_amount;
        $data['price_amount']                =  (int)$total_amount;
        $data['payment_timestamp']          =   strtotime(date("Y-m-d H:i:s"));
        $data['timestamp_from']             =   strtotime(date("Y-m-d H:i:s"));
        
        if($package_type == '1'):
            $packages  = '30';
        endif;
        if($package_type == '2'):
            $packages  = '365';
        endif;
        $day                                =   $packages;                                    
        $day                                =   '+'.$day.' days';
        
        
        $data['timestamp_to']               =   strtotime($day, $data['timestamp_from']);
        $data['payment_method']             =   $post->payment_method;
        $data['payment_info']               =   json_encode([array('remark'=>'Your  subscription has been successfully please update your payment !','status'=>'0','date'=>date('y-m-d H:i:s'))]);
        $data['status']                     =   0;
        if($this->Base_model->_inser_query('ci_membership_subscription',$data)):
            $last_id = $this->db->insert_id();
            $request['payment_info'] = json_encode([array('remark'=>'Your member subscription has been successfully Please Update your payment  !!','status'=>'0','date'=>date('y-m-d H:i:s'))]);
            if($this->Base_model->_update_query('ci_membership_subscription',$request,array('subscription_id'=>$last_id))){
            //cheack order records;
            $request_data  = $this->Base_model->_single_data_query(array('subscription_id'=>$last_id),'ci_membership_subscription','*')->row();
            $amount        = $request_data->price_amount;
            $order_id      = $request_data->transaction_id;
            
            /*==============check payment methoad=============*/
            $responce = array();
            if($method == 'online'){
                
                $this->load->library('cashfree/Cashfree','cashfree');
                $config['cashfree_mode']       = 'PRODUCTION';
                $config['cashfree_app_id']     = '144799ad8eef160dec12af5568997441';
                $config['cashfree_app_secret'] = '13f31ba1da4c1cd96c7cbe4702851d0153bd7cf1';
                $this->cashfree->initialize($config);
                $responce = $this->cashfree->_create_order($order_id,$amount);
                if(!empty($responce) && @$responce['status'] == 'OK' ){
                    $responce['status']  = 1;
                    $responce['cftoken'] = @$responce['cftoken'];
                }else{
                    $responce['status']  = 0;
                    $responce['cftoken'] = '';
                }
                /*======================create pament log=====================*/
                $this->PaymentLog->created_member_payment_log_online($amount,$order_id);
                /*======================create pament log=====================*/
                $updatedata['cash_payment_id']     = @$responce['cftoken'];
                $this->Base_model->_update_query('ci_membership_subscription',$updatedata,array('subscription_id'=>$last_id));
            }else if($method == 'wallet'){
                /*======================create pament log=====================*/
                $this->PaymentLog->created_booking_payment_log_wallets($amount,$order_id);
                /*======================create pament log=====================*/
                //$this->WalletsModel->_payment_deducted_for_booking($last_id,$amount,$user_id);
                $order_data  = $this->Base_model->_single_data_query(array('subscription_id'=>$last_id),'ci_membership_subscription','*')->row();
                $old_status = !empty($order_data->payment_info) ? json_decode($order_data->payment_info) : array();
                array_push($old_status,['status'=>'1','date'=>date('Y-m-d H:i:s'),'remark'=>'Your payment has been successfully update !!']);
                $updatedata['payment_info'] = json_encode($old_status);
                $updatedata['payment_status'] = '1';
                $updatedata['status']         = '1';
                
                $this->Base_model->_update_query('ci_membership_subscription',$updatedata,array('subscription_id'=>$last_id));
                /*==============check payment methoad=============*/
                $cheack_payment  = $this->Base_model->_single_data_query(array('pay_orderid'=>$order_id),'ci_payment_log','*')->row();
                if($cheack_payment->pay_status == 'payment_complete'):
                /*======================create coin log=====================*/
                
                    $checksubcritpion  = $this->Base_model->_single_data_query(array('tpm_user_id'=>$user_id),'ci_purchase_membership','*');
                    if($checksubcritpion->num_rows() <= 0){
                      /*======================create coin log=====================*/
                        $coin['tpm_plan_id']           = $order_data->plan_id;
                        $coin['tpm_user_id']           = $order_data->user_id;
                        $coin['tpm_transection_id']    = $order_data->transaction_id;
                        $coin['tpm_amount']            = $order_data->price_amount;
                        $coin['tpm_subcription_id']    = $order_data->subscription_id;
                        $coin['tpm_timestamp_from']    = $order_data->timestamp_from;
                        $coin['tpm_timestamp_to']      = $order_data->timestamp_to;
                        $coin['tpm_description']       = 'Your payment is done successfully now you can use our membership';
                        $coin['tpm_date']              =  date('Y-m-d');
                        $coin['tpm_status']            = '1';
                        $coin['tpm_create_at']         = date('Y-m-d H:i:s');
                        $this->Base_model->_inser_query('ci_purchase_membership',$coin);
                    }else{
                        $coin['tpm_plan_id']           = $order_data->plan_id;
                        $coin['tpm_user_id']           = $order_data->user_id;
                        $coin['tpm_timestamp_from']    = $order_data->timestamp_from;
                        $coin['tpm_timestamp_to']      = $order_data->timestamp_to;
                        $coin['tpm_transection_id']    = $order_data->transaction_id;
                        $coin['tpm_amount']            = $order_data->price_amount;
                        $coin['tpm_subcription_id']    = $order_data->subscription_id;
                        $coin['tpm_description']       = 'You have subscribed membership the payment of which has been made successfully updated';
                        $coin['tpm_date']              =  date('Y-m-d');
                        $coin['tpm_status']            = '1';
                        $coin['tpm_create_at']         = date('Y-m-d H:i:s');
                        $this->Base_model->_update_query('ci_purchase_membership',$coin,array('tpm_user_id'=>$user_id));
                    }
                /*======================create coin log=====================*/
                endif;
            }
            /*==============check payment methoad=============*/
            $this->api_return(array('status' =>true,'message' => 'Your payment is done successfully now you can use our membership !!','data'=>$request_data,'payment_details'=>$responce),self::HTTP_OK);exit; 
            }else{
                $this->api_return(array('status' =>false,'message' => 'Oops, Something Went Wrong Request data not updated !'),self::HTTP_OK);exit;    
            }
        else:
            $this->api_return(array('status' =>false,'message' => 'Oops, Something Went Wrong Request data not updated !'),self::HTTP_OK); 
        endif;
        
        
    }
    
    //after payment updated status online 
    public function subscription_payment_status_update(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->user_id) || !isset($post->user_id)){
            $this->api_return(array('status' =>false,'message' => 'User ID missing Or empty !'),self::HTTP_OK);exit;
        }
        if(empty($post->order_id) || !isset($post->order_id)){
            $this->api_return(array('status' =>false,'message' => 'Order ID missing Or empty !'),self::HTTP_OK);exit;
        }
        if(empty($post->transaction_id) || !isset($post->transaction_id)){
            $this->api_return(array('status' =>false,'message' => 'Transaction ID missing Or empty !'),self::HTTP_OK);exit;
        }
        $customer_id      = $post->user_id;
        $transaction_id   = $post->transaction_id;
        $order_id         = $post->order_id;
        $order_data       = $this->Base_model->_single_data_query(array('transaction_id'=>$order_id,'user_id'=>$customer_id),'ci_membership_subscription','*')->row();
        $payment_id       = $order_data->cash_payment_id;
        $buysellid        = $order_data->transaction_id;
        if($transaction_id != $payment_id || $order_id != $buysellid){
            $this->api_return(array('status' =>false,'message' => 'Oops, Something Went Wrong Request data not updated because token is invalid or order id is invalid !'),self::HTTP_OK);exit; 
        }
        if($post->payment_status == true){
            $data['transaction_id'] = $transaction_id;
            $payment_status = payment_status('payment_complete');
            /*======================create pament log=====================*/
            $this->PaymentLog->updated_booking_payment_log_online($order_id,$transaction_id,true);
            /*======================create pament log=====================*/
        }else{
            /*======================create pament log=====================*/
            $this->PaymentLog->updated_booking_payment_log_online($order_id,$transaction_id,false);
            /*======================create pament log=====================*/
            $payment_status = payment_status('payment_failed'); 
        }
        
        $cheack_payment  = $this->Base_model->_single_data_query(array('pay_orderid'=>$order_id),'ci_payment_log','*')->row();
        if($cheack_payment->pay_status == 'payment_complete'):
        /*======================create coin log=====================*/
            $old_status = !empty($order_data->payment_info) ? json_decode($order_data->payment_info) : array();
            array_push($old_status,['status'=>'1','date'=>date('Y-m-d H:i:s'),'remark'=>'You have subscribed membership the payment of which has been made successfully !!']);
            $updatedata['payment_info']        = json_encode($old_status);
            $updatedata['cash_payment_id']     = $transaction_id;
            $updatedata['payment_status']      = '1';
            $updatedata['status']              = '1';
            
            if($this->Base_model->_update_query('ci_membership_subscription',$updatedata,array('transaction_id'=>$order_id))):
                $checksubcritpion  = $this->Base_model->_single_data_query(array('tpm_user_id'=>$customer_id),'ci_purchase_membership','*');
                if($checksubcritpion->num_rows() <= 0){
                  /*======================create coin log=====================*/
                    $coin['tpm_plan_id']           = $order_data->plan_id;
                    $coin['tpm_user_id']           = $order_data->user_id;
                    $coin['tpm_timestamp_from']    = $order_data->timestamp_from;
                    $coin['tpm_timestamp_to']      = $order_data->timestamp_to;
                    $coin['tpm_transection_id']    = $order_data->transaction_id;
                    $coin['tpm_amount']            = $order_data->price_amount;
                    $coin['tpm_subcription_id']    = $order_data->subscription_id;
                    $coin['tpm_description']       = 'You have subscribed membership the payment of which has been made successfully';
                    $coin['tpm_date']              =  date('Y-m-d');
                    $coin['tpm_status']            = '1';
                    $coin['tpm_create_at']         = date('Y-m-d H:i:s');
                    $this->Base_model->_inser_query('ci_purchase_membership',$coin);
                }else{
                    $coin['tpm_plan_id']           = $order_data->plan_id;
                    $coin['tpm_user_id']           = $order_data->user_id;
                    $coin['tpm_timestamp_from']    = $order_data->timestamp_from;
                    $coin['tpm_timestamp_to']      = $order_data->timestamp_to;
                    $coin['tpm_transection_id']    = $order_data->transaction_id;
                    $coin['tpm_amount']            = $order_data->price_amount;
                    $coin['tpm_subcription_id']    = $order_data->subscription_id;
                    $coin['tpm_description']       = 'You have subscribed membership the payment of which has been made successfully updated';
                    $coin['tpm_date']              =  date('Y-m-d');
                    $coin['tpm_status']            = '1';
                    $coin['tpm_create_at']         = date('Y-m-d H:i:s');
                    $this->Base_model->_update_query('ci_purchase_membership',$coin,array('tpm_user_id'=>$customer_id));
                }
                $this->api_return(array('status' =>true,'message' => 'You have subscribed membership the payment of which has been made successfully !'),self::HTTP_OK);exit; 
            else:
                $this->api_return(array('status' =>false,'message' => 'Oops, Something Went Wrong data not updated !'),self::HTTP_OK);exit;    
            endif;
        /*======================create coin log=====================*/
        else:
            $this->api_return(array('status' =>false,'message' => 'Oops, Something Went Wrong Your payment is not successfully done because technical issues have arrived. !'),self::HTTP_OK);exit;
        endif;

    }
    
     public function get_user_subscription_package_title_and_expired_date(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->user_id) || !isset($post->user_id)){
            $this->api_return(array('status' =>false,'message' => 'User ID missing Or empty !'),self::HTTP_OK);exit;
        }
        if(empty($post->plan_id) || !isset($post->plan_id)){
            $this->api_return(array('status' =>false,'message' => 'Plan ID missing Or empty !'),self::HTTP_OK);exit;
        }
       
        $customer_id         = $post->user_id;
        $plan_id             = $post->plan_id;
        $subcription_status  =   $this->MembershipPackageModel->_get_user_subscription_package_title_and_expired_date($customer_id,$plan_id);
        $this->api_return(array('status' =>true,'message'=>'Data found','data' => $subcription_status),self::HTTP_OK);exit;
       
    }
    
   
    

    
  
    
   
    
    
}