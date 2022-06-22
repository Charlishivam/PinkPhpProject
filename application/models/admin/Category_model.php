<?php
class Category_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_category()
    {
        $this->db->select('*');
		$this->db->from('ci_categories');
		$this->db->where('cat_level',1);
		$this->db->order_by('cat_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
   
}
?>