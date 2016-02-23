<?php

class MY_User_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    
        if (!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('access_denied',true);
            redirect('login');
        }
        
        $this->tpl = 'users/template';
        
        $this->user = $this->session->userdata('logged_id');
        
        $this->load->model('question_model');
        $this->load->model('user_model');
        
        $data = array(
            'page_title' => '',
            'nav_levels' => $this->question_model->getChildLevels(),
            'user' => $this->user_model->getUser($this->user)
        );
        
		$this->login_user = $this->user_model->getUser($this->user);
		
        $this->load->vars($data);
        
    }
    
}