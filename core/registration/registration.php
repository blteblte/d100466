<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

// en: SysModule for user registration and login
// lv: Sistēmmodulis lietotāja reģistrēšanai un pieslēgšanās operācijas veikšanai

class registration {
    
    protected $db;
    protected $query;
    protected $data;
    
    // en: Init DB connection with the module.
    // lv: Inicializējam savienojumu ar DB dotajam modulim
    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    public function db() {return $this->db;}
    
    public function renderDataLayer(){
        require_once Site::data() . 'User.php';
    }
    
    /**
    * en: Checs if email is free or exists in DB
    * lv: Pārbauda vai epasts ir brīvs vai eksistējošs DB
    * 
    * @param    string	$_GET['email']	email
    *
    * @return	int     @valid	? 1 : 0
    */
    public function async__CheckIfEmailIsFree($query, $data) {
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
   
   /**
    * en: Checs if username is free or exists in DB
    * lv: Pārbauda vai lietotājvārds ir brīvs vai eksistējošs DB
    * 
    * @param	$_GET['uname']	username
    *
    * @return	int     @valid	? 1 : 0
    */
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
   
   /**
    * en: Register and login new user
    * lv: Reģistrēt un pieslēgt jaunu lietotāju
    * 
    * @param    string	$_POST['reg-uname']	username
    * @param    string	$_POST['reg-email']	email
    * @param    string	$_POST['reg-pw']	password
    *
    * @return	int     @success	? 1 : 0
    */
   public function async__RegisterNewUser($query, $data) {
       // en: Compatibility library for elder versions of PHP providing password hashing options
       // lv: Saderības bibiliotēka ar vecākām PHP versijām, kas nodrošina lietotāja paroļu šifrēšanas iespējas
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
           // en: Default encripting alghorythm may change over time. User password fields with (255) size.
           // lv: Noklusējuma kriptēšanas algoritms var mainīties. Izmanto (255) paroles lauka izmēram.
           $pw = password_hash($data["reg-pw"], PASSWORD_DEFAULT);
       }
       
       if ($uname != '' && $email != '' && $pw != '')
       {
           $sql = "SELECT COUNT(*) FROM Users WHERE `username` = :uname ";
           $statement = $this->db()->prepare($sql);
           $statement->bindParam(':uname', $uname, PDO::PARAM_STR);
           $statement->execute();
           $result = $statement->fetch(PDO::FETCH_NUM);
        
           if ($result[0] > 0) {die(json_encode($success));}
           else
           {
               $this->renderDataLayer();
               $NewUser = new User($this->db());

               $NewUser->user_type = AccessLevels::REGISTERED_ACCESS_LEVEL;
               $NewUser->username = $uname;
               $NewUser->email = $email;
               $NewUser->password = $pw;

               $user_id = $NewUser->Insert();
               $this->loginUser($uname, $pw, AccessLevels::REGISTERED_ACCESS_LEVEL, $user_id);
               
               $success = 1;
           }
       }
       die(json_encode($success));
   }
   
   /**
    * en: Verify User. If @login set logs in user
    * lv: Validē lietotāju. Ja @login ir norādīts pieraksta lietotāju sesijā
    * 
    * @param    string	$_POST['login-uname']	username
    * @param    string	$_POST['login-email']	email
    * @param    string	$_POST['login-pw']	    password
    * @param    int 	$_GET['login']  	    flag
    *
    * @return	int     @success	1 : 0
    * @return   string  @uname      username : ''
    * @return   string  @password   password hash : ''
    */
   public function async__VerifyUser($query, $data) {
       // en: Compatibility library for elder versions of PHP providing password hashing options
       // lv: Saderības bibiliotēka ar vecākām PHP versijām, kas nodrošina lietotāja paroļu šifrēšanas iespējas
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
            $sql = "SELECT `password` AS `password`,"
                    . " `user_type` AS `access_level`,"
                    . " `user_id` AS `user_id`"
                    . " FROM Users WHERE `username` = :uname ";
            
            $statement = $this->db()->prepare($sql);
            $statement->bindParam(':uname', $uname, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            
            if ($result['password'] != null)
            {
                if (password_verify($pw, $result['password']))
                {
                    $success = 1;
                    $password = $result['password'];
                    if (isset($query["login"]))
                    {
                        if ( intval($query["login"]) == 1)
                        {
                            $this->loginUser($uname, $password, $result['access_level'], $result['user_id']);
                        }
                    }
                }
            }
       }
       
       die(json_encode(array('success' => $success, 'username' => $uname, 'password' => $password)));
   }
   
   // en: Async - logout user
   // lv: Asonhroni atslēgt lietotāju
   public function async__Logout(){
       $this->logoutUser();
   }
   
   /**
    * en: Login user
    * lv: Pieslēgt lietotāju
    * 
    * @param    string	$uname	username
    * @param    string	$password	password
    *
    * @return	void
    */
   public function loginUser($uname, $password, $access_level, $user_id){
       $_SESSION['loggedin']    = true;
       $_SESSION['accesslevel'] = $access_level;
       $_SESSION['user']        = $user_id;
       $_SESSION['username']    = $uname;
       $_SESSION['password']    = $password;
   }
   
   public function logoutUser(){
       session_destroy();
   }

}

