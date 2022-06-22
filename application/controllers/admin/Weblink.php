<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Weblink extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/WeblinkModel','WeblinkModel');
		$this->load->model('Base_model');
		$this->data['dropdata'] = $this->Base_model->_dropdownlist('cat_id', 'cat_name', array('cat_status'=>'1'), 'ci_weblink_categories','Select Category','');
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
        //$this->form_validation->set_rules('username', 'User Name ', 'trim|required|is_unique[ci_customer_weblink.weblink_customer_id]');
		if ($this->form_validation->run() == true) {
            foreach($this->input->post('gallery') as $key => $values){
                $_FILES['gal']['name']     = @$_FILES['gallery']['name'][$key]['gallery'];
                $_FILES['gal']['type']     = @$_FILES['gallery']['type'][$key]['gallery'];
                $_FILES['gal']['tmp_name'] = @$_FILES['gallery']['tmp_name'][$key]['gallery'];
                $_FILES['gal']['error']    = @$_FILES['gallery']['error'][$key]['gallery'];
                $_FILES['gal']['size']     = @$_FILES['gallery']['size'][$key]['gallery'];
                $config['upload_path']  = './uploads/weblink/';

                $this->Base_model->__constomdo_uploads($config['upload_path'],'gal');
                if(!empty($this->upload->data('file_name'))){
                    $data['ga'][$key]['gallry_url']       ='uploads/weblink/'.$this->upload->data('file_name') ;
                    $data['ga'][$key]['gallry_name']      =$this->upload->data('file_name');
                } 
            }
            /*========================================================*/
            /*foreach($this->input->post('banners') as $key => $values){
                $_FILES['banner']['name']     = @$_FILES['banners']['name'][$key]['banners'];
                $_FILES['banner']['type']     = @$_FILES['banners']['type'][$key]['banners'];
                $_FILES['banner']['tmp_name'] = @$_FILES['banners']['tmp_name'][$key]['banners'];
                $_FILES['banner']['error']    = @$_FILES['banners']['error'][$key]['banners'];
                $_FILES['banner']['size']     = @$_FILES['banners']['size'][$key]['banners'];
                $config['upload_path']  = './uploads/weblink/';

                $this->Base_model->__constomdo_uploads($config['upload_path'],'banner');
                if(!empty($this->upload->data('file_name'))){
                    $data['ban'][$key]['banner_url']       ='uploads/weblink/'.$this->upload->data('file_name') ;
                    $data['ban'][$key]['banner_name']      =$this->upload->data('file_name');
                } 
            }*/

            //$save['weblink_gallery']          = isset($data['ga']) ? json_encode($data['ga']) : null;
            $save['weblink_banners']          = isset($data['ban']) ? json_encode($data['ban']) : null;
		    /*===========================================================*/
		    $data['mobiles']['mobile_1']= $this->input->post('mobile_1');
            $data['mobiles']['mobile_2']= $this->input->post('mobile_2');
            $data['mobiles']['mobile_3']= $this->input->post('mobile_3');//whatsaap 
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
            
            $j = 0;
            foreach($this->input->post('videourl') as $key => $values){
                if($key > 0){
                    $data['video'][$j]['url']        = $this->getEmbedUrl($values['videourl']);
                    $j++;
                }
            }
            $save['weblink_video_url']            = isset($data['video']) ? json_encode($data['video']) : null;
            
            $this->Base_model->__constomdo_uploads('./uploads/weblink/','logo');
            if(!empty($this->upload->data('file_name'))){
                $save['weblink_logo'] ='uploads/weblink/'.$this->upload->data('file_name') ;
                
            } 
            
            $save['weblink_email']            = $this->input->post('email');
            $save['weblink_website']          = $this->input->post('website');
            $save['weblink_address']          = $this->input->post('address');
            
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
		    $save['weblink_pages']            = isset($data['pages']) ? json_encode($data['pages']) : null;
		    $save['weblink_mobiles']          = json_encode($data['mobiles']);
		    $save['weblink_socials']          = json_encode($data['social']);


            $this->data['uniq'] = $this->Base_model->_run_query("select weblink_uniq_no from ci_customer_weblink order by weblink_id desc limit 1")->row();
            $weblink   = !empty($this->data['uniq']->weblink_uniq_no) ? $this->data['uniq']->weblink_uniq_no : 'WEB/A/2021/0000';
		    $save['weblink_uniq_no']          = $this->_create_auto_number('WEB',$weblink);
            if($this->Base_model->_inser_query('ci_customer_weblink',$save)){
              $this->session->set_flashdata('success','Weblink has been Successfully created.');	
		       redirect('admin/weblink');   
            }else{
                $this->session->set_flashdata('error','Some have server error !.');	
		        redirect('admin/weblink'); 
            }
        }
        
        $this->load->view('admin/includes/_header');
		$this->load->view('admin/weblink/weblink-create-page',$this->data);
		$this->load->view('admin/includes/_footer');
    }
    
    public function update(){
        $this->data['single'] = $this->Base_model->_single_data_query(array('weblink_id'=>$this->uri->segment(4)),'ci_customer_weblink')->row();
        
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
		if ($this->form_validation->run() == true) {
            
            $oldbanner  = !empty($this->data['single']->weblink_banners)? (array)json_decode($this->data['single']->weblink_banners):null;
            $oldgallery = !empty($this->data['single']->weblink_gallery)? (array)json_decode($this->data['single']->weblink_gallery):null;
            
            /*===========================================================*/
            foreach($this->input->post('gallery') as $key => $values){
                $_FILES['gal']['name']     = @$_FILES['gallery']['name'][$key]['gallery'];
                $_FILES['gal']['type']     = @$_FILES['gallery']['type'][$key]['gallery'];
                $_FILES['gal']['tmp_name'] = @$_FILES['gallery']['tmp_name'][$key]['gallery'];
                $_FILES['gal']['error']    = @$_FILES['gallery']['error'][$key]['gallery'];
                $_FILES['gal']['size']     = @$_FILES['gallery']['size'][$key]['gallery'];
                $config['upload_path']  = './uploads/weblink/';

                $this->Base_model->__constomdo_uploads($config['upload_path'],'gal');
                if(!empty($this->upload->data('file_name'))){
                    $data['ga'][$key]['gallry_url']       ='uploads/weblink/'.$this->upload->data('file_name') ;
                    $data['ga'][$key]['gallry_name']      =$this->upload->data('file_name');
                } 
            }
            /*========================================================*/
            /*foreach($this->input->post('banners') as $key => $values){
                $_FILES['banner']['name']     = @$_FILES['banners']['name'][$key]['banners'];
                $_FILES['banner']['type']     = @$_FILES['banners']['type'][$key]['banners'];
                $_FILES['banner']['tmp_name'] = @$_FILES['banners']['tmp_name'][$key]['banners'];
                $_FILES['banner']['error']    = @$_FILES['banners']['error'][$key]['banners'];
                $_FILES['banner']['size']     = @$_FILES['banners']['size'][$key]['banners'];
                $config['upload_path']  = './uploads/weblink/';

                $this->Base_model->__constomdo_uploads($config['upload_path'],'banner');
                if(!empty($this->upload->data('file_name'))){
                    $data['ban'][$key]['banner_url']       ='uploads/weblink/'.$this->upload->data('file_name') ;
                    $data['ban'][$key]['banner_name']      =$this->upload->data('file_name');
                } 
            }*/

            $newdata1 = isset($data['ga']) ? json_encode($data['ga']) : null;
            /*$newdata2 = isset($data['ban']) ? json_encode($data['ban']) : null;
            if(!empty($newdata2)){
               $save['weblink_banners']   = !empty($oldbanner)?json_encode(json_decode($newdata2)+$oldbanner):$newdata2;
            } */  
            if(!empty($newdata1)){
               $save['weblink_gallery']   = !empty($oldgallery)?json_encode(json_decode($newdata1)+$oldgallery):$newdata1; 
            }

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
            
            if(!empty($this->input->post('pagename'))){
                $pagename        = $this->input->post('pagename');
                $pagedescription = $this->input->post('pagedescription');
                for($i=0; $i < @count($pagename); $i++){
                    $data['pages'][$i]['name']        = $pagename[$i];
                    $data['pages'][$i]['description'] = $pagedescription[$i];
                }
            }
            
            foreach($this->input->post('ads') as $key => $values){
                if($key > 0){
                    $data['pages'][$i]['name']        = $values['pagename'];
                    $data['pages'][$i]['description'] = $values['pagedescription'];
                    $i++;
                }

            }
            
            
            if(!empty($this->input->post('videourls'))){
                $videourls        = $this->input->post('videourls');
                for($j=0; $j < @count($videourls); $j++){
                    $data['video'][$j]['url']        = $this->getEmbedUrl($videourls[$j]);
                }
            }
            
            foreach($this->input->post('videourl') as $keys => $values){
                if(!empty($values['videourl'])){
                    $data['video'][$j]['url']        = $this->getEmbedUrl($values['videourl']);
                    $j++;
                }
            }
            
            $save['weblink_video_url']            = isset($data['video']) ? json_encode($data['video']) : null;
            $this->Base_model->__constomdo_uploads('./uploads/weblink/','logo');
            if(!empty($this->upload->data('file_name'))){
                @unlink($this->data['single']->weblink_logo);
                $save['weblink_logo'] ='uploads/weblink/'.$this->upload->data('file_name') ;
            }
            $save['weblink_email']            = $this->input->post('email');
            $save['weblink_website']          = $this->input->post('website');
            $save['weblink_address']          = $this->input->post('address');
            
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
		    $save['weblink_pages']            = isset($data['pages']) ? json_encode($data['pages']) : null;
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

    public function removebanner($id = null){
        $url = explode('_',$id);
        $weblinkid = @$url[0];
        $indexarra = @$url[1];
        $single    = '';
        $this->data['single'] = $this->Base_model->_single_data_query(array('weblink_id'=>$weblinkid),'ci_customer_weblink','weblink_banners')->row();
        $allarray = !empty($this->data['single']->weblink_banners) ? json_decode($this->data['single']->weblink_banners) : null;

        if(!empty($allarray)){
            $single = $allarray[$indexarra];
            unlink($single->banner_url);
            unset($allarray[$indexarra]);
        }
        $save['weblink_banners'] = json_encode($allarray);
        if($this->Base_model->_update_query('ci_customer_weblink',$save,array('weblink_id'=>$weblinkid))) {
          $this->session->set_flashdata('success', 'Weblink banner image successfully removed !');
        }else{
            $this->session->set_flashdata('error', 'Some have error ! please try again ');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function removegallry($id = null){
        $url = explode('_',$id);
        $weblinkid = @$url[0];
        $indexarra = @$url[1];
        $single    = '';
        $this->data['single'] = $this->Base_model->_single_data_query(array('weblink_id'=>$weblinkid),'ci_customer_weblink','weblink_gallery')->row();
        $allarray = !empty($this->data['single']->weblink_gallery) ? json_decode($this->data['single']->weblink_gallery) : null;

        if(!empty($allarray)){
            $single = $allarray[$indexarra];
            unlink($single->gallry_url);
            unset($allarray[$indexarra]);
        }
        $save['weblink_gallery'] = json_encode($allarray);
        if($this->Base_model->_update_query('ci_customer_weblink',$save,array('weblink_id'=>$weblinkid))) {
          $this->session->set_flashdata('success', 'Weblink gallery image successfully updated !');
        }else{
            $this->session->set_flashdata('error', 'Some have error ! please try again ');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function removeurl($id = null){
        $url = explode('_',$id);
        $weblinkid = @$url[0];
        $indexarra = @$url[1];
        $single    = '';
        $this->data['single'] = $this->Base_model->_single_data_query(array('weblink_id'=>$weblinkid),'ci_customer_weblink','weblink_video_url')->row();
        $allarray = !empty($this->data['single']->weblink_video_url) ? json_decode($this->data['single']->weblink_video_url) : null;

        if(!empty($allarray)){
            $single = $allarray[$indexarra];
            unlink($single->gallry_url);
            unset($allarray[$indexarra]);
        }
        $save['weblink_video_url'] = json_encode($allarray);
        if($this->Base_model->_update_query('ci_customer_weblink',$save,array('weblink_id'=>$weblinkid))) {
          $this->session->set_flashdata('success', 'Video Url successfully updated !');
        }else{
            $this->session->set_flashdata('error', 'Some have error ! please try again ');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}