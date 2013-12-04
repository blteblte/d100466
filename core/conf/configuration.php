<?php
/*
 *  END url must contain all slashes including the one after url
 */

//$server = '';
//$root = '.';
$server = $_SERVER['DOCUMENT_ROOT'];
$root = '/d100466';

return array(
    "home_url"=>"{$server}{$root}/",
	"base_url"=>"{$root}/",
    "module_url"=>"{$server}{$root}/modules/",
    "view_url"=>"{$server}{$root}/views/",
    "js_url"=>"{$root}/js/",
    "template_url"=>"{$server}{$root}/templates/",
    "css_url"=>"{$root}/templates/css/",
    "img_url"=>"{$root}/templates/img/"
    
);

