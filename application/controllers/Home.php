<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/mailjet/vendor/autoload.php';
use \Mailjet\Resources;

class Home extends MY_Home_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('functions_helper');  
        $this->load->model('Home_model');
        $this->load->library('session');
        $this->data['userid'] = $this->session->userdata('customer_id');
    }
    
    public function index(){
        $this->data['event_data']          =  $this->Base_model->_single_data_query(array('upcomming_events_status'=>'1'),'ci_upcomming_events','*')->result(); 
        $this->data['client_data']         =  $this->Base_model->_single_data_query(array('client_status'=>'1'),'ci_client','*')->result();
        $this->data['testimonial_data']    =  $this->Base_model->_single_data_query(array('testimonial_status'=>'1'),'ci_testimonial','*')->result();
        // $this->data['tag_data']         =  $this->Base_model->_single_data_query(array('status'=>'1'),'ci_tags','*')->result();
        $this->data['category_data']       =  $this->Home_model->all_category_record()->result();
		$this->data['categores']           =  $this->Home_model->_get_subcat_overall_catid();
		$this->data['greeting_data']       =  $this->Home_model->all_greeting_record()->result(); 
	    $this->data['upcoming_data']       =  $this->Home_model->all_today_record()->result();
	    
        $this->load->view('front-end/index-page',$this->data);
    }
    
    public function subcategory_page(){
        $this->load->view('front-end/subcategory-page',$this->data);
    }
    
    public function partial(){
        $cat_id     = $this->input->post('cat_id');
         $cat       =  $this->Home_model->all_greeting_record_by_category_id($cat_id);
        if(!empty($cat)):
            $this->data['greeting_data']       =  $this->Home_model->all_greeting_record_by_category_id($cat_id);
        else:
            $this->data['greeting_data']       =  array();
        endif;
        $this->load->view('front-end/partial-page',$this->data);
    }
    
    public function aboutpage() {
       
        $this->form_validation->set_rules('contact_us_name', 'Customer Name', 'required|trim');
        $this->form_validation->set_rules('contact_us_phone', 'Customer Number', 'required|trim');
        //$this->form_validation->set_rules('contact_us_email', 'Customer Number', 'required|trim');
        if ($this->form_validation->run() == true) {
          
            $data['contact_us_name']       = $this->input->post('contact_us_name');
            $data['contact_us_email']      = $this->input->post('contact_us_email');
            $data['contact_us_phone']      = $this->input->post('contact_us_phone');
            $data['contact_us_message']    = trim($this->input->post('contact_us_message'));
            $data['contact_us_created_at'] = date('Y-m-d H:i:s');
            
           if ($this->Base_model->_inser_query('ci_contact_us', $data)) {
               
               
                $this->data['contact_us_id']  = $this->db->insert_id();
                $this->data['single']    =  $this->Base_model->_single_data_query(array('contact_us_id'=>$this->data['contact_us_id']),'ci_contact_us','*')->row_array();
                
             
                $to      = 'gshivam112@gmail.com';//'deepak.singh@trustcradle.org';
                $subject = "A lead from the pink7 about us page";
                $message = $this->load->view('front-end/email-page',$this->data,true);
            
                $this->_send_email($to,$subject,$message);
                $this->session->set_flashdata('success', 'Data have been successfully save !');
                
            } else {
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('home/aboutpage');
        }
        $this->data['testimonial_data']    =  $this->Base_model->_single_data_query(array('testimonial_status'=>'1'),'ci_testimonial','*')->result();
        $this->load->view('front-end/about-page',$this->data);
    }
    

     public function pricingpage(){
     
        $this->data['subcription_package_month']    =  $this->Base_model->_single_data_query(array('ci_sp_type'=>'1'),'ci_subcription_package','*')->result();
        $this->data['subcription_package_year']     =  $this->Base_model->_single_data_query(array('ci_sp_type'=>'2'),'ci_subcription_package','*')->result();
        
        $this->load->view('front-end/pricing-page',$this->data);
    }
    
    public function servicepage(){
    
        $this->load->view('front-end/service-page',$this->data);
    }
    
    public function productpage(){
    
        $this->load->view('front-end/product-page',$this->data);
    }
     public function contactspage(){
         
        $this->form_validation->set_rules('contact_us_name', 'Customer Name', 'required|trim');
        $this->form_validation->set_rules('contact_us_phone', 'Customer Number', 'required|trim');
        if ($this->form_validation->run() == true) {
            $data['contact_us_name']       = $this->input->post('contact_us_name');
            $data['contact_us_email']      = $this->input->post('contact_us_email');
            $data['contact_us_phone']      = $this->input->post('contact_us_phone');
            $data['contact_us_message']    = trim($this->input->post('contact_us_message'));
            $data['contact_us_subject']    = trim($this->input->post('contact_us_subject'));
            $data['contact_us_created_at'] = date('Y-m-d H:i:s');
           if ($this->Base_model->_inser_query('ci_contact_us', $data)) {
                $this->data['contact_us_id']  = $this->db->insert_id();
                $this->data['single']    =  $this->Base_model->_single_data_query(array('contact_us_id'=>$this->data['contact_us_id']),'ci_contact_us','*')->row_array();
                $to      = 'gshivam112@gmail.com';//'deepak.singh@trustcradle.org';
                $subject = "A lead from the pink7 about us page";
                $message = $this->load->view('front-end/email-page',$this->data,true);
            
                $this->_send_email($to,$subject,$message);
                $this->session->set_flashdata('success', 'Data have been successfully save !');
            } else {
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('home/contactspage');
        }
        $this->load->view('front-end/contacts-page',$this->data);
    }
    public function privacy_policy(){
            $this->load->view('front-end/privacy-policy');
    }
    
    public function term_condition(){
            $this->load->view('front-end/term-condition');
    }
    
    public function _send_email($to,$subject,$message){
        
        $apikey    = '06b71296e7e6071fbfe316e5022a3930';
        $apisecret = '9a74698da38e5a64172ec506b71be6f1';
        
        $mj = new \Mailjet\Client($apikey,$apisecret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "hello@parkingmudde.com",
                        'Name' => "Me"
                    ],
                    'To' => [
                        [
                            'Email' => "gshivam112@gmail.com",
                            'Name' => "You"
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => $message
                ]
            ]
        ];
        // All resources are located in the Resources class

        $response = $mj->post(Resources::$Email, ['body' => $body]);
        
         //echo "<pre>"; print_r($response); echo "<pre>"; die();
        // Read the response
        //$response->success() && var_dump($response->getData());exit;
    }
}
