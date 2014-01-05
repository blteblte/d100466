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
    
    public function renderMENU() {
        include (Site::view_url() . 'default_menu.view.php');
    }
    
    public function renderHTML() {
        //ob_start();
        
            //INCLUDE HTML HERE
            include (Site::view_url() . 'default.view.php');
            include (Site::view_url() . 'player.modal.php');
            include (Site::view_url() . 'confirmation.dialog.php');
        
        //ob_get_clean();
    }

    public function async__functionname($query, $data) {
        
        $sql = "SELECT user_id, user_name, user_value FROM user";
        $result = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }
   
   public function async__editPlayer($query, $data) {
        $player_id = intval($data['player_id']);
        $nick = $data['nick'];
        $value = intval($data['value']);
        
        $sql = "UPDATE user SET user_name = '{$nick}', user_value = {$value}"
             . " WHERE user_id = {$player_id}";
        $this->db()->query($sql);

        die(json_encode(array('status'=>'OK', 'text'=>'player eddited')));
   }
   
   public function async__deleteItem($query, $data) {
       $id = intval($query['id']);
       $sql = "DELETE FROM user where user_id = {$id}";
       $this->db()->query($sql);
       die(json_encode(array('status'=>'OK', 'text'=>'player deleted')));
   }
   
   public function async__addPlayer($query, $data) {
        $nick = $data['nick'];
        $value = intval($data['value']);
        
        $sql = "INSERT INTO user (user_name, user_value) VALUES('{$nick}', {$value})";
        $success = $this->db()->query($sql);
        
        die(json_encode(array('status'=>'OK', 'data'=>$success)));
   }
}

