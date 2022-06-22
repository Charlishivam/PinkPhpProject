<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// -----------------------------------------------------------------------------
    //check auth user 
    if (!function_exists('user_auth_check')) {
        function user_auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('customer_id'))
            {
                redirect('login', 'refresh');
            }
            
        }
    }
    
    // -----------------------------------------------------------------------------
    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('admin_id'))
            {
                redirect('admin/auth/login', 'refresh');
                
            }
            
        }
    }
    
    // -----------------------------------------------------------------------------
    //check auth session
    if (!function_exists('auth_login_cheack')) {
        function auth_login_cheack()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('admin_id'))
            {
                redirect('Home', 'refresh');
            }
        }
    }
    
    //check auth session
    if (!function_exists('user_detail')) {
        function user_detail()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if($ci->session->has_userdata('customer_id'))
            {
                $ci->load->model('Base_model');
                $customer_id = $ci->session->userdata('customer_id');
                $result = $ci->Base_model->_single_data_query(array('customer_id' => $customer_id), 'ci_customer')->row();
                return $result;
                
            }
        }
    }
    
    


    // -----------------------------------------------------------------------------
    // Get General Setting
    if (!function_exists('get_general_settings')) {
        function get_general_settings()
        {
            $ci =& get_instance();
            $ci->load->model('admin/setting_model');
            return $ci->setting_model->get_general_settings();
        }
    }

    // -----------------------------------------------------------------------------
    //get recaptcha
    if (!function_exists('generate_recaptcha')) {
        function generate_recaptcha()
        {
            $ci =& get_instance();
            if ($ci->recaptcha_status) {
                $ci->load->library('recaptcha');
                echo '<div class="form-group mt-2">';
                echo $ci->recaptcha->getWidget();
                echo $ci->recaptcha->getScriptTag();
                echo ' </div>';
            }
        }
    }

    // ----------------------------------------------------------------------------
    //print old form data
    if (!function_exists('old')) {
        function old($field)
        {
            $ci =& get_instance();
            return html_escape($ci->session->flashdata('form_data')[$field]);
        }
    }

    // --------------------------------------------------------------------------------
    if (!function_exists('date_time')) {
        function date_time($datetime) 
        {
           return date('F j, Y',strtotime($datetime));
        }
    }

    // --------------------------------------------------------------------------------
    // limit the no of characters
    if (!function_exists('text_limit')) {
        function text_limit($x, $length)
        {
          if(strlen($x)<=$length)
          {
            echo $x;
          }
          else
          {
            $y=substr($x,0,$length) . '...';
            echo $y;
          }
        }
    }

?>