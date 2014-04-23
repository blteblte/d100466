<?php

class Download {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Lejupielādēt';
    
    public function AccessLevel() {
        return AccessLevels::DEFAULT_ACCESS_LEVEL;
    }

    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    
    public function db() {return $this->db;}
    public function title() {echo $this->title;}
    
    public function renderHTML() {
        $this->renderDataLayer();
            include ('view.php');
    }

    public function renderDataLayer(){
        
    }
    
    public function async__functionname($query, $data) {
        
    }

}

