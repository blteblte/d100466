<?php

class Saturs {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Saturs';
    
    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    public function db() {return $this->db;}
    public function title() {echo $this->title;}
    
    public function renderMENU() {
        include (Site::view_url() . 'saturs_menu.view.php');
    }
    
    public function renderHTML() {
        //ob_start();
        
            //INCLUDE HTML HERE
            include (Site::view_url() . 'saturs.view.php');
            
        //ob_get_clean();
    }

    public function async__functionname($query, $data) {
        
        $sql = "";
        $result = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }
}

