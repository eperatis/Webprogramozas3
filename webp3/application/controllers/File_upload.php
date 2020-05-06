<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File_upload
 *
 * @author BallaT
 */
class File_upload extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * Készítek egy metódust, amely 
     * felhelyezi a feltöltéshez szükséges
     * nézetet a böngészőbe.
     */
    public function index(){
        // Hozzunk döntést, hogy valaki csak a linket hívta
        // meg vagy pedig rákattintott a submit gombra?
        if($this->input->post('submit')){
            // az űrlapot beküldték 
            
            // fájl feltöltése !!! CSAK EZ IS EGY INPUT 
            // ADAT LESZ, AZAZ VALIDÁLNOM KELL !!!!
            // A fájlok validálásához egy olyan konfigurációs
            // tömböt kell építenünk, ahol az egyes bejegyzések 
            // mondják meg a validációs szabályt. 
            
            // megszorítást adhatok a fájl kiterjesztésére 
            $upload_config['allowed_types'] = 'jpg|gif|png';
            // megszorítást adhatok a fájl méretére (kb-ban)
            $upload_config['max_size'] = 100; 
            // képek esetén érdekes lehet a kép mérete px-ben
            $upload_config['min_width'] = 100; // min szélesség 100 px
            $upload_config['max_width'] = 2000; // max szélesség 2000 px
            $upload_config['min_height'] = 150; // min magaság 150 px;
            $upload_config['max_height'] = 1200; // max magasság 1200 px;
            
            // ÁLLÍTSUK BE A FELTÖLTÉS KONFIGURÁCIÓJÁT 
            // a feltöltött fájl neve, alapértelmezés szerint a feltöltési név lesz
            $upload_config['file_name'] = 'kep_20200331';
            // a feltöltés helye: hová kerüljön a fájl? 
            // a feltöltés helyét a gyökértől határozom meg
            $upload_config['upload_path'] = './uploads/';
            // kiterjesztés kisbetűssé konvertálása megtörténjen-e
            $upload_config['file_ext_tolower'] = TRUE;
            // ha létezik a fájl, akkor felülírjuk-e? 
            $upload_config['overwrite'] = TRUE;
            
            // a feltöltést egy külső könyvtárral valósítjuk meg, 
            // így azt behivatkozom 
            $this->load->library('upload'); // ezt követően $this->upload mező létrejön 
            // a feltöltéshez hozzárendelem a fenti konfigurációt
            $this->upload->initialize($upload_config);
            
            // kezdeményezem az űrlapon megfelelő névvel 
            // ellátott űrlapmező alapján a feltöltést 
            // el akarom végezni a feltöltést, úgy, hogy a 
            // feltölteni kívánt állomány a file mezőben van 
            // az űrlapon, ezt validáljuk le a config_upload alapján
            // és ha minden kritériumnak eleget tesz, akkor 
            // mentsük el ugyancsak a config_uplaod alapján 
            if($this->upload->do_upload('file') == TRUE){
                // IGAZ: SIKERES FELTÖLTÉS
                // a feltöltésre vonatkozó információkat 
                // a $this->upload->data() adja vissza 
                //var_dump($this->upload->data());
                // készítek egy success nézetet, ahol kiírom a
                // feltöltött fájl információkat 
                $this->load->helper('url'); // szükségünk van a base url értékére a nézetben
                $view_params = [
                    'data' =>  $this->upload->data()
                ];
                $this->load->view('file_upload/success',$view_params);
            }
            else{
                // HAMIS: SIKERETELEN FELTÖLTÉS
                // a hiba oka a $this->upload->display_error()
                // hívással kérhető le
                //var_dump($this->upload->display_errors());
                // hiba esetén biztosítom, hogy újra fel tudja tölteni
                $view_params = [
                    'errors' => $this->upload->display_errors()
                ];
                $this->load->helper('form'); 
                $this->load->view('file_upload/form', $view_params);
            }
        }
        else{
            // Feladat: helyezzük fel a nézetet 
        // F1) Töltsük be azokat a kiegészítő 
        // osztályokat, amelyekre a nézetnek szüksége
        // lesz 
        $this->load->helper('form'); // biztosítjuk, hogy a form építése során az építő php függvények hívhatóak legyenek
        // F2) Helyezzük fel a nézetet a böngészőbe
        $this->load->view('file_upload/form', ['errors' => '']);
        }        
    }
}
