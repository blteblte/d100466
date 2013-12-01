<?php

class Module {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Module';
    
    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    public function db() {return $this->db;}
    public function title() {echo $this->title;}
    
    public function renderHTML() {
        //ob_start();
        
            //INCLUDE HTML HERE
            include (Site::view_url() . 'default.view.php');
            include (Site::view_url() . 'default.modal.php');
        
        //ob_get_clean();
    }

    public function async__functionname($query, $data) {
        
        $sql = "SELECT user_id, user_name, user_value FROM user";
        $result = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }
}

