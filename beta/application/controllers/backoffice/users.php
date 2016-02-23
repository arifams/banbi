<?php

class Users extends MY_Admin_Controller {
    
    function __construct() {
        parent::__construct();
    
        $this->load->model('user_model');
    }
    
    function index(){
        $data['title'] = 'Users';
        $data['main'] = 'admin/users/users';
        $data['users'] = $this->user_model->getAllUsers();
        
        $this->load->view($this->tpl,$data);
    }
    
}