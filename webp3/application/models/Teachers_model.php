<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teachers_model
 *
 * @author air
 */
class Teachers_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_List() {
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->order_by('lastName','ASC');
        $querry = $this->db->get();
        $result = $querry->result();
        
        return $result;
    }
    
    public function insert($firstName, $lastName,$email, $osztaly) {
        $path = "./uploads/" + $firstName + "01";
        $record = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'path' => $path,
            'osztaly' => $osztaly
        ];
        
        return $this->db->insert('teachers', $record);
    }
}
