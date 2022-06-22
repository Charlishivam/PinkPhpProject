<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsaap extends MY_Home_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('front-end/BaseModel', 'BaseModel');
        $this->load->model('front-end/SocialUserModel', 'SocialUserModel');
        $this->load->model('Base_model', 'Base_model');
        $this->load->model('Home_model', 'Home_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->data['userid'] = $this->session->userdata('customer_id');
    }
    
    public function dashboard(){
        $this->load->view('front-end/whatsaap-page', $this->data);
    }
}