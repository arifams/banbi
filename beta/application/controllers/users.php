<?php

class Users extends MY_User_Controller {
    
    function __construct() {
        parent::__construct();
    
        $this->load->model('user_model');
    }
    
    function index(){
        $this->dashboard();
    }
    
    function dashboard(){
                
        $data['page_title'] = 'Dashboard';
        $data['main'] = 'users/dashboard';
        
        $user = $this->user_model->getUser($this->session->userdata('logged_in'));
        
        $data['user'] = $user;
        
        $this->session->set_userdata(array('level' => $user->level_id));
        
        $this->load->view($this->tpl,$data);
    }
    
}