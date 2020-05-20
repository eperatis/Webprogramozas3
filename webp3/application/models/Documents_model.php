<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Documents_model
 *
 * @author air
 */
class Documents_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_List() {
        $this->db->select('*');
        $this->db->from('documents');
        $this->db->order_by('name','ASC');
        $querry = $this->db->get();
        $result = $querry->result();
        
        return $result;
    }
    
    public function insert($name) {
        $path = "uploads/" . time() . ".pdf";
        $record = [
            'name' => $name,
            'path' => $path
        ];
        
        return $this->db->insert('documents', $record);
    }
    
        public function select_by_id($id) {
        $this->db->select("*");
        $this->db->from('documents');
        $this->db->where('id',$id);
        
        return $this->db->get()->row();
    }
    
        public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('documents');
    }
}
