<?php
/*
 *  END url must contain all slashes including the one after url
 */

$server = $_SERVER['DOCUMENT_ROOT'];

//folder for localhost
    $root = '/d100466';

//root on server
    //$root = '';

return array(
    "home_url"=>"{$server}{$root}/",
    "base_url"=>"{$root}/",
    "module_url"=>"{$server}{$root}/modules/",
    "view_url"=>"{$server}{$root}/views/",
    "js_url"=>"{$root}/js/",
    "template_url"=>"{$server}{$root}/templates/",
    "css_url"=>"{$root}/templates/",
    "img_url"=>"{$root}/templates/img/",
    "data"=>"{$server}{$root}/data/",
    "virtual_module"=>"{$root}/modules/"
    
);
