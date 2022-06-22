<?php
class Purchasesubscription_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_purchasesubscription()
    {
        $this->db->select('ci_purchase_membership.*,ci_customer.customer_first_name,ci_customer.customer_last_name,ci_customer.customer_name,ci_subcription_package.ci_sp_title');
		$this->db->from('ci_purchase_membership');
		$this->db->join('ci_customer', 'ci_customer.customer_id = ci_purchase_membership.tpm_user_id', 'LEFT'); 
		$this->db->join('ci_subcription_package', 'ci_subcription_package.ci_sp_id = ci_purchase_membership.tpm_plan_id', 'LEFT'); 
		$this->db->order_by('ci_purchase_membership.tpm_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
  
}
?>