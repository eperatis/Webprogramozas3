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
}
