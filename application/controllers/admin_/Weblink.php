<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Weblink extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/WeblinkModel','WeblinkModel');
		$this->load->model('Base_model');
		$this->data['dropdata'] = $this->Base_model->_dropdownlist('cat_id', 'cat_name', array('cat_status'=>'1'), 'ci_categories','Select Category','');
        $this->data['users'] = $this->Base_model->_dropdownlist('customer_id', 'customer_name', array('customer_status'=>'1'), 'ci_customer','Select User','');
    }
    
    public function index(){
        $this->data['records'] = $this->WeblinkModel->_get_weblink_data();
        $this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/index-page',$this->data);
		$this->load->view('admin/includes/_footer');
    }
    
    public function create(){
        
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
		if ($this->form_validation->run() == true) {
		   
		    /*===========================================================*/
		    $data['mobiles']['mobile_1']= $this->input->post('mobile_1');
            $data['mobiles']['mobile_2']= $this->input->post('mobile_2');
            $data['mobiles']['mobile_3']= $this->input->post('mobile_3');
            /*==========================================================*/
            $data['social']['facebook'] = $this->input->post('facebook');
            $data['social']['twitter']  = $this->input->post('twitter');
            $data['social']['linkedin'] = $this->input->post('linkedin');
            $data['social']['youtube']  = $this->input->post('youtube');
            $data['social']['instagram']= $this->input->post('instagram');
            $data['social']['pinterest']= $this->input->post('pinterest');
                
            $data['status']['update_by_org']   = '';
            $data['status']['date']            = date("Y-m-d H:i:s");
            $data['status']['status']          = '';
            $data['status']['update_by_user']  = '';
            $data['status']['remark']          = 'Created';
            
            $i = 0;
            foreach($this->input->post('ads') as $key => $values){
                if($key > 0){
                    $data['pages'][$i]['name']        = $values['pagename'];
                    $data['pages'][$i]['description'] = $values['pagedescription'];
                    $i++;
                }
                
            }
            
            $save['weblink_cat_id']           = $this->input->post('category');
		    $save['weblink_template_id']      = $this->input->post('template');
		    
		    $save['weblink_title']            = $this->input->post('title');
		    $save['weblink_description']      = $this->input->post('description');
		    $save['weblink_customer_id']      = $this->input->post('username');
		    $save['weblink_meta_title']       = $this->input->post('meta_title');
		    $save['weblink_meta_keywords']    = $this->input->post('meta_keywords');
		    $save['weblink_meta_description'] = $this->input->post('meta_description');
		    $save['weblink_create_at']        = date('Y-m-d H:i:s');
		    $save['weblink_status_histroy']   = json_encode(array($data['status']));
		    $save['weblink_pages']            = json_encode($data['pages']);
		    $save['weblink_mobiles']          = json_encode($data['mobiles']);
		    $save['weblink_socials']          = json_encode($data['social']);
		    
            if($this->Base_model->_inser_query('ci_customer_weblink',$save)){
              $this->session->set_flashdata('success','Weblink has been Successfully created.');	
		       redirect('admin/weblink');   
            }else{
                $this->session->set_flashdata('error','Some have server error !.');	
		        redirect('admin/weblink'); 
            }
            print_r($this->db->last_query());exit;
        }
        
        $this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/weblink-create-page',$this->data);
		$this->load->view('admin/includes/_footer');
    }
    
    public function update(){
        $this->data['single'] = $this->Base_model->_single_data_query(array('weblink_id'=>$this->uri->segment(4)),'ci_customer_weblink')->row();
        
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
		if ($this->form_validation->run() == true) {
		    /*===========================================================*/
		    $data['mobiles']['mobile_1']= $this->input->post('mobile_1');
            $data['mobiles']['mobile_2']= $this->input->post('mobile_2');
            $data['mobiles']['mobile_3']= $this->input->post('mobile_3');
            /*==========================================================*/
            $data['social']['facebook'] = $this->input->post('facebook');
            $data['social']['twitter']  = $this->input->post('twitter');
            $data['social']['linkedin'] = $this->input->post('linkedin');
            $data['social']['youtube']  = $this->input->post('youtube');
            $data['social']['instagram']= $this->input->post('instagram');
            $data['social']['pinterest']= $this->input->post('pinterest');
                
            $data['status']['update_by_org']   = '';
            $data['status']['date']            = date("Y-m-d H:i:s");
            $data['status']['status']          = '';
            $data['status']['update_by_user']  = '';
            $data['status']['remark']          = 'Updated';
            
            $pagename        = $this->input->post('pagename');
            $pagedescription = $this->input->post('pagedescription');
            for($i=0; $i < count($pagename); $i++){
                $data['pages'][$i]['name']        = $pagename[$i];
                $data['pages'][$i]['description'] = $pagedescription[$i];
            }
            
            foreach($this->input->post('ads') as $key => $values){
                if($key > 0){
                    $data['pages'][$i]['name']        = $values['pagename'];
                    $data['pages'][$i]['description'] = $values['pagedescription'];
                    $i++;
                }
                
            }
            
            $save['weblink_cat_id']           = $this->input->post('category');
		    $save['weblink_template_id']      = $this->input->post('template');
		    
		    $save['weblink_title']            = $this->input->post('title');
		    $save['weblink_description']      = $this->input->post('description');
		    $save['weblink_customer_id']      = $this->input->post('username');
		    $save['weblink_meta_title']       = $this->input->post('meta_title');
		    $save['weblink_meta_keywords']    = $this->input->post('meta_keywords');
		    $save['weblink_meta_description'] = $this->input->post('meta_description');
		    $save['weblink_update_at']        = date('Y-m-d H:i:s');
		    $save['weblink_status_histroy']   = json_encode(array($data['status']));
		    $save['weblink_pages']            = json_encode($data['pages']);
		    $save['weblink_mobiles']          = json_encode($data['mobiles']);
		    $save['weblink_socials']          = json_encode($data['social']);
		    
		    if($this->Base_model->_update_query('ci_customer_weblink',$save,array('weblink_id'=>$this->uri->segment(4)))) {
              $this->session->set_flashdata('success', 'Weblink have been successfully updated !');
            }else{
                $this->session->set_flashdata('error', 'Some have error ! please try again ');
            }
            redirect('admin/weblink');
		    
		}
        $this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/weblink-update-page',$this->data);
		$this->load->view('admin/includes/_footer'); 
    }
}