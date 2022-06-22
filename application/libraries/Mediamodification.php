<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mediamodification
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Cashfree
 * @author		K.K ADIL KHAN AJAD
 */
 
class Mediamodification {
    
    public $dest_dir_path = '';
	public $logo_position = '';
	public $original_file = '';
	public $original_dir_path = '';
	public $data = array();
	public $logo_path = '';
	
    public function __construct($config = array()){
		empty($config) OR $this->initialize($config, FALSE);

		$this->_CI =& get_instance();

		log_message('info', 'Casfree Class Initialized');
	}
	
	/**
	 * Initialize preferences
	 *
	 * @param	array	$config
	 * @param	bool	$reset
	 * @return	CI_Cashfree
	 */
	public function initialize(array $config = array(), $reset = TRUE){
		$reflection = new ReflectionClass($this);
        
		$defaults = $reflection->getDefaultProperties();
		foreach (array_keys($defaults) as $key){
			if ($key[0] === '_'){
				continue;
			}

			if (isset($config[$key])){
				$this->$key = $config[$key];
			}else{
				$this->$key = $defaults[$key];
			}
		}
		return $this;
	}

	public function _check_dir($path = null){
	    if (!is_dir($path) && !file_exists($path)) {
            mkdir($path, 0777, TRUE);
        }
        $this->dest_dir_path = $path;
	}
	
	public function logo_position($logo_position){
	    $this->logo_position = $logo_position;
	}
	
	public function _do_copy(){
	    $this->_check_dir($this->dest_dir_path);
	    if(copy($this->original_dir_path.$this->original_file,$this->dest_dir_path.$this->original_file)){
	        return true;
	    }
	    return false;
	}
	
	public function set_data($data = null){
	    $this->data = $data;
	    return $this->data;
	}
	public function get_data(){
	    $this->data = $this->data;
	    return $this->data;
	}
	
	public function do_modify(){
	    try {
    	    $this->_check_dir($this->dest_dir_path);
    	    if(!empty($this->original_file) && is_file($this->original_dir_path.$this->original_file)){
    	        $this->_do_copy();
    	    }
    	    
    	    $logo_position = @explode('_',$this->logo_position);
    	    $wm_vrt_alignment = !empty($logo_position[0]) ? $logo_position[0] : "middle"; 
    	    $wm_hor_alignment = !empty($logo_position[1]) ? $logo_position[1] : "center"; 
    	    $this->_CI->load->library('image_lib');
    	    
    	    $config['image_library']    = 'gd2';
            $config['source_image']     = $this->dest_dir_path.$this->original_file;
            $config['wm_type']          = 'overlay';
            $config['wm_overlay_path']  = $this->logo_path; //the overlay image
            $config['wm_opacity']       = 25;
            $config['wm_vrt_alignment'] = $wm_vrt_alignment;
            $config['wm_hor_alignment'] = $wm_hor_alignment;
            //$config['wm_padding']       = '8';
            $this->_CI->image_lib->initialize($config);
            if (!$this->_CI->image_lib->watermark()) {
                die($this->_CI->image_lib->display_errors());
                return false;
            }
            $this->_CI->image_lib->clear();
            $this->set_data(array('file_name'=>$this->original_file,'file_path'=>$this->dest_dir_path,'file_with_path'=>$this->dest_dir_path.$this->original_file));
            return true;
	    } catch (\Exception $e) {
            die($e->getMessage());
        }
	}
	
	
	
}