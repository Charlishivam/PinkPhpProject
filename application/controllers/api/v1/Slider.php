<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/api-libraries/API_Controller.php'; // for load rest controller
class Slider extends API_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function index(){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $data = $this->Base_model->_all_data_optional_condetion('slider_id,concat("'.base_url($this->data['sliderpath']).'",slider_image) as slider_image','ci_slider',array('status'=>'1','slider_type'=>'1'),'slider_position desc');
        
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Slider data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'message' => 'Slider data found !','data'=>$data->result()),self::HTTP_OK);
        }
    }
    
        public function banner(){
        $this->_apiConfig([
            'methods' => ['GET'],
            //'key' => ['header',$this->config->item('api_fixe_header_key')],
        ]);
        
        $data = $this->Base_model->_all_data_optional_condetion('slider_id,concat("'.base_url($this->data['sliderpath']).'",slider_image) as slider_image','ci_slider',array('status'=>'1','slider_type'=>'2'),'slider_position desc');
        
        if($data->num_rows() <= 0){
            $this->api_return(array('status' =>false,'message' => 'Banner data not found !'),self::HTTP_OK);exit;
        }
        
        if($data->num_rows() > 0){
            $this->api_return(array('status' =>true,'message' => 'Banner data found !','data'=>$data->result()),self::HTTP_OK);
        }
    }
}