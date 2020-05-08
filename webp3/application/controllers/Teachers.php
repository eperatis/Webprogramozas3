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
    
    public function insert() {
        if($this->input->post('submit')) {
            $upload_config['allowed_types'] = 'jpg|gif|png';
            $upload_config['max_size'] = 100; 
            $upload_config['min_width'] = 100;
            $upload_config['max_width'] = 2000;
            $upload_config['min_height'] = 150;
            $upload_config['max_height'] = 1200;
            
            $upload_config['file_name'] = '02';
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
                redirect(base_url('students'));
            }  
        }
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('teachers/insert');
    }
}
