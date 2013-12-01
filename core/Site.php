<?php

class Site
{
    private $url;
    
    public function site_descriptor($action) {
        $config = (include '/conf/configuration.php');
        $this->Url = $config[''.$action.''];
        return $this->Url;
    }

    public static function home_url() {return site_get('home_url');}
    public static function module_url() {return site_get('module_url');}
    public static function view_url() {return site_get('view_url');}
    public static function js_url() {return site_get('js_url');}
    public static function template_url() {return site_get('template_url');}
    public static function css_url() {return site_get('css_url');}
    public static function img_url() {return site_get('img_url');}
    
    
}
    function site_get($action) {$site_instance = new Site; return $site_instance->site_descriptor($action);}
    