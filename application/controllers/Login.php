
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Home_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('front-end/BaseModel', 'BaseModel');
        $this->load->library('form_validation');
    }
    
    public function index(){
       $this->form_validation->set_rules('mobile', 'Customer mobile ', 'required|trim|min_length[10]|max_length[10]|is_numeric');
       if ($this->form_validation->run() == true){
          $mobile = $this->input->post('mobile');
            $checkauth = $this->BaseModel->_ci_data_query(array('customer_mobile' => $mobile), 'ci_customer','*');
            if (@$checkauth->num_rows() <= 0) {
                $this->session->set_flashdata('error', 'This number is not registered first register then login !');
                redirect('Login');
            }
            $checkstatus  = $checkauth->row();
            if($checkstatus->customer_status == '0'):
                $this->session->set_flashdata('error', 'Your status has been deactivated so please contact the admin!');
                redirect('Login');
            endif;
            /*========================Otp for sms======================*/
            $template_customer = $this->BaseModel->get_template_by_slug("otp");

            if (!empty($template_customer)) {
                $variables['#OTP'] = '1234';
                $variables['#message_key'] = "pink7.thedigitalkranti.com";
                $smscontentotp = str_replace(array_keys($variables), array_values($variables), $template_customer['content']);
                $this->_send_sms($mobile, $smscontentotp, $template_customer['template_id']);
                $otp_sent = 1;
                if ($this->BaseModel->_update_query('ci_customer', array('customer_otp' => $variables['#OTP']), array('customer_mobile' => $mobile))) {
                     $this->session->set_flashdata('success', 'One time password have been sent your registered mobile number !');
                     $this->session->set_userdata(array('customer_id' => $checkauth->row()->customer_id));
 
                    redirect("Login/otp");
                } else {
                    $this->session->set_flashdata('error', 'Oops! Something went wrong ! Help us improve your experience by sending an error report  !');
                    redirect('Login');
                }
            }
        }
        
        	$this->load->view('front-end/login-page');
    }
    
    public function otp() {
        $this->data['userid'] = $this->session->userdata('customer_id');
        if (empty($this->data['userid'])):
            redirect('login');
        endif;
        $postotp1 = $this->input->post('otp1');
        $postotp2 = $this->input->post('otp2');
        $postotp3 = $this->input->post('otp3');
        $postotp4 = $this->input->post('otp4');
        if (!empty($postotp1)) {
            $postotp = $postotp1 .$postotp2 .$postotp3 .$postotp4;
            $checkauth = $this->BaseModel->_ci_data_query(array('customer_otp' => $postotp,'customer_id'=>$this->data['userid']), 'ci_customer', '*');
            if ($checkauth->num_rows() > 0) {
                $data['customer_id'] = $checkauth->row()->customer_id;
                $this->session->set_userdata($data);
                $this->session->set_userdata(array('customer_id' => $checkauth->row()->customer_id));
                
                $dataupdate['customer_status']   = '1';
                $dataupdate['customer_is_verified']   = '1';
                
                $this->Base_model->_update_query('ci_customer',$dataupdate,array('customer_id'=>$data['customer_id']));
                
                $checkmembership = $this->BaseModel->_ci_data_query(array('tpm_user_id' => $data['customer_id']), 'ci_purchase_membership','*');
                if (@$checkmembership->num_rows() <= 0) {
                    
                    redirect('home/pricingpage');
                }
                redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('error', 'This OTP is incorrect please enter correct OTP !');
            }
            redirect('login/otp');
        }
        $this->load->view('front-end/otp-page');
    }
    
    public function resendotp(){
        
        /*========================Otp for sms======================*/
        $template_customer = $this->BaseModel->get_template_by_slug("otp");

        if (!empty($template_customer)) {
            $variables['#OTP'] = rand(1111, 9999);
            $variables['#message_key'] = "";
            $smscontentotp = str_replace(array_keys($variables), array_values($variables), $template_customer['content']);

            $this->_send_sms($mobile, $smscontentotp, $template_customer['template_id']);

            $otp_sent = 1;
            if ($this->BaseModel->_update_query('ci_customer', array('customer_otp' => $variables['#OTP']), array('customer_mobile' => $mobile))) {
                $this->session->set_flashdata('success', 'One time password have been sent your registered mobile number !');
                redirect("Login/otp");
            } else {
                $this->session->set_flashdata('error', 'Oops! Something went wrong ! Help us improve your experience by sending an error report  !');
            }
        }
        
        
     $this->load->view('front-end/dashbord-page');   
    }
    
    

        
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
}