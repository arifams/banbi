<?php

class Secure {
    
    function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->database();
        $this->ci->load->library('session');
    }
    
    function login($data){
        $username = $data['username'];
        $password = $data['password'];
        
        $user = $this->ci->db->where('email',$username)
                        ->where('password',  md5($password))
                        ->get('users')
                        ->row();
        
        if ($user){
            $sess_data = array('logged_in' => $user->user_id);                
            $this->ci->session->set_userdata($sess_data);
            
            if ($this->ci->session->userdata('logged_in')){
                return true;
            }
        }        
    }
    
    
}