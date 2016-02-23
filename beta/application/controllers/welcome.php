<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    function __construct() {
        parent::__construct();
    
        $this->load->model('user_model');
    }

    public function index() {
        $data['main'] = 'homepage';

        if ($this->input->post('signup')){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2');
            
            $user['first_name'] = $firstname;
            $user['last_name'] = $lastname;
            $user['email'] = $email;
            $user['level_id'] = 4;
            $user['password'] = md5($password);
            
            $user_count = $this->user_model->getAllUsers();
            
            $user['user_id'] = sprintf('%08d', count($user_count)+1);
            
            $user_id = $this->user_model->saveUser($user);
            
            if ($user_id){
                $this->session->set_userdata(array('logged_in'=>$user_id));
                redirect('users/dashboard');
            }
            else {
                redirect('register');
            }
            
        }
        elseif ($this->input->post('login')){
            
            $this->load->library('Secure');
            
            $login['username'] = $this->input->post('username');
            $login['password'] = $this->input->post('password');
            
            $user_login = $this->secure->login($login);
            
            if ($user_login == true){
                redirect('users/dashboard');
            }
            else {
                redirect('login');
            }
            
        }
        else {
            $this->load->view($this->tpl, $data);    
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */