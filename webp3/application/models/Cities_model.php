<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cities_model
 *
 * @author air
 */
class Cities_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_List() {
        $this->db->select('*');
        $this->db->from('cities');
        $this->db->order_by('name','ASC');
        $querry = $this->db->get();
        $result = $querry->result();
        
        return $result;
    }
    
    public function insert($name, $postal_code) {
        $record = [
            'name' => $name,
            'postal_code' => $postal_code
        ];
        
        return $this->db->insert('cities', $record);
        return $this->db->insert_id();
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('cities');
    }
    
    public function update($id,$name,$postal_code){
        $record = [
            'name' => $name,
            'postal_code' => $postal_code
        ];
        
        $this->db->where('id',$id);
        return $this->db->update('cities',$record);
    }
    
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('cities');
        $this->db->where('id',$id);
        
        return $this->db->get()->row();
    }
}
