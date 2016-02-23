<?php

class Levels extends MY_Admin_Controller {
    
    function __construct() {
        parent::__construct();
    
        $this->load->model('question_model');
    }
    
    function index(){
        $data['title'] = 'Difficulty Levels';
        $data['main'] = 'admin/levels/home';
        $data['levels'] = $this->question_model->getLevels();
        
        $this->load->view($this->tpl,$data);
    }
    
    function create(){
        $data['title'] = 'Create new level';
        $data['main'] = 'admin/levels/form_level';
        $data['levels'] = $this->question_model->getParentLevels();
        
        if ($this->input->post('submit')){
            $name = $this->input->post('name');
            $parent = $this->input->post('parent');
            $description = $this->input->post('description');
            
            $save['level_name'] = $name;
            $save['parent_id'] = $parent;
            $save['description'] = $description;
            
            $level_id = $this->question_model->saveLevel($save);
            
            if ($level_id){
                redirect(admin_url().'levels');
            }
            
        }
        else {
            $data['level_id'] = '';
            $data['level_name'] = '';
            $data['parent'] = '';
            $data['description'] = '';
            
            $this->load->view($this->tpl,$data);
        }
    }
    
    function edit(){
        $data['title'] = 'Edit level';
        $data['main'] = 'admin/levels/form_level';
        
        $level_id = $this->uri->segment(4);
        
        $level = $this->question_model->getLevel($level_id);
        
        if ($level){
            
            if ($this->input->post('submit')){
                $name = $this->input->post('name');
                $level_id = $this->input->post('level_id');
                $parent = $this->input->post('parent');
                $description = $this->input->post('description');

                $save['level_id'] = $level_id;
                $save['level_name'] = $name;
                $save['parent_id'] = $parent;
                $save['description'] = $description;

                $level_id = $this->question_model->updateLevel($save);

                if ($level_id){
                    redirect(admin_url().'levels');
                }
            }
            else {
                $data['level_id'] = $level->level_id;                
                $data['level_name'] = $level->level_name;                
                $data['parent'] = $level->parent_id;
                $data['description'] = $level->description;
                $data['levels'] = $this->question_model->getLevels();
                
                $this->load->view($this->tpl,$data);
            }
            

        }
        
    }
    
    function delete(){
        $data['title'] = 'Edit level';
        $data['main'] = 'admin/levels/delete';
        
        $level_id = $this->uri->segment(4);
        
        $this->load->view($this->tpl,$data);
    }
    
}