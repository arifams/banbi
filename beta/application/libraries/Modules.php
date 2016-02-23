<?php

class Modules {
    
    function __construct() {
        $this->ci = &get_instance();
        
        $this->ci->load->database();
    }
    
    function getSubModules($parent_id){
        $this->ci->db->where('parent_id',$parent_id);
        return $this->ci->db->get('modules')->result();
    }
    
    
}