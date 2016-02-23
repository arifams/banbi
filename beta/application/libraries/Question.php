<?php

class Question {
    
    function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->database();
    }
    
    function getAnswersByQuestion($question_id){
        return $this->ci->db->get_where('answers',array('question_id'=>$question_id))->result();
    }
    
}