<?php
class Slider_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_slider()
    {
        $this->db->select('*');
		$this->db->from('ci_slider');
		$this->db->order_by('slider_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
   
}
?>