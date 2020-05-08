<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Students:model
 *
 * @author air
 */
class Students_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_List() {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->order_by('osztaly','ASC');
        $querry = $this->db->get();
        $result = $querry->result();
        
        return $result;
    }
    
    public function insert($firstName, $lastName, $osztaly) {
        $record = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'osztaly' => $osztaly
        ];
        
        return $this->db->insert('students', $record);
        return $this->db->insert_id();
    }
    
    public function select_by_id($id) {
        $this->db->select("*");
        $this->db->from('students');
        $this->db->where('id',$id);
        
        return $this->db->get()->row();
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('students');
    }
    
    public function update($id,$firstName,$lastName,$osztaly) {
        $record = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'osztaly' => $osztaly
        ];
        
        $this->db->where('id',$id);
        return $this->db->update('students',$record);
    }
}
