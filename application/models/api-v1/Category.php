<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function _all_categories_first_level(){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_level','1');
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    
    public function _categories_first_get_by_id($id){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_id',$id);
        $this->db->where('cat_level','1');
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    //===============Second level ================
    public function _all_categories_second_level(){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_level','2');
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    public function _categories_second_get_by_id($id){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_id',$id);
        $this->db->where('cat_level','2');
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    
    //===============Third level ================
    public function _all_categories_third_level(){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_level','3');
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    public function _categories_third_get_by_id($id){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_parents',$id);
        $this->db->where('cat_level','3');
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    
    
    public function get_teamplates_record(){
        $this->db->select('ci_greeting.*,cat.cat_name as category_name,subcat.cat_name as subcategory_name,concat("'.base_url($this->data['greetings']).'",greeting_image) as teamplates_image');
        $this->db->from('ci_greeting');
        $this->db->join('ci_categories cat','cat.cat_id=ci_greeting.greeting_cat_id','LEFT');
        $this->db->join('ci_categories subcat','subcat.cat_id=ci_greeting.greeting_sub_cat_id','LEFT');
        $this->db->order_by('ci_greeting.greeting_id','DESC');
        $query=$this->db->get();
        return $query;
    }
    
    
    
    public function _get_teamplates_by_cat_id($cat_id){
        $this->db->select('ci_greeting.*,cat.cat_name as category_name,subcat.cat_name as subcategory_name,concat("'.base_url($this->data['greetings']).'",greeting_image) as teamplates_image');
        $this->db->from('ci_greeting');
        $this->db->join('ci_categories cat','cat.cat_id=ci_greeting.greeting_cat_id','LEFT');
        $this->db->join('ci_categories subcat','subcat.cat_id=ci_greeting.greeting_sub_cat_id','LEFT');
        $this->db->where('ci_greeting.greeting_cat_id',$cat_id);
        $this->db->order_by('ci_greeting.greeting_id','DESC');
        $query=$this->db->get();
        return $query;
    }
    

    
    public function _get_subcategory_by_category_id($id){
        $this->db->select('cat_id,cat_name,concat("'.base_url($this->data['categories']).'",cat_image) as cat_image');
        $this->db->where('cat_parents',$id);
        $this->db->where('cat_status','1');
        $this->db->order_by('cat_id','desc');
		return $this->db->get('ci_categories');
    }
    
    
    
    
    public function _get_teamplates_by_subcat_id($subcat_id){
        $this->db->select('ci_greeting.*,cat.cat_name as category_name,subcat.cat_name as subcategory_name,concat("'.base_url($this->data['greetings']).'",greeting_image) as teamplates_image');
        $this->db->from('ci_greeting');
        $this->db->join('ci_categories cat','cat.cat_id=ci_greeting.greeting_cat_id','LEFT');
        $this->db->join('ci_categories subcat','subcat.cat_id=ci_greeting.greeting_sub_cat_id','LEFT');
        $this->db->where('ci_greeting.greeting_sub_cat_id',$subcat_id);
        $this->db->order_by('ci_greeting.greeting_id','DESC');
        $query=$this->db->get();
        return $query;
    }
}
