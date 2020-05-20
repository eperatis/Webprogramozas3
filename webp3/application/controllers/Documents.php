<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Documents
 *
 * @author air
 */
class Documents extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('documents_model');
    }
    
    public function index() {
        $records = $this->documents_model->get_list();
        $view_params = [
            'documents' => $records
        ];
        $this->load->helper('url');
        $this->load->view('documents/list', $view_params);
    }
    
    public function insert() {
        if($this->input->post('submit')) {
            $upload_config['allowed_types'] = 'pdf';
            $upload_config['file_name'] = time();
            $upload_config['upload_path'] = './uploads/';
            $upload_config['file_ext_tolower'] = TRUE;
            $upload_config['overwrite'] = TRUE;
            $this->load->library('upload'); 
            $this->upload->initialize($upload_config);
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','Név','required');
            
            if(($this->form_validation->run() == TRUE) && ($this->upload->do_upload('file') == TRUE)) {
                $this->documents_model->insert($this->input->post('name'));
                
                $this->load->helper('url');
                redirect(base_url('documents'));
            }
        }
            
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('documents/insert');
    }
    public function delete($id = NULL) {
        if($id == NULL) {
            show_error('Hiányzó rekord azonosító!');
        }
        $record = $this->documents_model->select_by_id($id);
        if($record == NULL) {
            show_error('Ilyen azonosító nincs rekord!');
        }
        $this->documents_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('documents'));
    }
    
    public function download($id = NULL){
        if($id == NULL) {
            show_error('Hiányzó rekord azonosító!');
        }
        $record = $this->documents_model->select_by_id($id);
        if($record == NULL) {
            show_error('Ilyen azonosító nincs rekord!');
        }
        
        $this->load->helper('download');
        force_download($record->path, NULL);
        
        $this->load->helper('url');
        redirect(base_url('documents'));
    }
}
