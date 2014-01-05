<?php

class Users {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Users';
    
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
            include (Site::view_url() . 'users.view.php');
            include (Site::view_url() . 'users.modal.php');
        
        //ob_get_clean();
    }

    public function async__getusers($query, $data) {
        
        $sql = "
                    SELECT
                        core_user.core_user_id as id,
                        core_user.core_user_nick as nick,
                        core_user.core_user_name as name,
                        core_user.core_user_surname as surname,
                        core_user.core_user_create_dt as created,
                        core_user.core_user_last_activity as activity,
                        core_user_type.core_user_type_id,
                        core_user_type_translation.core_user_type_translation_name as `type`
                        
                    FROM core_user
                    
                    LEFT JOIN core_user_type
                    ON(core_user_type.core_user_type_id = core_user.core_user_type)
                    
                    LEFT JOIN core_user_type_translation
                    ON(core_user_type_translation.core_user_type_type_id = core_user_type.core_user_type_id
                    AND core_user_type_translation.core_user_type_translation_language = 'eng')
                    
                    ORDER BY core_user.core_user_create_dt
               ";
        $result = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }
}

