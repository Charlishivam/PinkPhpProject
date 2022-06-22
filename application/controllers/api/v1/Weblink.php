<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Weblink extends API_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function opration(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->weblink_cat_id) || !isset($post->weblink_cat_id)){
            $this->api_return(array('status' =>false,'error' => 'Weblink category ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->weblink_template_id) || !isset($post->weblink_template_id)){
            $this->api_return(array('status' =>false,'error' => 'Weblink Template ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        if(empty($post->customer_id) || !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'error' => 'User ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->weblink_title) || !isset($post->weblink_title)){
            $this->api_return(array('status' =>false,'error' => 'Weblink Title is empty Or missing !'),self::HTTP_OK);exit;
        }
        if(empty($post->weblink_description) || !isset($post->weblink_description)){
            $this->api_return(array('status' =>false,'error' => 'Weblink Description is empty Or missing !'),self::HTTP_OK);exit;
        }
        $customerid = $post->customer_id;
        $weblink['weblink_customer_id']     = $customerid;
        $weblink['weblink_title']           = $post->weblink_title;
        $weblink['weblink_cat_id']          = $post->weblink_cat_id;
        $weblink['weblink_template_id']     = $post->weblink_template_id;
        $weblink['weblink_description']     = $post->weblink_description;
        
        $checkweblink = $this->Base_model->_single_data_query(array('weblink_customer_id'=>$customerid),'ci_customer_weblink','*');
        $single       = $checkweblink->row();
        if(!empty($post->weblink_pages) && isset($post->weblink_pages) && is_array($post->weblink_pages)){
            $weblink['weblink_pages']       = json_encode($post->weblink_pages);
        }
        if(!empty($post->weblink_logo) && isset($post->weblink_logo)){
            $path = $this->data['weblinkdoc'];
            $logo = $post->weblink_logo;
            $logo = $this->_upload_Base64_image($post->weblink_logo,$path);
            $weblink['weblink_logo']            = $path.$logo;
        }
        
        if(!empty($post->weblink_gallery) && isset($post->weblink_gallery)){
            $path           = $this->data['weblinkdoc'];
            $gallery        = $post->weblink_gallery;
            $galleryarray   = array();
            foreach($gallery as $key => $data){
                $file = $this->_upload_Base64_image($data,$path);
                array_push($galleryarray,array('gallry_url'=>$path.$file,'gallry_name'=>$file));
            }
            $weblink['weblink_gallery']            = json_encode($galleryarray);
        }
        
        if(!empty($post->weblink_banners) && isset($post->weblink_banners)){
            $path           = $this->data['weblinkdoc'];
            $banners        = $post->weblink_banners;
            $bannersarray   = array();
            foreach($banners as $key => $data){
                $file = $this->_upload_Base64_image($data,$path);
                array_push($bannersarray,array('banner_url'=>$path.$file,'banner_name'=>$file));
            }
            $weblink['weblink_banners']            = json_encode($bannersarray);
        }
        
        
        if(!empty($post->weblink_socials) && isset($post->weblink_socials)){
            $weblink['weblink_socials']       = json_encode($post->weblink_socials);
        }
        if(!empty($post->weblink_mobiles) && isset($post->weblink_mobiles)){
            $weblink['weblink_mobiles']       = json_encode($post->weblink_mobiles);
        }
        
        if($checkweblink->num_rows() <= 0 ){
            // for create new weblink 
            $this->Base_model->_inser_query('ci_customer_weblink',$weblink);
            $this->api_return(array('status' =>true,'error' => 'Weblink Successfully Created  !'),self::HTTP_OK);exit;
        }else if($checkweblink->num_rows() > 0){
            //for update this weblink
            $this->Base_model->_update_query('ci_customer_weblink',$weblink,array('weblink_customer_id'=>$customerid));
            $this->api_return(array('status' =>true,'error' => 'Weblink Successfully Updated !'),self::HTTP_OK);exit;
        }
        
        $this->api_return(array('status' =>false,'error' => 'Some parameter is missing please check and try again !'),self::HTTP_OK);exit;
    }
    
    public function category(){
        $this->_apiConfig([
            'methods' => ['POST'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $categorydata = $this->Base_model->_single_data_query(array('cat_status'=>'1'),'ci_weblink_categories','cat_id,cat_name,concat("'.base_url("/uploads/category/").'",cat_image) as cat_image');
        if($categorydata->num_rows() <= 0){
             $this->api_return(array('status' =>false,'error' => 'Data not found !'),self::HTTP_OK);exit;
        }
        
        $this->api_return(array('status' =>true,'error' => 'Data found !','data'=>$categorydata->result()),self::HTTP_OK);exit;
    }
    
    public function details(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->customer_id) || !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'error' => 'User ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        $customerid   = $post->customer_id;
        $checkweblink = $this->Base_model->_single_data_query(array('weblink_customer_id'=>$customerid),'ci_customer_weblink','*');
        
        $is_exist = 0;
        
        if($checkweblink->num_rows() > 0){
            $single = $checkweblink->row();
            
            $single->weblink_socials = json_decode($single->weblink_socials);
            
            $single->weblink_gallery = json_decode($single->weblink_gallery);
            foreach($single->weblink_gallery as $key => $gal){
                $single->weblink_gallery[$key]->gallry_url = base_url($gal->gallry_url);
            }
            
            $single->weblink_mobiles = json_decode($single->weblink_mobiles);
            $is_exist = 1;
            $this->api_return(array('status' =>true,'error' => 'Data found !','is_exist'=>$is_exist,'data'=>''),self::HTTP_OK);exit;
            //$this->api_return(array('status' =>false,'error' => 'Data found !','is_exist'=>$is_exist,'data'=>$single),self::HTTP_OK);exit;
        }else{
            $this->api_return(array('status' =>true,'error' => 'Data found !','is_exist'=>$is_exist),self::HTTP_OK);exit;
        }
    }
    
    public function query(){
        $this->_apiConfig([
            'methods' => ['POST'],
            'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        $post = json_decode(file_get_contents('php://input'));
        if(empty($post->customer_id) || !isset($post->customer_id)){
            $this->api_return(array('status' =>false,'error' => 'User ID is empty Or missing !'),self::HTTP_OK);exit;
        }
        
        $customerid = $post->customer_id;
        $checkquery = $this->Base_model->_single_data_query(array('enquery_customer_id'=>$customerid),'ci_customer_weblink_enquery','*');
        if($checkquery->num_rows() <= 0){
             $this->api_return(array('status' =>false,'error' => 'Data not found !'),self::HTTP_OK);exit;
        }
        $this->api_return(array('status' =>true,'error' => 'Data found !','data'=>$checkquery->result()),self::HTTP_OK);exit;
    }
    
    public function template($customer_id = null){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        if(!empty($customer_id)){
             $checkweblink = $this->Base_model->_single_data_query(array('weblink_customer_id'=>$customer_id),'ci_customer_weblink','*');
             
             $single = $checkweblink->row();
             foreach($this->data['template_api'] as $key => $data){
                 if($data['temp_id'] == $single->weblink_template_id){
                     $this->data['template_api'][$key]['temp_active'] = 1;
                 }else{
                     $this->data['template_api'][$key]['temp_active'] = 0;
                 }
             }
             $this->api_return(array('status' =>true,'error' => 'Data found !','data'=>$this->data['template_api']),self::HTTP_OK);exit;
             
             $this->api_return(array('status' =>true,'error' => 'Data found !','data'=>$this->data['template_api']),self::HTTP_OK);exit;
        }else{
             $this->api_return(array('status' =>true,'error' => 'Data found !','data'=>$this->data['template_api']),self::HTTP_OK);exit;
        }
    }
    
    
}