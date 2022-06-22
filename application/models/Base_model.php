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
    public function _dropdownlist($slect1, $slect2, $where, $tbl, $option = null,$orderby = null){
        $this->db->select($slect1 . ',' . $slect2);
        if ($where != "") {
            $this->db->where($where);
        }
        if ($orderby != null) {
            $this->db->order_by($orderby);
        }
        $query = $this->db->get($tbl);

        if ($option != null) {
            $data[''] = $option;
        }
        
        foreach ($query->result_array() as $row) {
            $data[$row[$slect1]] = $row[$slect2];
        }
        return $data;
    }  
    
    
    public function _single_data_query($where,$tbl,$select = null){
        if(!empty($select)){
            $this->db->select($select);
        }
        if(!empty($where)){
            return $this->db->get_where($tbl,$where);
        }else{
           return $this->db->get($tbl); 
        }
        
    }
        
    public function _run_query($sql){
        return $this->db->query($sql);
    }
        
    public function _inser_query($tbl,$data){
        $this->db->insert($tbl,$data);
        return $this->db->insert_id();
    }
    public function _get_all_data($tbl,$order){
        $this->db->order_by($orderby);
        return $this->db->get($tbl);
    }
    
    public function _delete_query($tbl,$where){
        $this->db->where($where);
        if($this->db->delete($tbl)){
            return true;
        }else{
            return false;
        } 
    }
    
 
    
    public function _update_query($tbl,$data,$where){
               $this->db->where($where);
        return $this->db->update($tbl, $data);
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

    public function _ganrate_referral($id,$pre_fix){
        $number = sprintf("%07d", $id);
        return $pre_fix.$number;
    }
    
    
        public function all_sub_cat_by_main_id($main_cat_id)
    {
        return $this->db->select("cat_id,cat_name")
            ->where('cat_parents', $main_cat_id)
            ->get('ci_categories')->result();
    }
}
