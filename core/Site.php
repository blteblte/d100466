<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

// en: included core components
// lv: pievienotās kodola komponentes
require_once 'controller.php';
require_once 'AccessLevels.php';
require_once 'UserInput.php';
require_once 'UserManager.php';
require_once 'ProjectConstants.php';

// en: Class of static functions returning cinfiguration values
// lv: Statisku funkciju klase kas atgriež konfigurācijas vērtības
class Site
{
    CONST URL_PREFIX = "?module=";
    
    private $url;
    
    public function site_descriptor($action) {
        $config = (include 'conf/configuration.php');
        $this->Url = $config[''.$action.''];
        return $this->Url;
    }
    
    /**
    * en: Get URL
    * lv: Saņemt URL
    * 
    * @param    none
    *
    * @return	string     @success	URL
    */
    public static function home_url()       {return site_get('home_url');}
    public static function base_url()       {return site_get('base_url');}
    public static function module_url()     {return site_get('module_url');}
    public static function view_url()       {return site_get('view_url');}
    public static function js_url()         {return site_get('js_url');}
    public static function template_url()   {return site_get('template_url');}
    public static function css_url()        {return site_get('css_url');}
    public static function template_virtual()        {return site_get('template_virtual');}
    public static function data()           {return site_get('data');}
    public static function virtual_module() {return site_get('virtual_module');}
}
    function site_get($action) {$site_instance = new Site; return $site_instance->site_descriptor($action);}
    
