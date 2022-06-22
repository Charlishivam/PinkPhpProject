<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php'; 

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterClass {
	/**
	 * Constructor
	 *
	 * @param	array	$config
	 * @return	void
	 */

	public $consumer_key     = '';
	
	public $consumer_secret = '';
	
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
	 function initialize(array $config = array(), $reset = TRUE){
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
    
    function login_for_user_url($redirect_url = null){
		$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
		
		$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' =>$redirect_url));
	    $url = $connection->url('oauth/authorize', array('oauth_token' =>$request_token['oauth_token']));
		return $url;
    }
    
    function verification_user_tokens($request){
		$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret,$request['oauth_token'],$request['oauth_verifier']);
        $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" =>$request['oauth_verifier']]);
        return $access_token;
    }
    
    function verification_credentials_and_get_detaisl($access_token){
        $connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
        $profile = $connection->get("account/verify_credentials",['include_email' => 'true']);
        $response = $connection->get('users', ['ids' =>""]);
        return $response;
    }
	
	function tweet_post($schedule_file_path,$social_access_token,$social_token_secret){
        $connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret,$social_access_token,$social_token_secret);
        $media = $connection->upload('media/upload', array('media' =>$schedule_file_path));
        $parameters = array(
            //'status' => 'Your Tweet status',
            'media_ids' => $media->media_id_string);
        $send_tweet = $connection->post('statuses/update', $parameters);
        if ($connection->getLastHttpCode() == 200) {
           return $send_tweet; 
        }else{
           return $send_tweet;
        }
    }
}