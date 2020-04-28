<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees
 *
 * @author air
 */
class Employees extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('employees_model');
        // innentől az emp. model metódusait 
        // a $this->employees_model-en keresztül
        // tudjuk hívni
    }
    
    // alkalmazottak listázása 
    public function index(){
       // WTF? 
        
       // 1) lekérdezem az adatbázisból a rekordokat
       $records = $this->employees_model->get_list(); 
       // 2) a rekordok megjelenítése a böngészőben 
       $view_params = [
           'employees'  =>  $records
       ];
       $this->load->helper('url'); // segéd az url kezeléshez
       // 3) Felhelyezem a nézetet + átadom a paramétereket 
       $this->load->view('employees/list', $view_params);
    }
    
    // alkalmazott hozzáadása 
    public function insert(){
        // miért kerültünk ide? 
        // a - valaki meghívta első alkalommal ezt a metódust
        // b - valaki kitöltötte az űrlapot és szeretné beküldeni
        // $this->input --> az input kezelést valósítja 
        if($this->input->post('submit')){
            // valaki rákattintott a submit-ra, az adatokat validálni kell
            // a validácóhoz a form_validation könyvtárat használjuk 
            $this->load->library('form_validation');
            // validációs szabályok beállítása 
            // a) mindhárom mező kitöltése kötelező 
            $this->form_validation->set_rules('name','név','required');
            $this->form_validation->set_rules('tin','adóazonosító','required');
            $this->form_validation->set_rules('ssn','TAJ szám','required');
            
            if($this->form_validation->run() == TRUE){
                // a validáció ok, mehet a beszúrás
                $this->employees_model->insert($this->input->post('name'),
                                               $this->input->post('tin'),
                                               $this->input->post('ssn'));
                
                // irányítsuk az oldalt listázó nézetre
                $this->load->helper('url');
                // redirect -> átirányítás
                redirect(base_url('employees'));
            }
        }
        
        
        // a nézetben formot szeretnék kezelni, ezért a helperek 
        // közül a form helpert behivatkozom 
        $this->load->helper('form');
        $this->load->view('employees/insert');
        
    }
    
    // alkalmazott módosítása 
    // nyilván a szerkesztés során tudnom kell, hogy melyik 
    // rekordot szeretnénk módosítani (fontos, hogy az edit
    // paramétere elsődleges kulcs érték legyen vagy egyedi
    // érték az adattáblában) 
    public function edit($id = NULL){  
        // id értékének ellenőrzése, hogy csak akkor menjünk tovább, 
        // ha az id mögött ténylegesen van rekord 
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->employees_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
        // lemásolom az insertből a validációs szabályokat
        $this->form_validation->set_rules('name','név','required');
        $this->form_validation->set_rules('tin','adóazonosító','required');
        $this->form_validation->set_rules('ssn','TAJ szám','required');
         
        // megnézem, hogy rendben vannak-e validációs szabályok, ha nem, akkor felület, 
        // ha igen, akkor szerkesztés
        if($this->form_validation->run() == TRUE){
            // kezdeményezzük a rekord frissítését, 
            // amely ha sikeres visszamegyünk a 
            // lista oldara 
            $this->employees_model->update($id, 
                                           $this->input->post('name'),
                                           $this->input->post('tin'),
                                           $this->input->post('ssn'));
            $this->load->helper('url');
            redirect(base_url('employees'));
        }
        else{
            // összeállítom a nézet számára a paraméter tömböt
            $view_params = [
                'emp'    =>  $record
            ];
            // követkeménye, hogy viewban $emp-ként tudok 
            // hivatkozni a $record tartalmára

            $this->load->helper('form'); // ahhoz kell, hogy a nézetben a form elkészíthető legyen a metódushívások segítéségével
            // felhelyezem a nézetet a böngészőbe
            $this->load->view('employees/edit',$view_params);
        }
            
    }
    
    //alkalmazott törlése
    // a delete-et úgy alakítom ki, hogy paraméterrel és 
    // annélkül is hívható legyen, ezzel szeretném elkerülni 
    // a böngészőben az olyan hibajelzést, amely a hiányzó 
    // paraméterre utal => alapértelemzett paraméterérték
    public function delete($id = NULL){
        // van-e jogosultságom a rekord törléséhez? 
        
        // létezik-e egyáltalán a törölni kívánt rekord? 
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        // nézzük meg, hogy az adatbázisban létezik-e az 
        // adott táblában az id 
        $record = $this->employees_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        // ha minden ok, akkor törlés, majd a listázó oldalra megyünk
        $this->employees_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('employees'));
    }
}
