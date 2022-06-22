<?php
class Subcategory_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_subcategory()
    {
        $this->db->select('*');
		$this->db->from('ci_categories');
		$this->db->where('cat_level',2);
		$this->db->order_by('cat_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }


    function get_all_cat_name($cat_parents)
    {
        $this->db->select('*');
		$this->db->from('ci_categories');
		$this->db->where('cat_id',$cat_parents);
		$query = $this->db->get();
        return $query->row_array();
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