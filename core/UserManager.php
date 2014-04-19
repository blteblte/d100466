<?php

class UserManager
{
    public static function UserIsLogedIn(){
       if (isset($_SESSION['loggedin'])) {return $_SESSION['loggedin'];}
    }
    
    public static function ActiveUserName(){
        if (isset($_SESSION['username'])) return $_SESSION['username'];
        else return '';
    }
    
    public static function ActiveUserPwHash(){
        if (isset($_SESSION['password'])) return $_SESSION['password'];
        else return '';
    }
}

