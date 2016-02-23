<?php

class Questions extends MY_User_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('question_model');
        $this->load->model('exercise_model');

        $this->load->library('Question');
        
        $this->user = $this->user_model->getUser($this->session->userdata('logged_in'));
        
        $data['user'] = $this->user;
        
        $this->load->vars($data);
    }

    function index() {
        $level_id = $this->session->userdata('level');

        $this->session->set_userdata(array('level' => $level_id));

        $level = $this->question_model->getLevel($level_id);
        $questions = $this->question_model->getQuestionsByLevel($level_id);
        
        if ($questions){

            $data = array();

            if ($level) {
                $data['page_title'] = 'Welcome to level ' . $level->level_name;
                $data['level'] = $level;
                $data['main'] = 'users/level_welcome';
            } else {
                $data['main'] = 'users/404';
            }

            $this->load->view($this->tpl, $data);
        }
        else {
            redirect('questions/finish');
        }
    }

    function level() {
        $level_id = $this->session->userdata('level');
        
        $level = $this->question_model->getLevel($level_id);
        $offset = $this->input->get('offset') ? $this->input->get('offset') : 0;

        $data = array();

        if ($level) {
            $data['page_title'] = 'Welcome to level ' . $level->level_name;

            $num_questions = count($this->question_model->getQuestionsByLevel($level_id));            
            
            $questions = $this->exercise_model->getQuestionsByLevel($level_id, $offset);

            if ($num_questions == $offset && $num_questions) { // If question done, means level up
                
                $update_user['user_id'] = $this->user->user_id;
                
                // Find the next level
                $next_level = $this->question_model->getNextLevel($level_id);
                
                $update_user['level_id'] = $next_level; // ??????
                
                $update_user['score'] = ($this->session->userdata('correct_result') * 100) + $this->user->score;
                                
                $this->user_model->updateUser($update_user,$this->user->user_id);
                
                redirect('questions/level_up');
            }
            elseif ($num_questions) {
                $data['questions'] = $questions;
                $data['level'] = $level;
                $data['offset'] = $offset;
                $data['main'] = 'users/question_page';
                
                $this->load->view($this->tpl, $data);
            }
            else {
                redirect('questions/finish');
            }
        } else {
            $data['main'] = 'users/404';
            $this->load->view($this->tpl, $data);
        }
    }

    function answer() {
        $question_id = $this->input->get('qid');
        $answer_id = $this->input->get('aid');
        $get_offset = $this->input->get('offset');

        $question = $this->question_model->getQuestion($question_id);
        $correct_result = $this->session->userdata('correct_result');

        if ($question) {
            $correct = $question->answer_id == $answer_id ? $correct_result + 1 : $correct_result + 0;

            $is_correct = $question->answer_id == $answer_id ? true : false;

            $this->session->set_userdata(array('question' => $question_id, 'correct_result' => $correct, 'correct' => $is_correct));

            $offset = $get_offset == '' ? 0 : $get_offset + 1;

            redirect('questions/result?offset=' . $offset);
        }
    }

    function result() {
        $offset = $this->input->get('offset');

        $data['page_title'] = 'Result';
        $data['level_id'] = $this->session->userdata('level');
        $data['question_id'] = $this->session->userdata('question');
        $data['offset'] = $offset;
        $data['main'] = $this->session->userdata('correct') == true ? 'users/correct_answer' : 'users/wrong_answer';

        $this->load->view($this->tpl, $data);
    }
    
    function level_up(){
        $correct_answers = $this->session->userdata('correct_result');
        $this->session->set_userdata(array('level' => $this->user->level_id));
        
        $data['page_title'] = 'Your Level is Up, ' . $this->user->first_name;
        $data['main'] = 'users/level_up';
        $data['level'] = $this->question_model->getLevel($this->user->level_id);
        $data['score'] = $correct_answers * 100;
        $data['next_questions'] = $this->question_model->getQuestionsByLevel($this->user->level_id) ? true : false;
        
        $this->load->view($this->tpl,$data);
    }
    
    function next_level() {
        $this->session->unset_userdata('correct_result');
        $this->session->unset_userdata('correct');
        $this->session->unset_userdata('question');
                
        redirect('level');
    }

    function finish() {
        $this->session->unset_userdata('correct_result');
        $this->session->unset_userdata('correct');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('question');
        
        $data['page_title'] = 'You have finished all exercise';
        $data['main'] = 'users/finish';
        
        $this->load->view($this->tpl,$data);
        
    }

}
