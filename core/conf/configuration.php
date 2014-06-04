<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/


// en: Path configuration for site. Can use in localhost as well as server.
// lv: Ceļu konfigurācija gan localhost gan serverim.

$server = $_SERVER['DOCUMENT_ROOT'];

// en: You can define subpath and phpAjax will see this as your site root
// lv: Var definēt apakšceļu un phpAjax to uztvers kā saita saimniekmapi
    $root = '/d100466';

// en: Use this in server configuration.
// lv: Lietot šo servera konfigurācijai
    //$root = '';


// en: Call this using static functions defined in /core/Site.php
// lv: Izsaukt šo izmantoot statiskās funkcijas definētas /core/Site/php
return array(
    "home_url"      => "{$server}{$root}/",
    "base_url"      => "{$root}/",
    "module_url"    => "{$server}{$root}/modules/",
    "view_url"      => "{$server}{$root}/views/",
    "js_url"        => "{$root}/js/",
    "template_url"  => "{$server}{$root}/templates/",
    "css_url"       => "{$root}/templates/",
    "template_virtual"       => "{$root}/templates/",
    "data"          => "{$server}{$root}/data/",
    "virtual_module"=> "{$root}/modules/"
);
