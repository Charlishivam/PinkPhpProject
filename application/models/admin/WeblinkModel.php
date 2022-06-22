<?php
class WeblinkModel extends CI_Model{
   
   	public function __construct(){
		parent::__construct();
	}
	function get_all_category(){
        $this->db->select('*');
		$this->db->from('ci_weblink_categories');
		$this->db->where('cat_level',1);
		$this->db->order_by('cat_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
    
    public function _get_weblink_data(){
        $this->db->select('ci_customer_weblink.*,ci_weblink_categories.cat_name,ci_customer.customer_name');
        $this->db->from('ci_customer_weblink');
        $this->db->join('ci_weblink_categories','ci_customer_weblink.weblink_cat_id=ci_weblink_categories.cat_id','left');
        $this->db->join('ci_customer','ci_customer_weblink.weblink_customer_id=ci_customer.customer_id','left');
        $result = $this->db->get();
        return $result;
    }
}