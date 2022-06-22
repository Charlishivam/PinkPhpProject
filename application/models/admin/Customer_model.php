<?php
class Customer_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_customer()
    {
        $this->db->select('*');
		$this->db->from('ci_customer');
		$this->db->order_by('customer_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }


    function get_all_contactlist($customer_id)
    {
        
        $this->db->select("ci_customer_contact.*,ci_customer.customer_name");
		$this->db->from('ci_customer');
		$this->db->where('customer_id',$customer_id);
		$this->db->join('ci_customer_contact','ci_customer.customer_id=ci_customer_contact.contact_customer_id','left');
		$this->db->order_by('customer_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }

	public function create_new_customer($data){
		$this->db->insert('ci_customer',$data);
		return $this->db->insert_id();
	}
   
}
?>