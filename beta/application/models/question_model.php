<?php

class Question_model extends CI_Model {
    
    /* Questions */
    function getQuestion($question_id){
        return $this->db->get_where('questions',array('question_id'=>$question_id))->row();
    }
    
    function saveQuestion($data){
        if (isset($data['question_id']) && $data['question_id']){
            $this->db->where('question_id',$data['question_id'])
                    ->update('questions',$data);
            $id = $data['question_id'];
        }
        else {
            $this->db->insert('questions',$data);
            $id = $this->db->insert_id();
        }

        return $id;
    }
    
    function getQuestionsByLevel($level_id){
        return $this->db->get_where('questions',array('level_id'=>$level_id))->result();
    }
    
    /* Answers */
    function saveAnswer($data){
        if (isset($data['answer_id']) && $data['answer_id']){
            $this->db->where('answer_id',$data['answer_id'])
                    ->update('answers',$data);
            $id = $data['answer_id'];
        }
        else {
            $this->db->insert('answers',$data);
            $id = $this->db->insert_id();
        }

        return $id;
    }
    
    function getAnswersByQuestion($question_id){
        return $this->db->get_where('answers',array('question_id'=>$question_id))->result();
    }
    
    function deleteAnswersByQuestion($question_id){
        $this->db->where('question_id',$question_id)->delete('answers');
    }
    
    function getAnswer($answer_id){
        return $this->db->where('answer_id',$answer_id)
                ->get('answers')->row();
    }
    
    /* Data level */
    function getParentLevels(){
        $this->db->where('parent_id','');
        return $this->db->get('levels')->result();
    }
    
    function getChildLevels(){
        $this->db->where('parent_id >',0);
        return $this->db->get('levels')->result();
    }
    
    function getLevels(){
        return $this->db->get('levels')->result();
    }
    
    function saveLevel($data){
        $this->db->insert('levels',$data);
        return $this->db->insert_id();
    }
    
    function updateLevel($data){
        $this->db->where('level_id',$data['level_id']);
        $this->db->update('levels',$data);
        return $data['level_id'];
    }
    
    function getLevel($level_id){
        return $this->db->get_where('levels',array('level_id'=>$level_id))->row();
    }
    
    function getNextLevel($level_id){
        $data = $this->db->where('level_id >',$level_id)
                ->limit(1)
                ->get('levels')->row();
        
        if ($data){
            return $data->level_id;
        }
    }
    
    
}