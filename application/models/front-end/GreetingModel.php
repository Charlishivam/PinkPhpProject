<?php defined('BASEPATH') or exit('No direct script access allowed');

class GreetingModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    
    public function get_single_greeting_details_by_id($id){
        try {
           $this->db->select("*");
           $this->db->from('ci_greeting');
           $this->db->where('greeting_id',$id);
           return $this->db->get();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}