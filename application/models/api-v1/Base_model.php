<?php defined('BASEPATH') or exit('No direct script access allowed');

class Base_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function __constomdo_uploads($dirpath,$inputname){
        /*check dir if nit exist then create dir */
        if (!is_dir($dirpath)){
            mkdir($dirpath,0777);exit;
        }
        $config['upload_path']  = $dirpath;
        $config['allowed_types']= 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $config['max_size']     = '';
        $config['max_width']    = '';
        $config['max_height']   = '';
        $config['encrypt_name'] = false;
        $config['overwrite']    = false;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $this->upload->do_upload($inputname);
    }
    
    public function _run_query($sql){
        return $this->db->query($sql);
    }
        
    public function _inser_query($tbl,$data){
        $this->db->insert($tbl,$data);
        return $this->db->insert_id();
    }
    public function _update_query($tbl,$data,$where){
               $this->db->where($where);
        return $this->db->update($tbl, $data);
    }

    public function _single_data_query($where,$tbl,$select = null){
        if(!empty($select)){
            $this->db->select($select);
        }
        return $this->db->get_where($tbl,$where);
    }
    /*This function use to get sms template details */
    public function get_template_by_slug($slug){
        $this->db->select('*');
		$this->db->where('slug',$slug);
		$query=$this->db->get('sms_template');
		return $query->row_array();
    }
    
     public function all_setting_data(){
        $this->db->select('*');
        $result = $this->db->get('setting')->result_array();
        $data   = array();
        foreach ($result as $key => $value) {
            $data[$value['setting_key']] = $value['setting_value'];
        }
        return $data;
    }
    
    public function _all_data_optional_condetion($select,$tbl,$where = null,$order_by=null){
        $this->db->select($select);
        if($where != null){
            $this->db->where($where);
        }
        if($order_by != null){
            $this->db->order_by($order_by);
        }
        return $this->db->get($tbl);
    }
}
