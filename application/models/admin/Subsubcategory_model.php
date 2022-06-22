<?php
class Subsubcategory_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_subsubcategory()
    {
        $this->db->select('ci_greeting.*,ci_categories.cat_name');
		$this->db->from('ci_greeting');
		$this->db->join('ci_categories', 'ci_categories.cat_id = ci_greeting.greeting_cat_id', 'LEFT'); 
		$this->db->order_by('ci_greeting.greeting_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
    
   
    
    
    function get_all_tags()
    {
        $this->db->select('*');
		$this->db->from('ci_tags');
		$this->db->order_by('tag_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
    
    function get_tags_name($tag_id)
    {
        $this->db->select('*');
		$this->db->from('ci_tags');
		$this->db->where('tag_id',$tag_id);
		$this->db->order_by('tag_id','desc');
		$query = $this->db->get();
        return $query->row()->tag_name;
    }


    
   
}
?>