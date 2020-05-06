<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees_model
 *
 * @author BallaT
 */
class Employees_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        // innentől kezdve lesz db kapcsolatom 
        // innentől kezdve a példányban 
        // a $this->db mezőn keresztül érem el 
        // az adatbázist 
    }
    
    // visszaadja a rekordokat szűrés nélkül 
    public function get_list(){
        $this->db->select('*'); // SELECT *
        $this->db->from('employees'); // FROM employees
        // ?? kell-e where feltétel? 
        // ?? kell-e rendezni? 
        $this->db->order_by('name','ASC'); //ORDER BY name ASC
        
        $query = $this->db->get(); // lekérdezés OBJEKTUM!!!!
        $result = $query->result(); // lekérd. végrehajtása + rekordok betöltése
    
        return $result;
    }
    
    public function update($id, $name, $tin, $ssn){
        $record = [
            'name'  =>  $name, 
            'tin'   =>  $tin,
            'ssn'   =>  $ssn
        ];
        // db rekord reprezentánst építünk megmondom, hogy a db
        // rekord mely mezőjéhez (név alapján) milyen értéket 
        // szeretnék rendelni 
        
        // where-ben mondom meg a frissítés alapját (feltételét)
        $this->db->where('id',$id);
        return $this->db->update('employees',$record);
    }
    
    public function select_by_id($id){
        // SELECT * FROM employees WHERE id = $id
        $this->db->select("*");
        $this->db->from('employees');
        $this->db->where('id',$id); // WHERE id = $id 
        
        return $this->db->get() // lekérdezéis objektum
                        ->row(); // row mivel egy sort várunk vissza
    }
    
    
    
    
    
    
    // a kapott adatok alapján szúrjon be egy rekordot a db-be 
    public function insert($name, $tin, $ssn){
        // 1) készítsünk egy asszociatív tömböt a rekord számára 
        // ehhez a kulcs legyen a mezőnév, az érték pedig a beszúrandó
        // érték
        
        if($this->input->post('submit')){
            $upload_config['allowed_types'] = 'jpg|gif|png';
            $upload_config['max_size'] = 100; 
            $upload_config['min_width'] = 100; 
            $upload_config['max_width'] = 2000;
            $upload_config['min_height'] = 150;
            $upload_config['max_height'] = 1200;
            $upload_config['file_name'] = $tin + '_001';
            $upload_config['upload_path'] = './uploads/';
            $upload_config['file_ext_tolower'] = TRUE;
            $upload_config['overwrite'] = TRUE;
            
            $path = './uploads/' + $tin + '_001';
            
            $this->load->library('upload');
            $this->upload->initialize($upload_config);
            
            if($this->upload->do_upload('file') == TRUE){
                $record = [
                    'name'  =>  $name, 
                    'tin'   =>  $tin,
                    'ssn'   =>  $ssn,
                    'path' => $path
                ];
                
            }
            else {
                $view_params = [
                    'errors' => $this->upload->display_errors()
                ];
            }
            
        }
        // 2) hívjuk meg az insert metódust 
        // a) elég tudnom azt, hogy a beszúrás megtörtént
        return $this->db->insert('employees',$record);
        // b) határozzuk meg a beszúrt rekord AI típusú PK értékét
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('employees');
    }
}
