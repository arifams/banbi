<?php

class Dashboard extends MY_Admin_Controller {
    
    function __construct() {
        parent::__construct();
    
        $this->load->model('user_model','user');
        $this->load->model('question_model','question');
    }
    
    function index(){
        $data['title'] = 'Dashboard';
        $data['main'] = 'admin/dashboard';
        
        $users = $this->user->getAllUsers();
        $levels = $this->question->getLevels();
        
        $data['users'] = count($users);
        $data['levels'] = count($levels);
        
        $this->load->view($this->tpl,$data);
    }
    
}