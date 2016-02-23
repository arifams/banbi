<?php

class Logout extends MY_Admin_Controller {
    
    function index(){
        $this->session->unset_userdata('logged_admin');
        redirect('admin');
    }
    
}