<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Filter extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
        $this->load->model('CollegModel','collegmodel');   
        $this->load->model('FilterModel','filtermodel');
        $this->load->model('Home_model','Home_model');  
        $this->data['categorydata'] = $this->Base_model->run_query("select *,concat('".site_url()."',cat_slug) as cat_slug from az_category");
    }   
    
	public function index(){
		$segment1 = $this->uri->segment(1);
		$this->data['categores']   = $this->Home_model->_get_subcat_overall_catid();
		echo "<pre>"; print_r($this->data['categores']); echo "<pre>"; die();
		$this->data['states']  = $this->filtermodel->_get_state_overall_colleg();
		$this->data['stream']  = $this->filtermodel->_get_stream_overall_colleg();
		$this->data['course']  = $this->filtermodel->_get_course_overall_colleg();
		$this->data['country'] = $this->filtermodel->_get_country_overall_colleg();
		$this->data['collegdata'] = $this->collegmodel->get_colleg_by_category($segment1);
		if(!empty($this->input->get())){
			$this->data['collegdata'] =  $this->collegmodel->get_colleg_by_filter();
		}

		$this->load->view('public/collegs/index-page',$this->data);
	}
}
