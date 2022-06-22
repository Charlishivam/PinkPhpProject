<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends MY_Home_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('front-end/BaseModel','BaseModel');
        $this->load->model('Base_model', 'Base_model');
        $this->load->library('form_validation');
    }
     public function add(){
        $this->form_validation->set_rules('name', 'User Name', 'required|trim');
        $this->form_validation->set_rules('mobile', 'Mobile number', 'required|trim|is_unique[ci_customer.customer_mobile]',array('is_unique'=>'This %s is alredy exists !'));
        if($this->form_validation->run() == true){

            $data['contact_name']     = $this->input->post('name');
            $data['contact_mobile']   = $this->input->post('mobile');
            $data['contact_email']    = $this->input->post('email');
            $data['contact_create_at']= date('Y-m-d H:i:s');
            
              if($lastid = $this->Base_model->_inser_query('ci_customer_contact',$data)){
               $this->session->set_flashdata('success', 'Thank you for connect pink7 !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('contact/add');
            }
          $this->load->view('front-end/contact-us-page');  

       }
}