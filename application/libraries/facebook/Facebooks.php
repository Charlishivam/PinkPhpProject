<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Facebook/autoload.php'; 

class Facebooks {
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

	public function login_for_user_access_tokens($redirect_url = null){
		$fb = new Facebook\Facebook([
        		'app_id' => $this->app_id, 
        		'app_secret' => $this->app_secret,
        		'default_graph_version' => 'v13.0',
        		'fileUpload'	=>TRUE
        	]);
        $helper = $fb->getRedirectLoginHelper();
        $redirect_url=rtrim($redirect_url,'/');
        
		$permissions = ['email','pages_manage_posts','pages_manage_metadata','pages_show_list','pages_messaging','public_profile'];
		
		array_push($permissions, 'instagram_basic','instagram_manage_comments','instagram_manage_insights','instagram_content_publish','instagram_manage_messages');
		
		$loginUrl = $helper->getLoginUrl($redirect_url, $permissions);
		
        return $loginUrl;
    }

    public function login_callback($redirect_url="")
	{   
	    $fb = new Facebook\Facebook([
        		'app_id' => $this->app_id, 
        		'app_secret' => $this->app_secret,
        		'default_graph_version' => 'v13.0',
        		'fileUpload'	=>TRUE
        	]);
		$redirect_url=rtrim($redirect_url,'/');
		
		$helper = $fb->getRedirectLoginHelper();
		try {
			$accessToken = $helper->getAccessToken($redirect_url);
			$response = $fb->get('/me?fields=id,first_name,last_name,email,gender,locale,picture,name', $accessToken);
			$user = $response->getGraphUser()->asArray();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {

			$user['status']="0";
			$user['message']= $e->getMessage();
			return $user;

		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			$user['status']="0";
			$user['message']= $e->getMessage();
			return $user;
		}
		$access_token	= (string) $accessToken;
		$access_token = $this->create_long_lived_access_token($access_token);
		
		$user["access_token_set"]=$access_token;
		return $user;
	}
	
	public function create_long_lived_access_token($short_lived_user_token){
        
		$app_id      = $this->app_id;
		$app_secret  = $this->app_secret;
		$short_token = $short_lived_user_token;

		$url="https://graph.facebook.com/v13.0/oauth/access_token?grant_type=fb_exchange_token&client_id={$app_id}&client_secret={$app_secret}&fb_exchange_token={$short_token}";

		$headers = array("Content-type: application/json");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

		$st=curl_exec($ch); 
		$result=json_decode($st,TRUE);

		$access_token=isset($result["access_token"]) ? $result["access_token"] : "";

		return $access_token;
	}
	
	public function get_page_list($access_token=""){
	    $fb = new Facebook\Facebook([
        		'app_id' => $this->app_id, 
        		'app_secret' => $this->app_secret,
        		'default_graph_version' => 'v13.0',
        		'fileUpload'	=>TRUE
        	]);
		$error=false;	
		try {
			$request = $fb->get('/me/accounts?fields=cover,emails,picture,id,name,url,username,access_token&limit=400',$access_token);	
			$response = $request->getGraphList()->asArray();
			return $response;
		} catch(Facebook\Exceptions\FacebookResponseException $e) {

			$error=true;

		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			$error=true;
		}
		if($error)
		{
			try {
				$request = $fb->get('/me/accounts?fields=cover,emails,picture,id,name,url,username,access_token&limit=400', $access_token);	
				$response = $request->getGraphList()->asArray();
				return $response;
			}
			catch(Facebook\Exceptions\FacebookResponseException $e) {
				$response['error']='1';
				$response['message']= $e->getMessage();
				return $response; 
			}
			catch(Facebook\Exceptions\FacebookSDKException $e) {
				$response['error']='1';
				$response['message']= $e->getMessage();
				return $response; 
			}
		}
		print_r($response);exit;
	}
	
	public function post_publish($post_data,$access_token,$pageId){
	    $fb = new Facebook\Facebook([
    		'app_id' => $this->app_id, 
    		'app_secret' => $this->app_secret,
    		'default_graph_version' => 'v13.0',
    		'fileUpload'	=>TRUE
    	]);
    	   
        try{
            $fb->setDefaultAccessToken($access_token);
            // Post to Facebook
            $fb->sendRequest('POST',$pageId."/photos",$post_data);
            return true;
        }catch(FacebookResponseException $e){
            return false;
        }catch(FacebookSDKException $e){
            return false;
        }
	}
	
	public function instagram_login_for_user_access_tokens($redirect_url = null){
        return "#";
    }
}