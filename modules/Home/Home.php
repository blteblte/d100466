<?php

class Home {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Mājas';
    
    public $UsersDataColumns = array();
    public $UsersData = array();
    
    //Inicializējam savienojumu ar DB dotajam modulim
    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    public function db() {return $this->db;}
    public function title() {echo $this->title;}
    
    public function renderHTML() {
        $this->renderDataLayer();
        
            //Ievietot HTML šeit
            include ('view.php');
    }

    //Saņemam nepieciešamos DB objektus
    public function renderDataLayer(){
    }
    
    //Asinhron funkcija
    public function async__functionname($query, $data) {
   }

}

