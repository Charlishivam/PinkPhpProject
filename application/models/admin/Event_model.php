<?php
class Event_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	function get_all_event()
    {
        $this->db->select('*');
		$this->db->from('ci_upcomming_events');
		$this->db->order_by('upcomming_events_id','desc');
		$query = $this->db->get();
        return $query->result_array();
    }
}
?>