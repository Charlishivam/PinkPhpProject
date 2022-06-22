<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends MY_Home_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('functions_helper');  
        $this->load->model('Home_model');
        $this->load->model('api-v1/PaymentLog','PaymentLog');
        $this->load->model('api-v1/MembershipPackageModel','MembershipPackageModel');
        $this->load->library('session');
        $this->data['userid'] = $this->session->userdata('customer_id');
    }
    

    
   // get check_validated_subscription_plan
    public function index() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $plan_id    = $this->uri->segment(3);
       
        if(!isset($plan_id) || empty($plan_id)){
            $this->session->set_flashdata('error', 'Please Select Plan Id ! ');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $user_id           = $this->data['userid'];
        $method            = 'online';
        
        //cheack user subscription
        $packagedata           =   $this->Base_model->_single_data_query(array('ci_sp_id'=>$plan_id),'ci_subcription_package','*')->row();
        $subcription_status    =   $this->MembershipPackageModel->check_user_subscription_status($user_id,$plan_id);
        
       
        if($subcription_status == "active"):
            $this->session->set_flashdata('error', 'Your subscription is active ! ');
            redirect($_SERVER['HTTP_REFERER']);
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
        $data['payment_method']             =   $method;
        $data['payment_info']               =   json_encode([array('remark'=>'Your  subscription has been successfully please update your payment !','status'=>'0','date'=>date('y-m-d H:i:s'))]);
        $data['status']                     =   0;
        if($this->Base_model->_inser_query('ci_membership_subscription',$data)):
            $last_id = $this->db->insert_id();
            
            $paydata['pay_amount']                 =   $total_amount;
            $paydata['pay_orderid']                =   $data['transaction_id'];
            $paydata['pay_status']                 =  "payment_pending";
            $paydata['pay_status_history']         =   json_encode([array('remark'=>'Your  subscription has been successfully please update your payment !','status'=>'payment_pending','date'=>date('y-m-d H:i:s'))]);
            $paydata['pay_create_at']              =   date("Y-m-d H:i:s");
            $paydata['pay_upadte_at']              =   date("Y-m-d H:i:s");
            $this->Base_model->_inser_query('ci_payment_log',$paydata);
            $this->pay($data['transaction_id']);
        else:
            $this->session->set_flashdata('error', 'Oops, Something Went Wrong Request data not updated ! ');
            redirect('home/pricingpage');
        endif;
        
        
    }
    
        public function pay($subcription_id){
        $this->data['viewrequest'] = $this->Home_model->_get_subcription_record($subcription_id);
	    $this->load->view('front-end/cashfree-pay-form.php',$this->data);
    }
    
    
    public function payment_update(){
        if(strtolower($this->input->post('txStatus')) == "success"){
            $subscription_id     = $this->input->post('orderId');
            $transaction_id = $this->input->post('referenceId');

            $this->payment_status_update($subscription_id,$transaction_id);
        }else{
           $this->session->set_flashdata('error','Oops somthing went wrong !');
           redirect(''); 
        }
    }
    
    //after payment updated status online 
    public function payment_status_update($subscription_id,$transaction_id){
        
        //if($post->payment_status == true){
            $data['cash_payment_id'] = $transaction_id;
            $payment_status = payment_status('payment_complete');
            /*======================create pament log=====================*/
            $this->PaymentLog->updated_booking_payment_log_online($subscription_id,$transaction_id,true);
            /*======================create pament log=====================*/
        
        //}else{
            /*======================create pament log=====================*/
            //$this->PaymentLog->updated_booking_payment_log_online($request_id,$transaction_id,false);
            /*======================create pament log=====================*/
            //$payment_status = payment_status('payment_failed'); 
        //}
        

        $data['status']                 = '1';
        $data['payment_status']         = '1';
        if($this->Base_model->_update_query('ci_membership_subscription',$data,array('transaction_id'=>$subscription_id))){
            /*==============check payment methoad=============*/
            $cheack_payment   = $this->Base_model->_single_data_query(array('pay_orderid'=>$subscription_id),'ci_payment_log','*')->row();
            $order_data       = $this->Base_model->_single_data_query(array('transaction_id'=>$subscription_id),'ci_membership_subscription','*')->row();
            if($cheack_payment->pay_status == 'payment_complete'):
                /*======================create coin log=====================*/
                    $checksubcritpion  = $this->Base_model->_single_data_query(array('tpm_user_id'=>$user_id,'tpm_plan_id'=>$order_data->plan_id),'ci_purchase_membership','*');
                    if($checksubcritpion->num_rows() <= 0){
                      /*======================create coin log=====================*/
                        $update_coin['tpm_active_status'] = '0';
                        $this->Base_model->_update_query('ci_purchase_membership',$update_coin,array('tpm_user_id'=>$order_data->user_id));
                        
                   
                        
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
                        $coin['tpm_active_status']     = '1';
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

            $this->session->set_flashdata('success','Congratulations Your subscrition membership has been successful done. !');
            redirect('subscription/purchasesubscription');
        }else{
            $this->session->set_flashdata('error','Oops somthing went wrong !');
            redirect('home/pricingpage');
        }
    }
    
    	//-----------------------------------------------------------
	public function purchasesubscription(){
	   $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;

		$this->data['records'] = $this->Home_model->get_all_purchasesubscription($this->data['userid']);
		$this->load->view('front-end/purchasesubscription-page',$this->data);
	}
    
    public function success(){
        $this->load->view('front-end/success-page',$this->data);
    }

}
