<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

class UserManager
{
    /**
    * en: Checks if loged in parameter is set
    * lv: Pārbauda vai pieslēguma parametrs ir uzrādīts
    *
    * @return	int     @$_SESSION['loggedin']	? 1 : 0
    */
    public static function UserIsLogedIn(){
       if (isset($_SESSION['loggedin'])) {return $_SESSION['loggedin'];}
    }
    
    /**
    * en: Gets logedin username
    * lv: Saņem ielogotā lietotāja lietotājvārdu
    *
    * @return	string     @$_SESSION['username']	username
    */
    public static function ActiveUserName(){
        if (isset($_SESSION['username'])) return $_SESSION['username'];
        else return '';
    }
    
    /**
    * en: Gets logedin user password hash
    * lv: Saņem ielogotā lietotāja parloes hash vērtību
    *
    * @return	string     @$_SESSION['password']	password hash
    */
    public static function ActiveUserPwHash(){
        if (isset($_SESSION['password'])) return $_SESSION['password'];
        else return '';
    }
}

