<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Students
 *
 * @author air
 */
class Students extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('students_model');
    }
    
    public function index() {
        $records = $this->students_model->get_list();
        $view_params = [
            'students' => $records
        ];
        $this->load->helper('url');
        $this->load->view('students/list', $view_params);
    }
    
    public function insert() {
        if($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('firstName','keresztnév','required');
            $this->form_validation->set_rules('lastName','vezetéknév','required');
            $this->form_validation->set_rules('osztaly','osztály','required');
            
            if($this->form_validation->run() == TRUE) {
                $this->students_model->insert($this->input->post('firstName'),
                                              $this->input->post('lastName'),
                                              $this->input->post('osztaly'));
                
                $this->load->helper('url');
                redirect(base_url('students'));
            }
        }
        
        $this->load->helper('form');
        $this->load->view('students/insert');
    }
}
