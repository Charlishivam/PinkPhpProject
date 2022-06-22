<?php defined('BASEPATH') or exit('No direct script access allowed');
class PaymentLog extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->helper('status_helper');  
    }
    
    protected $table_paylog = "ci_payment_log";
    
    //this methoads use only online payment log create
    public function created_booking_payment_log_online($amount,$order_id){
        $payment_status = payment_status('payment_pending');
        $paylog['pay_amount']  = $amount;
        $paylog['pay_orderid'] = $order_id;
        $paylog['pay_status']  = $payment_status['status'];
        $paylog['pay_create_at'] = date('Y-m-d H:i:s');
        $paylog['pay_upadte_at'] = date('Y-m-d H:i:s');
        $paylog['pay_payment_method'] = 'online';
        $paylog['pay_status_history'] = json_encode([
            ['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]
            ]);
            
        if($this->check_diplicate_log($order_id) == false){
            $this->db->insert($this->table_paylog,$paylog);
            return true;
        }        
            
        return false;
    }
    
    
    //this methoads use only online payment log create
    public function created_member_payment_log_online($amount,$order_id){
        $payment_status = payment_status('payment_pending');
        $paylog['pay_amount']  = $amount;
        $paylog['pay_orderid'] = $order_id;
        $paylog['pay_status']  = $payment_status['status'];
        $paylog['pay_create_at'] = date('Y-m-d H:i:s');
        $paylog['pay_upadte_at'] = date('Y-m-d H:i:s');
        $paylog['pay_payment_method'] = 'for membership subcription';
        $paylog['pay_status_history'] = json_encode([
            ['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]
            ]);
            
        if($this->check_diplicate_log($order_id) == false){
            $this->db->insert($this->table_paylog,$paylog);
            return true;
        }        
            
        return false;
    }
    
    //this methoads use only online payment log create
    public function created_invetment_payment_log_online($amount,$order_id){
        $payment_status = payment_status('payment_pending');
        $paylog['pay_amount']  = $amount;
        $paylog['pay_orderid'] = $order_id;
        $paylog['pay_status']  = $payment_status['status'];
        $paylog['pay_create_at'] = date('Y-m-d H:i:s');
        $paylog['pay_upadte_at'] = date('Y-m-d H:i:s');
        $paylog['pay_payment_method'] = 'for investment subcription';
        $paylog['pay_status_history'] = json_encode([
            ['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]
            ]);
            
        if($this->check_diplicate_log($order_id) == false){
            $this->db->insert($this->table_paylog,$paylog);
            return true;
        }        
            
        return false;
    }
    
    //this methoads use only wallet payment add 
    public function created_wallet_add_payment_log_online($amount,$order_id){
        $payment_status = payment_status('payment_pending');
        $paylog['pay_amount']  = $amount;
        $paylog['pay_orderid'] = $order_id;
        $paylog['pay_status']  = $payment_status['status'];
        $paylog['pay_create_at'] = date('Y-m-d H:i:s');
        $paylog['pay_upadte_at'] = date('Y-m-d H:i:s');
        $paylog['pay_payment_method'] = 'online';
        $paylog['pay_status_history'] = json_encode([
            ['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]
            ]);
            
        if($this->check_diplicate_log($order_id) == false){
            $this->db->insert($this->table_paylog,$paylog);
            return true;
        }        
            
        return false;
    }
    
    
    //this methoads use only online payment log updated
    public function updated_booking_payment_log_online($order_id,$transaction_id,$status){
        
       
        if($status == '1'){
            $payment_status = payment_status('payment_complete');
        }else{
            $payment_status = payment_status('payment_failed'); 
        }
        
        $log_details = $this->payment_log_details($order_id);
        
        $paylog['pay_txn_id']             = $transaction_id;
        $paylog['pay_status']             = $payment_status['status'];
        $paylog['pay_upadte_at']          = date('Y-m-d H:i:s');
        $paylog['pay_payment_method']     = 'online';
        
        $old_status = !empty($log_details->pay_status_history) ? json_decode($log_details->pay_status_history) : array();
        array_push($old_status,['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]);
        $paylog['pay_status_history'] = json_encode($old_status);
        $this->db->where('pay_orderid',$order_id);
        return $this->db->update($this->table_paylog,$paylog);
    }
    
    //this methoads use only wallet payment log updated
    public function updated_wallet_add_payment_log_online($order_id,$transaction_id,$status){
        if($status == true){
            $payment_status = payment_status('payment_complete');
        }else{
            $payment_status = payment_status('payment_failed'); 
        }
        $log_details = $this->payment_log_details($order_id);
        $paylog['pay_txn_id']             = $transaction_id;
        $paylog['pay_status']             = $payment_status['status'];
        $paylog['pay_upadte_at']          = date('Y-m-d H:i:s');
        $paylog['pay_payment_method']     = 'cashfree wallet add';
        $old_status = !empty($log_details->pay_status_history) ? json_decode($log_details->pay_status_history) : array();
        array_push($old_status,['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]);
        $paylog['pay_status_history'] = json_encode($old_status);
        $this->db->where('pay_orderid',$order_id);
        return $this->db->update($this->table_paylog,$paylog);
    }
    //this methoads use only online payment refund log 
    public function _payment_refund_for_booking_online($request_id){
        $payment_status = payment_status('payment_refund'); 
        $log_details = $this->payment_log_details($request_id);
        $paylog['pay_txn_id']             = $transaction_id;
        $paylog['pay_status']             = $payment_status['status'];
        $paylog['pay_upadte_at']          = date('Y-m-d H:i:s');
        $paylog['pay_payment_method']     = 'online';
        $old_status = !empty($log_details->pay_status_history) ? json_decode($log_details->pay_status_history) : array();
        array_push($old_status,['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]);
        $paylog['pay_status_history'] = json_encode($old_status);
        $this->db->where('pay_orderid',$request_id);
        return $this->db->update($this->table_paylog,$paylog);
    }
    //this methoads use only wallets payment refund log 
    public function _payment_refund_for_booking_wallets($request_id){
        $payment_status = payment_status('payment_refund'); 
        $log_details = $this->payment_log_details($request_id);
        $paylog['pay_txn_id']             = $transaction_id;
        $paylog['pay_status']             = $payment_status['status'];
        $paylog['pay_upadte_at']          = date('Y-m-d H:i:s');
        $paylog['pay_payment_method']     = 'wallets';
        $old_status = !empty($log_details->pay_status_history) ? json_decode($log_details->pay_status_history) : array();
        array_push($old_status,['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]);
        $paylog['pay_status_history'] = json_encode($old_status);
        $this->db->where('pay_orderid',$request_id);
        return $this->db->update($this->table_paylog,$paylog);
    }
    //this methoads use only wallets payment log creat
    public function created_booking_payment_log_wallets($amount,$order_id){
        $payment_status = payment_status('payment_complete');
        $paylog['pay_amount']  = $amount;
        $paylog['pay_orderid'] = $order_id;
        $paylog['pay_status']  = $payment_status['status'];
        $paylog['pay_create_at'] = date('Y-m-d H:i:s');
        $paylog['pay_upadte_at'] = date('Y-m-d H:i:s');
        $paylog['pay_payment_method'] = 'wallets';
        $paylog['pay_status_history'] = json_encode([
            ['status'=>$payment_status['status'],'date'=>date('Y-m-d H:i:s'),'remark'=>$payment_status['remark']]
            ]);
            
        if($this->check_diplicate_log($order_id) == false){
            $this->db->insert($this->table_paylog,$paylog);
            return true;
        }        
            
        return false;
    }
    
    public function check_diplicate_log($order_id){
        $this->db->select('*');
        $this->db->from($this->table_paylog);
        $this->db->where('pay_orderid',$order_id);
        if($this->db->get()->num_rows() > 0){
            return true;
        }
        return false;
    }
    
    public function payment_log_details($order_id){
        $this->db->select('*');
        $this->db->from($this->table_paylog);
        $this->db->where('pay_orderid',$order_id);
        return $this->db->get()->row();
    }
}