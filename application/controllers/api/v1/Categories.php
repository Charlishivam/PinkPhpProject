<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Categories extends API_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function category($id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
      
            //all details
            $data = $this->Category->_all_categories_first_level();
            if($data->num_rows() <= 0){
                $this->api_return(array('status' =>false,'message' => 'Category data not found !'),self::HTTP_OK);exit;
            }
            
            if($data->num_rows() > 0){
                $this->api_return(array('status' =>true,'message' => 'Category data found','data'=>$data->result()),self::HTTP_OK);
            }
       
    }
    
    public function single_category($id = null){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $post          = json_decode(file_get_contents('php://input'));
        if(empty($post->category_id) || !isset($post->category_id)):
            $this->api_return(array('status' =>false,'message' => 'Category Id is Empty!'),self::HTTP_OK);exit;
        endif;
        
        $id  = $post->category_id;
        
        $data = $this->Category->_categories_first_get_by_id($id);
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Category data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'message' => 'Category data found','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    public function subcategory($cat_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
           // 'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
            //all details
            $data = $this->Category->_all_categories_second_level();
            if($data->num_rows() <= 0){
                $this->api_return(array('status' =>false,'message' => 'Sub Category data not found !'),self::HTTP_OK);exit;
            }
            
            if($data->num_rows() > 0){
                $this->api_return(array('status' =>true,'message' => 'Sub Category data found !','data'=>$data->result()),self::HTTP_OK);
            }
    }
    
    
    public function single_subcategory($id = null){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $post          = json_decode(file_get_contents('php://input'));
        if(empty($post->subcategory_id) || !isset($post->subcategory_id)):
            $this->api_return(array('status' =>false,'message' => 'Subcategory Id is Empty!'),self::HTTP_OK);exit;
        endif;
        
        $id  = $post->subcategory_id;
        $data = $this->Category->_categories_second_get_by_id($id);
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Subcategory data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'message' => 'Subcategory data found','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
    public function subcategory_by_category_id($id = null){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $post          = json_decode(file_get_contents('php://input'));
        if(empty($post->category_id) || !isset($post->category_id)):
            $this->api_return(array('status' =>false,'message' => 'Category Id is Empty!'),self::HTTP_OK);exit;
        endif;
        
        $id   = $post->category_id;
        $data = $this->Category->_get_subcategory_by_category_id($id);
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Subcategory data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'message' => 'Subcategory data found','data'=>$data->result()),self::HTTP_OK);
        }
    }

}