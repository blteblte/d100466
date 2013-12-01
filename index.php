<?php
/*
 * M.Bitenieks @ LatInSoft
 * y: 2013
 * 
 * Simple framweork to process AJAX based web development
 */

$config = (include '/core/Site.php');

$get = $_GET;
$post = $_POST;

if(isset($_GET['module'])){
    
    $module = $_GET['module'];
    $module_url = Site::module_url();
    
    include "{$module_url}{$module}.php";
    //$q = $async->query();
    //$d = $async->data();
    
    $load = new $module($get, $post, NULL);
 }
 else {
     //define default module to be loaded
    $module_url = Site::module_url();
    include "{$module_url}Module.php";
    $load = new Module(NULL, NULL, NULL);
 }

include Site::template_url() . 'default.php';