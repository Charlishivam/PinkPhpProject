<?php
class MY_Controller extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('admin/setting_model', 'setting_model');
		$this->data['template'] = array('1'=>'Template - 01','2'=>'Template - 02','3'=>'Template - 03');
        
	}

	public function _create_auto_number($_pri = null,$_old=null){
		$_pri   = !empty($_pri) ? $_pri : 'ADI';
		$_make  = '';
		$_num   = 1;
		$_part  = !empty($_old) ? explode('/',$_old) : '';
		$_uniq  = !empty($_part[1])? $_part[1] : 'A';

		
		if(!empty($_part[3]) && $_part[3] >= 1000){
			$_uniq ++;
			$_num = 1;
		}

		$_num   = !empty($_part[3]) ? (int)@$_part[3] : $_num;
		$_num   = sprintf('%04d', $_num+1);
		$_make  = $_pri.'/'.$_uniq.'/'.date('Y').'/'.$_num;
		return $_make;
	}
	
	
	function getEmbedUrl($url) {
        // function for generating an embed link
        $finalUrl = '';
    
        if (strpos($url, 'facebook.com/') !== false) {
            // Facebook Video
            $finalUrl.='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
    
        } else if(strpos($url, 'vimeo.com/') !== false) {
            // Vimeo video
            $videoId = isset(explode("vimeo.com/",$url)[1]) ? explode("vimeo.com/",$url)[1] : null;
            if (strpos($videoId, '&') !== false){
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://player.vimeo.com/video/'.$videoId;
    
        } else if (strpos($url, 'youtube.com/') !== false) {
            // Youtube video
            $videoId = isset(explode("v=",$url)[1]) ? explode("v=",$url)[1] : null;
            if (strpos($videoId, '&') !== false){
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://www.youtube.com/embed/'.$videoId;
    
        } else if(strpos($url, 'youtu.be/') !== false) {
            // Youtube  video
            $videoId = isset(explode("youtu.be/",$url)[1]) ? explode("youtu.be/",$url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://www.youtube.com/embed/'.$videoId;
    
        } else if (strpos($url, 'dailymotion.com/') !== false) {
            // Dailymotion Video
            $videoId = isset(explode("dailymotion.com/",$url)[1]) ? explode("dailymotion.com/",$url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://www.dailymotion.com/embed/'.$videoId;
    
        } else{
            $finalUrl.=$url;
        }
    
        return $finalUrl;
    }
}

class MY_Home_Controller extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('admin/setting_model', 'setting_model');
		$this->load->model('api-v1/Base_model');
		$this->theme  = 'template/theme_default';
        $this->assets = 'template/theme_default/';
        
        $this->data['template'] = array('1'=>'Template - 01','2'=>'Template - 02','3'=>'Template - 03');
        
        // $this->data['config']['app_id'] = "543743003909704";
        // $this->data['config']['app_secret'] = "100693e6627e3cc581fbf6058f50cd8d";
        
        // $this->data['config']['app_id'] = "1005098690165381";
        // $this->data['config']['app_secret'] = "a938e72416de1888a5ec922f1ef55288";
        
        $this->data['config']['app_id'] = "589386825837245";
        $this->data['config']['app_secret'] = "f008b1ddf6794135b7aacf8de09be7e5";  
        
        $this->data['config']['tw_key'] = "Pk7tKAN1za6augJqpfL2Y6jE9";
        $this->data['config']['tw_secret'] = "K9Fq1lW7z1gC81tOykJAEtEbXzkiWyok9pCKHSkLpzN0F5DdUL";  
        
        
        $this->data['config']['ins_app_id'] = "326194396367310";
        $this->data['config']['ins_app_secret'] = "d3c8e3927bf88c183bfdc7d849e19842";  
        
	}
	
	public function _send_sms($mobile,$message,$tmpid = null,$unicode = null){
      //Your authentication key
      $authKey = "4ae2c029edbb60021d673a961d9159b6";
      //Multiple mobiles numbers separated by comma
      $mobileNumber =$mobile;
      //Sender ID,While using route4 sender id should be 6 characters long.
      $senderId = "DKRNTI";
      //Your message to send, Add URL encoding here.
      $message = urlencode($message);
      //Define route 
      $route = "4";
      //Prepare you post parameters
      $postData = array(
          'authkey'     => $authKey,
          'mobiles'     => $mobileNumber,
          'message'     => $message,
          'sender'      => $senderId,
          'route'       => $route,
          'DLT_TE_ID'   =>$tmpid
      );
      //API URL
      $url="https://smsapi.thedigitalkranti.com/api/v1/sms/send";

      // init the resource
      $ch = curl_init();
      curl_setopt_array($ch, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => $postData
      ));
      //Ignore SSL certificate verification
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      //get response
      $output = curl_exec($ch);
      curl_close($ch);
      return $output ;
    }



}

class MY_Api_Controller extends CI_Controller{

	function __construct(){
		parent::__construct();
		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
		$this->load->model('admin/setting_model', 'setting_model');
		$this->load->model('api-v1/Base_model');
		$this->load->model('api-v1/UserModel');
		$this->load->model('api-v1/PaymentLog');
		$this->load->model('api-v1/Category');
		$this->load->model('api-v1/WeblinkModel');
		$this->load->model('api-v1/SmsModel');
		$this->load->model('api-v1/MembershipPackageModel');
		
        $this->load->config('api');
        $this->data['sliderpath'] = '/uploads/slider/';
        $this->data['categories'] = '/uploads/category/';
        $this->data['customers']  = '/uploads/customer/';
        $this->data['greetings']  = '/uploads/greeting/';
        
        $this->data['weblinkpath'] = '/weblink/view/';
        $this->data['weblinkdoc']  = 'uploads/weblink/';
        
        $this->data['template'] = array('1'=>'Template - 01','2'=>'Template - 02','3'=>'Template - 03');
        
        $this->data['template_api'] = [
                array(
                    'temp_id'=>'1',
                    'temp_name' =>'Template - 01',
                    'temp_image' =>base_url('template/template_images/1.png')
                ),
                array(
                    'temp_id'=>'2',
                    'temp_name' =>'Template - 01',
                    'temp_image' =>base_url('template/template_images/1.png')
                ),
                array(
                    'temp_id'=>'3',
                    'temp_name' =>'Template - 03',
                    'temp_image' =>base_url('template/template_images/1.png')
                )
            ];
	}
    
    function _ganrate_referral($id,$pre_fix){
        $number = sprintf("%07d", $id);
        return $pre_fix.$number;
    }
    
    function _upload_Base64_image($imageData,$path){
        $imageData = 'data:image/jpeg;base64,'.$imageData;
        list($type, $imageData) = explode(';', $imageData);
        list(,$extension)       = explode('/',$type);
        list(,$imageData)       = explode(',', $imageData);
        $fileName               = uniqid().date('Y').'.'.$extension;
        $imageData              = base64_decode($imageData);
        file_put_contents($path.$fileName, $imageData);
        return $fileName;
    }
    
    public function  get_time_slots($interval, $start_time, $end_time){
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $startTime = $start->format('H:i');
        $endTime = $end->format('H:i');
        $i=0;
        $time = [];
        while(strtotime($startTime) <= strtotime($endTime)){
            $start = $startTime;
            $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
            $startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
            $i++;
            if(strtotime($startTime) <= strtotime($endTime)){
                $time[$i]['slot_start_time'] = $start;
                $time[$i]['slot_end_time'] = $end;
            }
        }
        return $time;
    }
}
