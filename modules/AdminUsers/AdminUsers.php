<?php

class AdminUsers {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Module';
    
    public function AccessLevel() {
        return AccessLevels::REGISTERED_ACCESS_LEVEL;
    }
    
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
        include(Site::data() . 'User.php');
        $this->UsersData = UserContext::getAllUsers($this->db());
    }
    
    //Asinhron funkcija
    public function async__functionname($query, $data) {
        
        $sql = "SELECT user_id FROM Users";
        $result = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        //die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }

}

