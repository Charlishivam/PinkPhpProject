<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

     public function all_today_record(){
       $this->db->select("*");
       $this->db->from('ci_upcomming_events');
       $this->db->where('DATE(upcomming_events_date) >=', date('Y-m-d'));
       return $this->db->get();
    }
    
    public function all_limited_record(){
       $this->db->select("*");
       $this->db->from('ci_greeting');
       $this->db->limit(20);
       return $this->db->get();
    }
    
    public function all_greeting_record(){
       $this->db->select("*");
       $this->db->from('ci_greeting');
       $this->db->where('greeting_status','1');
       $this->db->order_by('rand()');
       $this->db->limit(50);
       return $this->db->get();
    }
    
    
    
    public function all_greeting_record_by_category_id($category_id){
       $this->db->select("*");
       $this->db->from('ci_greeting');
       $this->db->where_in('greeting_sub_cat_id',$category_id);
       return $this->db->get()->result();
    }
    
     public function all_category_record(){
       $this->db->select("*");
       $this->db->from('ci_categories');
       $this->db->where('cat_level', '1');
       $this->db->where('cat_status', '1');
       $category = $this->db->get();
       foreach($category->result() as $category_key => $category_value):
                           $this->db->select("*");
                           $this->db->from('ci_categories');
                           $this->db->where('cat_parents',$category_value->cat_id);
                           $subcategory = $this->db->get()->result();
           $category->result()[$category_key]->subcatgory  =   $subcategory;
       endforeach;
      return $category;
    }
    // public function get_suabcat_by_filter(){
    //         $this->db->select("*");
    //         $this->db->from('ci_greeting');
            
    //         if($this->input->get('ci')){
    //         $this->db->where_in('ci_greeting.cat_id',explode('_',$this->input->get('ci')));
    //         }
    //         $result =  $this->db->get();
        
    //       return $result;
    // }
    
     public function get_suabcat_by_filter(){
            $this->db->select("*");
            $this->db->from('ci_greeting');

            if($this->input->get('counid')){
            $this->db->where_in('col.co_id',explode('_',$this->input->get('counid')));
            }
            if($this->input->get('ci')){
            $this->db->where_in('col.city_id',explode('_',$this->input->get('ci')));
            }
            
            if($this->input->get('sti')){
                $this->db->where_in('col.st_id',explode('_',$this->input->get('sti')));
            }

            if($this->input->get('subid')){
                $subid = array_filter(explode('_',$this->input->get('subid')));
                foreach($subid as $key => $ids){
                    $this->db->or_like('col.sc_id',$ids);
                }                
            }
            $result =  $this->db->get();
             return $result;

        if($this->input->get('corid')){
                $corid = array_filter(explode('_',$this->input->get('corid')));
                foreach($corid as $key => $idc){
                    $this->db->or_like('col.cor_id',$idc);
                }                
            }
            $result =  $this->db->get();
        return $result;
    }
    
    
    
    
    public function _get_subcat_overall_catid(){
        $subcategory_ids = $this->db->select('GROUP_CONCAT(greeting_sub_cat_id SEPARATOR ",") as subcategory')->get('ci_greeting')->row();
         if(!empty($subcategory_ids)){
            $result = $this->db->select('*')
            ->where_in('cat_id',explode(',',$subcategory_ids->subcategory))
            ->get('ci_categories');

            $data = !empty($this->input->get('ci')) ? explode('_',$this->input->get('ci')):array();
            foreach($result->result() as $key => $row){
                if(in_array($row->cat_id,$data)){
                   $result->result()[$key]->is_check = 'checked';
                }else{
                   $result->result()[$key]->is_check = '';
                }
            }
            return $result;
        }else{
            return false;
        }
    }
    
    
    public function _get_subcription_record($subscription_id){
       $this->db->select("ci_membership_subscription.*,ci_customer.customer_first_name,ci_customer.customer_last_name,ci_customer.customer_mobile");
       $this->db->from('ci_membership_subscription');
       $this->db->join('ci_customer','ci_customer.customer_id=ci_membership_subscription.user_id',"left");
       $this->db->where('transaction_id', $subscription_id);
       $subscription = $this->db->get();
      return $subscription;
    }
    
    public function get_all_purchasesubscription($user_id)
    {
        $this->db->select('ci_purchase_membership.*,ci_customer.customer_first_name,ci_customer.customer_last_name,ci_customer.customer_name,ci_subcription_package.ci_sp_title');
		$this->db->from('ci_purchase_membership');
		$this->db->join('ci_customer', 'ci_customer.customer_id = ci_purchase_membership.tpm_user_id', 'LEFT'); 
		$this->db->join('ci_subcription_package', 'ci_subcription_package.ci_sp_id = ci_purchase_membership.tpm_plan_id', 'LEFT'); 
		$this->db->where('ci_purchase_membership.tpm_user_id', $user_id);
		$this->db->order_by('ci_purchase_membership.tpm_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_customer()
    {
        $this->db->select('*');
		$this->db->from('ci_customer');
		$this->db->where('customer_image is NOT NULL', NULL, FALSE);
		$this->db->order_by('ci_customer.customer_id','desc');
		$query = $this->db->get();
        return $query->result();
    }
    
  
    
    public function get_all_schedule($customer_id)
    {
        $this->db->select('*');
		$this->db->from('ci_scheduled_media');
		$this->db->where('schedule_customer_id',$customer_id);
		$this->db->order_by('ci_scheduled_media.schedule_id','desc');
		$query = $this->db->get();
        return $query->result();
    }
    
}
