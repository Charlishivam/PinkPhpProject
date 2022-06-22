<?php defined('BASEPATH') or exit('No direct script access allowed');
class SmsModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function _get_current_sms_by_customer_id($id){
        $this->db->select('*');
		$this->db->where('message_customer_id',$id);
		$this->db->group_by('message_type');
		$result = $this->db->get('ci_customer_message');
		return $result;
    }
}
