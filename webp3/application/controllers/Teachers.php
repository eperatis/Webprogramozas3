<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teachers
 *
 * @author air
 */
class Teachers extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('teachers_model');
    }
    
    public function index() {
        $records = $this->teachers_model->get_list();
        $view_params = [
            'teachers' => $records
        ];
        $this->load->helper('url');
        $this->load->view('teachers/list', $view_params);
    }  
    
    public function profile($id = NULL) {
        if($id == NULL) {
            show_error('A szerkesztéshez hiányzik az id!');
        }
        $record = $this->teachers_model->select_by_id($id);
        if($record == NULL) {
            show_error('Nem létezik ilyen rekord!');
        }
        
        $view_params = [
            'data' => $record
        ];
        $this->load->helper('url');
        $this->load->view('teachers/profile', $view_params);
    }
    
    public function dataforedit() {
        $records = $this->teachers_model->select_by_id($id);
        $view_params = [
            'teachers' => $records
        ];
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('teachers/edit', $view_params);
    }
    
    public function insert() {
        if($this->input->post('submit')) {
            $upload_config['allowed_types'] = 'jpg|gif|png';
            $upload_config['max_size'] = 100; 
            $upload_config['min_width'] = 100;
            $upload_config['max_width'] = 2000;
            $upload_config['min_height'] = 150;
            $upload_config['max_height'] = 1200;
            
            $upload_config['file_name'] = time();
            $upload_config['upload_path'] = './uploads/';
            $upload_config['file_ext_tolower'] = TRUE;
            $upload_config['overwrite'] = TRUE;
            $this->load->library('upload'); 
            $this->upload->initialize($upload_config);
            
        $this->load->library('form_validation');
            $this->form_validation->set_rules('firstName','keresztnév','required');
            $this->form_validation->set_rules('lastName','vezetéknév','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('osztaly','osztály','required');
            
            
            if(($this->form_validation->run() == TRUE) && ($this->upload->do_upload('file') == TRUE)) {
                $this->teachers_model->insert($this->input->post('firstName'),
                                              $this->input->post('lastName'),
                                              $this->input->post('email'),
                                              $this->input->post('osztaly'));
                
                $this->load->helper('url');
                redirect(base_url('teachers'));
            }  
        }
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('teachers/insert');
    }
    
    public function delete($id = NULL) {
        if($id == NULL) {
            show_error('Hiányzó rekord azonosító!');
        }
        $record = $this->teachers_model->select_by_id($id);
        if($record == NULL) {
            show_error('Ilyen azonodítóval nincs rekord!');
        }
        $this->teachers_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('teachers'));
    }
    
    public function edit($id = NULL){
        if($id == NULL) {
            show_error('A szerkesztéshez hiányzik az id!');
        }
        $record = $this->teachers_model->select_by_id($id);
        if($record == NULL) {
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
            $this->form_validation->set_rules('firstName','keresztnév','required');
            $this->form_validation->set_rules('lastName','vezetéknév','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('osztaly','osztály','required');
            
            
            if($this->form_validation->run() == TRUE)  {
                $this->teachers_model->update($id,
                                              $this->input->post('firstName'),
                                              $this->input->post('lastName'),
                                              $this->input->post('email'),
                                              $this->input->post('osztaly'));
                
                $this->load->helper('url');
                redirect(base_url('teachers'));
            }
            else {
                $view_params = [
                    'emp' => $record
                ];

                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->view('teachers/edit',$view_params);
            }
    }
}
