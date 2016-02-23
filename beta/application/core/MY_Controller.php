<?php

class MY_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    
        $this->tpl = 'template';
        
    }
    
    function __admin_controller(){
        if (!$this->session->userdata('logged_admin')){
            redirect('admin');
        }
        
        $this->tpl = 'admin/template';
        
        $data['username'] = $this->session->userdata('logged_admin');
        $data['sidebar'] = 'admin/sidebar';
        
        $this->load->library('Modules');
        
        $this->load->model('module_model');
        
        $data['navs'] = $this->module_model->getNavModules();
        
        $this->load->vars($data);
    }
    
}