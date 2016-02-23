<?php

class Module_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    
        
    }
    
    function getNavModules(){
        $this->db->where('is_menu',1);
        $mods = $this->db->get('modules')->result();
        
        foreach ($mods as $mod){
            $data['result']['submod'] = $this->getSubModules($mod->mod_id);
        }
        
        $data['result'] = $mods;
        
        return $data;
    }
    
    function getSubModules($parent_id){
        $this->db->where('parent_id',$parent_id);
        return $this->db->get('modules')->row();
    }
    
}