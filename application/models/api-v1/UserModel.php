<?php defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function _user_details($user_id){
        $this->db->select("ci_customer.*,concat('".base_url()."',customer_image) as customer_image");
		$this->db->where('customer_id',$user_id);
		return $this->db->get('ci_customer');
    }
}
