<?php

class Auth extends MY_Controller {
    
    function __construct() {
        parent::__construct();
    
        
    }
    
    function user(){ // Login page
        if ($this->input->post('submit')){
            
            $this->load->library('Secure');
            
            $login['username'] = $this->input->post('username');
            $login['password'] = $this->input->post('password');
            
            if ($this->secure->login($login) == true){
                redirect ('users/dashboard');
            }
            else {
                $this->session->set_flashdata('login_failed',true);
                redirect('login');
            }
        }
        else {
            $this->load->view('login');
        }
    }
    
    function admin(){
        
        if ($this->input->post('login')){
            
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            if ($email == 'administrator@banbi.be' && $password == 'Test123'){
            
                $this->session->set_userdata(array('logged_admin'=>'admin'));
                redirect(admin_url().'dashboard');
                
            }
            else {
                $this->session->set_flashdata('login_failed',true);
                redirect('admin');
            }
            
        }
        else {
            $this->load->view('admin/login');
        }
    }
    
    function logout(){
        $this->session->unset_userdata('logged_in');
        redirect(base_url());
    }
    
}