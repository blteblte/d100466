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
        if (isset($_SESSION['username'])) {return $_SESSION['username'];}
        else {return '';}
    }
    
    /**
    * en: Gets logedin user password hash
    * lv: Saņem ielogotā lietotāja parloes hash vērtību
    *
    * @return	string     @$_SESSION['password']	password hash
    */
    public static function ActiveUserPwHash(){
        if (isset($_SESSION['password'])) {return $_SESSION['password'];}
        else {return '';}
    }
    
    /**
    * en: Gets Users AccessLevel
    * lv: Saņem lietotāja piekļuves tiesības
    *
    * @return	int     @$_SESSION['accesslevel']	AccessLevel
    */
    public static function GetUserAccessLevel(){
        if (isset($_SESSION['loggedin'])) {return $_SESSION['accesslevel'];}
        else {return AccessLevels::DEFAULT_ACCESS_LEVEL;}
    }
    
    /**
    * en: Gets Active user ID
    * lv: Saņem pieslēgtā lietotāja ID
    *
    * @return	int     @$_SESSION['accesslevel']	AccessLevel
    */
    public static function GetActiveUser(){
        if (isset($_SESSION['loggedin'])){return $_SESSION['user'];}
    }
}

