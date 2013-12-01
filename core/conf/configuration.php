<?php
/*
 *  END url must contain all slashes including the one after url
 */

//$server = '';
//$root = '.';
$server = $_SERVER['DOCUMENT_ROOT'];
$root = '/LatInSoft';

return array(
    "home_url"=>"{$server}{$root}/",
    "module_url"=>"{$server}{$root}/modules/",
    "view_url"=>"{$server}{$root}/views/",
    "js_url"=>"{$root}/js/",
    "template_url"=>"{$server}{$root}/templates/",
    "css_url"=>"{$root}/templates/css/",
    "img_url"=>"{$root}/templates/img/"
    
);

