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
}
