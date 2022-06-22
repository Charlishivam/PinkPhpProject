<?php defined('BASEPATH') or exit('No direct script access allowed');
class WeblinkModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function _ganrate_weblink_by_customer_id($id){
        $this->db->select('weblink_uniq_no,weblink_title');
		$this->db->where('weblink_customer_id',$id);
		$result = $this->db->get('ci_customer_weblink')->row();
		$return = '';
		if(!empty($result)){
		   $return = base_url($this->data['weblinkpath'].base64_encode($result->weblink_uniq_no)).' \r\n '.$result->weblink_title;
		}
		return $return;
    }
}
