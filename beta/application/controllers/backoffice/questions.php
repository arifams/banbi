<?php

class Questions extends MY_Admin_Controller {
    
    function __construct() {
        parent::__construct();
    
        $this->load->model('question_model');
    }
    
    function index(){
        $data['title'] = 'Questions management';
        $data['main'] = 'admin/questions/form_search';
        $data['levels'] = $this->question_model->getChildLevels();
        
        if ($this->input->post('submit')){
            $this->load->library('Question');
            $level_id = $this->input->post('level');
            $data['questions'] = $this->question_model->getQuestionsByLevel($level_id);
        }
        else {
            $data['questions'] = '';
        }
        $this->load->view($this->tpl,$data);            
    }
    
    function create(){
        
        $level_id = $this->input->get('level');
        
        $data['title'] = 'Create new question';
        $data['main'] = 'admin/questions/form_question';
        $data['levels'] = $this->question_model->getLevels();
        
        if ($this->input->post('submit')){
            $question = $this->input->post('question');
            $level = $this->input->post('level');
            $type = $this->input->post('type');
            $answer = $this->input->post('answer');
            $correct_answer = $this->input->post('correct');
            
            $save['level_id'] = $level;
            $save['type'] = $type;
            
            if ($type == 'img'){
                
                // if question is image, then do the uploading process
                
                //$this->load->library('upload');
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = true;
                
                $this->load->library('upload',$config);
                
                if ($this->upload->do_upload()){
                    $data_upload = array('upload' => $this->upload->data());
                    $save['question'] = $data_upload['upload']['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    foreach ( $error as $er){
                        die($er);    
                    }
                }
                
            }
            else {
                $save['question'] = $question;
            }
                        
            $question_id = $this->question_model->saveQuestion($save);
            
            for ($i = 0; $i < count($answer); $i++){
                $answer_data['question_id'] = $question_id;
                $answer_data['answer'] = $answer[$i];
                $answer_data['is_correct'] = $correct_answer[$i];
                
                $this->question_model->saveAnswer($answer_data);
                
            }
            
            if ($question_id){
                redirect(admin_url().'questions/show/'. $level);
            }
            
        }
        else {
            $data['question'] = '';
            $data['question_id'] = '';
            $data['type'] = '';
            $data['level_id'] = $level_id;
            
            $this->load->view($this->tpl,$data);
        }
    }
    
    function edit(){
        $question_id = $this->input->get('qid');
        
        $data['title'] = 'Create new question';
        $data['main'] = 'admin/questions/form_edit_question';
        $data['levels'] = $this->question_model->getLevels();
        
        $question = $this->question_model->getQuestion($question_id);
        
        if ($this->input->post('submit')){
            $question_id = $this->input->post('question_id');
            $question = $this->input->post('question');
            $type = $this->input->post('type');
            $level = $this->input->post('level');
            $answer = $this->input->post('answer');
            $answer_id = $this->input->post('answer_id');
            $correct_answer = $this->input->post('correct');
            
            $save['question_id'] = $question_id;
            $save['level_id'] = $level;
            $save['type'] = $type;
            $save['question'] = $question;
            $save['answer_id'] = $correct_answer;
            
            if ($type == 'img' && $_FILES['userfile']['name']){
                
                // if question is image, then do the uploading process
                
                //$this->load->library('upload');
                
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                
                $this->load->library('upload',$config);
                
                if ($this->upload->do_upload()){
                    $data_upload = array('upload' => $this->upload->data());
                    $save['question'] = $data_upload['upload']['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    foreach ( $error as $er){
                        die($er);    
                    }
                }
                
            }
            else {
                $save['question'] = $question;
            }
                        
            $question_id = $this->question_model->saveQuestion($save);
            
            // Remove existing answers
            //$this->question_model->deleteAnswersByQuestion($question_id);
            
            for ($i = 0; $i < count($answer); $i++){ // Insert New Ansewrs
                $answer_data['answer_id'] = $answer_id[$i];
                $answer_data['question_id'] = $question_id;
                $answer_data['answer'] = $answer[$i];
                
                $this->question_model->saveAnswer($answer_data);
                
            }
            
            if ($question_id){
                redirect(admin_url().'questions/show/'. $level);
            }
        }
        else {
            $data['question'] = $question->question;
            $data['question_id'] = $question_id;
            $data['type'] = $question->type;
            $data['level_id'] = $question->level_id;
            $data['answer_id'] = $question->answer_id;
            $data['answers'] = $this->question_model->getAnswersByQuestion($question_id);
            
            $this->load->view($this->tpl,$data);
        }
    }
    
    function show(){
        $level_id = $this->uri->segment(4);
        
        $level = $this->question_model->getLevel($level_id);
        
        if ($level){
            
            $this->load->library('Question');
            
            $data['title'] = 'Questions in level ' . $level->level_name;
            $data['main'] = 'admin/questions/show_questions';
            $data['level_id'] = $level_id;
            $data['questions'] = $this->question_model->getQuestionsByLevel($level_id);
            
            $this->load->view($this->tpl,$data);
        }
        
    }
    
}