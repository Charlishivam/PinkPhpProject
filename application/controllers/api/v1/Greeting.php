<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Greeting extends API_Controller {
    
    public function __construct() {
        parent::__construct();
       
    }
    
    public function list(){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        //single customer contact records  
        $data = $this->Category->get_teamplates_record();
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Teamplates data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            
        foreach($data->result() as $key => $value):
           $greeting_tag_id = !empty($value->greeting_tag_id) ? json_decode($value->greeting_tag_id) : array();
           $greeting_array = array();
            foreach($greeting_tag_id as $grkey => $grvalue):
                $greeting = $this->Base_model->_single_data_query(array('tag_id'=>$grvalue),'ci_tags')->row()->tag_name;
                array_push($greeting_array,['id'=>$grvalue,'name'=>$greeting]);
            endforeach;
            $data->result()[$key]->greeting_tag_id  = $greeting_array;
        endforeach;
            
            
            
            $this->api_return(array('status' =>true,'message' => 'Teamplates data found !','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    
    public function get_teamplates_by_cat_id(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $post          = json_decode(file_get_contents('php://input'));
        if(empty($post->category_id) || !isset($post->category_id)):
            $this->api_return(array('status' =>false,'message' => 'Category Id is Empty!'),self::HTTP_OK);exit;
        endif;
        $category_id  = $post->category_id;
        //single customer contact records  
        $data = $this->Category->_get_teamplates_by_cat_id($category_id);
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Teamplates data not found !'),self::HTTP_OK);exit;
        }
        if($data->num_rows() > 0){
        
            
           $value  =  $data->row();
           $greeting_tag_id = !empty($value->greeting_tag_id) ? json_decode($value->greeting_tag_id) : array();
           $greeting_array = array();
            foreach($greeting_tag_id as $grkey => $grvalue):
                $greeting = $this->Base_model->_single_data_query(array('tag_id'=>$grvalue),'ci_tags')->row()->tag_name;
                array_push($greeting_array,['id'=>$grvalue,'name'=>$greeting]);
            endforeach;
            $value->greeting_tag_id             = $greeting_array;
            $response['teamplates_id']          = $value->greeting_id;
            $response['subcategory_name']       = $value->subcategory_name;
            $response['category_name']          = $value->category_name;
            $response['teamplates_image']       = $value->teamplates_image;
            $response['teamplates_tagname']     = $value->greeting_tag_id;
            $response['teamplates_created_at']  = $value->greeting_create_at;
            $response['teamplates_status']      = $value->greeting_status;
            $response['no_of_image']            = $value->no_of_image;
            $response['image_position1']        = $value->image_position1;
            $response['image_position2']        = $value->image_position2;
            $response['teamplates_name']        = $value->greeting_name;
            $response['teamplates_desc']        = $value->greeting_description;
       

            $this->api_return(array('status' =>true,'message' => 'Teamplates data found !','data'=>$response),self::HTTP_OK);
        }
    }
    
    public function get_teamplates_by_subcat_id(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $post          = json_decode(file_get_contents('php://input'));
        if(empty($post->subcategory_id) || !isset($post->subcategory_id)):
            $this->api_return(array('status' =>false,'message' => 'Subcategory Id is Empty!'),self::HTTP_OK);exit;
        endif;
        $subcategory_id  = $post->subcategory_id;
        //single customer contact records  
        $data = $this->Category->_get_teamplates_by_subcat_id($subcategory_id);
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Teamplates data not found !'),self::HTTP_OK);exit;
        }
        if($data->num_rows() > 0){
        $value  =  $data->row();
           $greeting_tag_id = !empty($value->greeting_tag_id) ? json_decode($value->greeting_tag_id) : array();
           $greeting_array = array();
            foreach($greeting_tag_id as $grkey => $grvalue):
                $greeting = $this->Base_model->_single_data_query(array('tag_id'=>$grvalue),'ci_tags')->row()->tag_name;
                array_push($greeting_array,['id'=>$grvalue,'name'=>$greeting]);
            endforeach;
            $value->greeting_tag_id             = $greeting_array;
            $response['teamplates_id']          = $value->greeting_id;
            $response['subcategory_name']       = $value->subcategory_name;
            $response['category_name']          = $value->category_name;
            $response['teamplates_image']       = $value->teamplates_image;
            $response['teamplates_tagname']     = $value->greeting_tag_id;
            $response['teamplates_created_at']  = $value->greeting_create_at;
            $response['teamplates_status']      = $value->greeting_status;
            $response['no_of_image']            = $value->no_of_image;
            $response['image_position1']        = $value->image_position1;
            $response['image_position2']        = $value->image_position2;
            $response['teamplates_name']        = $value->greeting_name;
            $response['teamplates_desc']        = $value->greeting_description;

            $this->api_return(array('status' =>true,'message' => 'Teamplates data found !','data'=>$response),self::HTTP_OK);
        }
    }
    
    public function subcat($sub_cat_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        if(empty($sub_cat_id) || !is_numeric($sub_cat_id)){
            $this->api_return(array('status' =>false,'error' => 'Sub category ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        //single customer contact records  
        $data = $this->Base_model->_run_query("select greeting_id,concat('".base_url($this->data['greetings'])."',greeting_image) as greeting_image,ci_categories.cat_name,cat_id from ci_greeting left join ci_categories on ci_categories.cat_id = ci_greeting.greeting_sub_cat_id where ci_greeting.greeting_status='1' and ci_greeting.greeting_sub_cat_id='".$sub_cat_id."' and ci_categories.cat_status='1' order by ci_greeting.greeting_id desc");
        
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'error' => 'Greeting data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'error' => '','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    public function cat($cat_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        if(empty($cat_id) || !is_numeric($cat_id)){
            $this->api_return(array('status' =>false,'error' => 'Category ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $check = $this->Base_model->_single_data_query(array('cat_status'=>'1','cat_level'=>'2','cat_parents'=>$cat_id),'ci_categories','GROUP_CONCAT(cat_id SEPARATOR ",") as cat_id');
        /*print_r($this->db->last_query());exit;*/
        if($check->num_rows() <= 0 || empty(@$check->row()->cat_id)){
            $this->api_return(array('status' =>false,'error' => 'Greeting Category not found !'),self::HTTP_OK);exit;
        }
        $sub_cat_id = @$check->row()->cat_id;
        //single customer contact records  
        $data = $this->Base_model->_run_query("select greeting_id,concat('".base_url($this->data['greetings'])."',greeting_image) as greeting_image,ci_categories.cat_name,cat_id from ci_greeting left join ci_categories on ci_categories.cat_id = ci_greeting.greeting_sub_cat_id where ci_greeting.greeting_status='1' and ci_greeting.greeting_sub_cat_id in(".$sub_cat_id.") and ci_categories.cat_status='1' order by ci_greeting.greeting_id desc");
        
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'error' => 'Greeting data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'error' => '','data'=>$data->result()),self::HTTP_OK);
        }
    }
}