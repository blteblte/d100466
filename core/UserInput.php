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
    CONST ERROR_PREFIX = "Malicious user input: ";
    
    CONST MALICIOUS_USER_INPUT      = "Please check your data!",
          NUMBER                    = "Expecting number!",
          LETTERS                   = "Expecting letters (UTF8 apply)!",
          EMAIL                     = "Providen email address is not valid!",
          STD_USERNAME              = "STD: uname : Allowed letters, numbers, dashes, braces and aphostrohpes!",
          PHONE_NUMBER              = "Providen phone number is not valid!",
          CREDIT_CARD               = "Credit card number is not valid!";
    
    public static function Number($var)
    {
        return (is_numeric($var))
        ? $var : die(json_encode(UserInput::ERROR_PREFIX . UserInput::EXPECTING_NUMBER));
    }
    
    public static function Number_AllowEmpty($var)
    {
        if (Trim($var) === '') return 0;
        else
        {
            return UserInput::Number($var);
        }
    }
    
    
    public static function LettersName($subject)
    {
        return (preg_match('/^[-\' \p{L}]+$/u', $subject))
        ? $subject : die(json_encode(UserInput::ERROR_PREFIX . UserInput::LETTERS));
    }
    
    public static function LettersName_AllowEmpty($subject)
    {
        if (Trim($subject) === '') return '';
        else
        {
            return UserInput::LettersName($subject);
        }
    }
    
    
    public static function Email($subject)
    {
        return (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $subject))
        ? $subject : die(json_encode(UserInput::ERROR_PREFIX . UserInput::EMAIL));
    }
    
    public static function Email_AllowEmpty($subject)
    {
        if (Trim($subject) === '') return '';
        else
        {
            return UserInput::Email($subject);
        }
    }
    
    // en: Matches UTF8 letters, numbers, and STD allowed symbols for usernames
    public static function UserName($subject)
    {
        return (preg_match('/^(\p{L}|\p{N})[(\p{L}|\p{N}) _.-]+$/u', $subject))
        ? $subject : die(json_encode(UserInput::ERROR_PREFFIX . UserInput::STD_USERNAME));
    }
    
    public static function UserName_AllowEmpty($subject)
    {
        if (Trim($subject) === '') return '';
        else
        {
            return UserInput::UserName($subject);
        }
    }
    
    public static function PhoneNumber($subject)
    {
        return (preg_match('/^[\+0-9\-\(\)\s]*$/', $subject))
        ? $subject : die(json_encode(UserInput::ERROR_PREFFIX . UserInput::PHONE_NUMBER));
    }
    
    public static function PhoneNumber_AllowEmpty($subject)
    {
        if (Trim($subject) === '') return '';
        else
        {
            return UserInput::PhoneNumber($subject);
        }
    }
    
    public static function CreditCard($subject)
    {
        $instance = new UserInput();
        return ($instance->luhn_check($subject))
        ? $subject : die(json_encode(UserInput::ERROR_PREFFIX . UserInput::CREDIT_CARD));
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

