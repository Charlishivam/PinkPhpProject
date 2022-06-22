<?php defined('BASEPATH') or exit('No direct script access allowed');
class ContactModel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function whatsapp_active_contact_list($user_id){
        $this->db->select('*');
        $this->db->where('sync_contacts_customer_id',$user_id);
        $this->db->where('sync_contacts_status','1');
        $this->db->where('sync_contact_is_whatsapp ','1');
        return $this->db->get('ci_sync_contacts');
    } 
}