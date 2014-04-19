<?php

//System module -> Lietotāja reģistrēšana

class registration {
    
    CONST USER_TYPE_SIMPLE_USER = 4;
    
    protected $db;
    protected $query;
    protected $data;
    
    public $UsersDataColumns = array();
    public $UsersData = array();
    
    //Inicializējam savienojumu ar DB dotajam modulim
    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    public function db() {return $this->db;}
    
    public function renderDataLayer(){
        include(Site::data() . 'User.php');
    }
    
    //Asinhron funkcija
    public function async__CheckIfUserNameIsFree($query, $data) {
        $valid = 1;
        $email = '';
        if (isset($query['email']))
        {
            $email = $query['email'];
        }
        else {$valid = 0;}
        
        $sql = "SELECT COUNT(*) FROM Users WHERE `email` = :email ";
        $statement = $this->db()->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_NUM);
        
        if ($result[0] > 0) {$valid = 0;}
        die(json_encode($valid));
   }
   
   public function async__CheckIfUnameIsFree($query, $data) {
        $valid = 1;
        $uname = '';
        if (isset($query['uname']))
        {
            $uname = $query['uname'];
        }
        else {$valid = 0;}
        
        $sql = "SELECT COUNT(*) FROM Users WHERE `username` = :uname ";
        $statement = $this->db()->prepare($sql);
        $statement->bindParam(':uname', $uname, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_NUM);
        
        if ($result[0] > 0) {$valid = 0;}
        die(json_encode($valid));
   }
   
   public function async__RegisterNewUser($query, $data) {
       
       //lietotāja paroļu skriptēšanas saderības bibliotēka ar vecākām PHP versijām
       require_once Site::home_url().'core/registration/password.php';
       
       $uname = ''; $email = ''; $pw = '';
       $success = 0;
       
       if (isset($data["reg-uname"]))
       {
           $uname = $data["reg-uname"];
       }
       if (isset($data["reg-email"]))
       {
           $email = $data["reg-email"];
       }
       if (isset($data["reg-pw"]))
       {
           //noklusējuma algoritms var mainīties: lietojiet lauku ar izmēru (255)
           $pw = password_hash($data["reg-pw"], PASSWORD_DEFAULT);
       }
       
       if ($uname != '' && $email != '' && $pw != '')
       {
           $sql = "SELECT COUNT(*) FROM Users WHERE `username` = '{$uname}' ";
           $result = $this->db()->query($sql)->fetch(PDO::FETCH_NUM);
        
           if ($result[0] > 0) {die(json_encode($success));}
           else
           {
               $this->renderDataLayer();
               $NewUser = new User($this->db());

               $NewUser->user_type = registration::USER_TYPE_SIMPLE_USER;
               $NewUser->username = $uname;
               $NewUser->email = $email;
               $NewUser->password = $pw;

               $success = $NewUser->Insert();
               $this->loginUser($uname, $pw);
           }
       }
       die(json_encode($success));
   }
   
   public function async__VerifyUser($query, $data) {
       require_once Site::home_url().'core/registration/password.php';
       
       $uname = ''; $pw = ''; $password = '';
       $success = 0;
       
       if (isset($data["login-uname"]))
       {
           $uname = $data["login-uname"];
       }
       if (isset($data["login-pw"]))
       {
           $pw = $data["login-pw"];
       }
       
       if ($uname != '' && $pw != '')
       {
            $sql = "SELECT `password` FROM Users WHERE `username` = '{$uname}' ";
            $result = $this->db()->query($sql)->fetch(PDO::FETCH_NUM);
            if ($result[0] != null)
            {
                if (password_verify($pw, $result[0]))
                {
                    $success = 1;
                    $password = $result[0];
                    if (isset($query["login"]))
                    {
                        if ( intval($query["login"]) == 1)
                        {
                            $this->loginUser($uname, $password);
                        }
                    }
                }
            }
       }
       
       die(json_encode(array('success' => $success, 'username' => $uname, 'password' => $password)));
   }
   
   public function async__Logout(){
       $this->logoutUser();
   }
   
   public function loginUser($uname, $password){
       session_start();
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $uname;
       $_SESSION['password'] = $password;
   }
   
   public function logoutUser(){
       session_start();
       session_destroy();
   }

}

