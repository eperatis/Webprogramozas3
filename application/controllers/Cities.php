<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cities_controller
 *
 * @author air
 */
class Cities extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('cities_model');
    }
        
    public function index() {
        $records = $this->cities_model->get_list();
        $view_params = [
            'cities' => $records
        ];
        $this->load->helper('url');
        $this->load->view('cities/list', $view_params);
    }
    
    public function insert() {
        if($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','név','required');
            $this->form_validation->set_rules('postal_code','irányítószám','required');
            
            if($this->form_validation->run() == TRUE) {
                $this->cities_model->insert($this->input->post('name'),
                                            $this->input->post('postal_code'));
                
                $this->load->helper('url');
                redirect(base_url('cities'));
            }
        }
        
        $this->load->helper('form');
        $this->load->view('cities/insert');
    }
    
    public function edit($id = NULL) {
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }
        $record = $this->cities_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','név','required');
        $this->form_validation->set_rules('postal_code','irányítószám','required');
            
        if($this->form_validation->run() == TRUE) {
            $this->cities_model->update($id,
                                        $this->input->post('name'),
                                        $this->input->post('postal_code'));
                
            $this->load->helper('url');
            redirect(base_url('cities'));
        }
        else{
            $view_params = [
                'emp'    =>  $record
            ];
            
            $this->load->helper('form');
            $this->load->view('cities/edit',$view_params);
        }
    }
    
    public function delete($id = NULL) {
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        $record = $this->cities_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        $this->cities_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('cities'));
    }
}
