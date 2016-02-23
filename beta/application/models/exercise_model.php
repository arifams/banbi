<?php

class Exercise_model extends CI_Model {
    
    function getQuestionsByLevel($level_id,$offset = null){
        if ($offset){
            $this->db->limit(1,$offset);
        }
        else {
            $this->db->limit(1);
        }
        return $this->db->where('level_id',$level_id)
                ->get('questions')
                ->result();
    }
    
}