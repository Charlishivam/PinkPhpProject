<?php defined('BASEPATH') or exit('No direct script access allowed');
class Shedulemedia extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function shedule_media_list_by_user($user_id){
        $this->db->select('*');
        $this->db->where('schedule_customer_id',$user_id);
        $this->db->where('schedule_is_send','0');
        $this->db->where('date(schedule_date)',date('Y-m-d'));
        return $this->db->get('ci_scheduled_media');
    } 
    
    
    public function shedule_media_by_id($id){
        $this->db->select('*');
        $this->db->where('schedule_id',$id);
        $this->db->join('ci_customer','ci_customer.customer_id=ci_scheduled_media.schedule_customer_id','left');
        return $this->db->get('ci_scheduled_media');
    }
}