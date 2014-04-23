<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

class UserInput
{
    CONST MALICIOUS_USER_INPUT = "Sagaidāmais datu formāts nav pareizs!";
    
    public static function Number($var)
    {
        return (is_numeric($var)) ? $var : die(json_encode(UserInput::MALICIOUS_USER_INPUT));
    }
    
    public static function Letters($subject)
    {
        return (preg_match('/^\p{L}+$/u', $subject)) ? $subject : die(json_encode(UserInput::MALICIOUS_USER_INPUT));
    }
    
    public static function Email($subject)
    {
        return (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $subject))
        ? $subject : die(json_encode(UserInput::MALICIOUS_USER_INPUT));
    }
    
    // en: Matches UTF8 letters, numbers
    public static function UserName($subject)
    {
        return (preg_match('/^(\p{L}|\p{N})[(\p{L}|\p{N}) _.-]+$/u', $subject))
        ? $subject : die(json_encode(UserInput::MALICIOUS_USER_INPUT));
    }
    
    public static function PhoneNumber($subject)
    {
        return (preg_match('/^[\+0-9\-\(\)\s]*$/', $subject))
        ? $subject : die(json_encode(UserInput::MALICIOUS_USER_INPUT));
    }
    
    public static function CreditCard($subject)
    {
        $instance = new UserInput();
        return ($instance->luhn_check($subject)) ? $subject : die(json_encode(UserInput::MALICIOUS_USER_INPUT));
    }
    
    
    /* Luhn algorithm number checker - (c) 2005-2008 shaman - www.planzero.org *
     * This code has been released into the public domain, however please      *
     * give credit to the original author where possible.                      */
    function luhn_check($number)
    {
      $number=preg_replace('/\D/', '', $number);
      $number_length=strlen($number);
      $parity=$number_length % 2;

      $total=0;
      for ($i=0; $i<$number_length; $i++) {
        $digit=$number[$i];
        if ($i % 2 == $parity) {
          $digit*=2;
          if ($digit > 9) {$digit-=9;}
        }
        $total+=$digit;
      }
      return ($total % 10 == 0) ? TRUE : FALSE;
    }
}

