<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Facebook/autoload.php'; 

class Instagram {
	/**
	 * Constructor
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public $fb = '';

	public $app_id     = '';
	
	public $app_secret = '';
	
	public function __construct($config = array()){
		empty($config) OR $this->initialize($config, FALSE);

		$this->_CI =& get_instance();
		log_message('info', 'Facebooks Class Initialized');
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

	public function instagram_login_for_user_access_tokens($redirect_url = null){
        return "https://api.instagram.com/oauth/authorize?client_id=".$this->app_id."&redirect_uri=".$redirect_url."&scope=
        basic&response_type=code";
    }
}