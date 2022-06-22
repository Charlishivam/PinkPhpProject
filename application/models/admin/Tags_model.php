<?php
class Tags_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	
    function get_all_tags()
    {
        $this->db->select('*');
		$this->db->from('ci_tags');
		$this->db->order_by('tag_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
    
    //-----------------------------------------------------
	function add_tags($data)
    {
		$this->db->insert('ci_tags', $data);
		return true;
    }

    //---------------------------------------------------
	// Edit Module
	public function edit_tags($data, $id){
		$this->db->where('tag_id', $id);
		$this->db->update('ci_tags', $data);
		return true;
	}

	//-----------------------------------------------------
	function delete_tags($id)
	{		
		$this->db->where('tag_id',$id);
		$this->db->delete('ci_tags');
	} 

	//-----------------------------------------------------
	function get_tags_by_id($id)
    {
		$this->db->from('ci_tags');
		$this->db->where('tag_id',$id);
		$query=$this->db->get();
		return $query->row_array();
    }	
    
}
?>