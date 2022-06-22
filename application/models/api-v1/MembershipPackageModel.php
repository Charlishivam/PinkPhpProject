<?php defined('BASEPATH') or exit('No direct script access allowed');

class MembershipPackageModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    
    function check_user_subscription_status($user_id='',$plan_id =''){
        $validity = "inactive";
        if(!empty($user_id)):
            
            $this->db->where('tpm_status','1');
            $this->db->where('tpm_timestamp_to >',time());
            $this->db->where('tpm_plan_id',$plan_id);
            $this->db->where('tpm_user_id',$user_id);
            $query = $this->db->get('ci_purchase_membership');
            if($query->num_rows() >0):
                $validity = $query->row()->tpm_timestamp_to;
                if($validity > time())
                    $validity = "active";
            endif;
        endif;
        return $validity;
    }
    
    function _get_user_subscription_package_title_and_expired_date($user_id='',$plan_id =''){
        $response['title']              = "Not Found";
        $response['expire_date']        = date('Y-m-d', strtotime("+100 years"));
        $this->db->where('tpm_status','1');
        if(!empty($plan_id)):
            $this->db->where('tpm_plan_id',$plan_id);
        endif;
        $this->db->where('tpm_timestamp_to >',time()); 
        $this->db->where('tpm_user_id',$user_id);
        $query    = $this->db->get('ci_purchase_membership');
        if($query->num_rows() > 0):
            $response['title']          = $this->get_plan_name_by_id($query->row()->tpm_plan_id);
            $response['expire_date']    = date("Y-m-d",$query->row()->tpm_timestamp_to);
        endif;
        return $response;
    }
    
    function get_plan_name_by_id($plan_id){
        $name = "Not Found";
        if($plan_id == 0):
            $name = "Not Found";
        endif;
        $query = $this->db->get_where('ci_subcription_package',array('ci_sp_id'=>$plan_id));
        if($query->num_rows() >0):
            $name = $this->db->get_where('ci_subcription_package',array('ci_sp_id'=>$plan_id))->row()->ci_sp_title;
        endif;
        return $name;
    }

}
