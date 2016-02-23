<?php

class User_model extends CI_Model {
    
    function getAllUsers(){
        return $this->db->get('users')->result();
    }
    
    function getUser($id){
        return $this->db->where('user_id',$id)
                ->get('users')->row();
    }
    
    function saveUser($data){
        $this->db->insert('users',$data);
        return $data['user_id'];
    }
    
    function updateUser($data,$old_id){
        $this->db->where('user_id',$old_id);
        $this->db->update('users',$data);
        return $data['user_id'];
    }
    
}