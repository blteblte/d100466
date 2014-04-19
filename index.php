<?php
/*
 * M.Bitenieks @ Daugavpils Universitate
 * y: 2014
 * 
 * Simple framweork to process AJAX based web development
 */

session_start();

$config = (include 'core/Site.php');
require_once 'core/controller.php';
require_once 'core/UserManager.php';

$connection = new controller();
$connection->start();

$get = $_GET;
$post = $_POST;

//Static requests via URL
    if(isset($_GET['module'])){

        $module = $_GET['module'];
        $module_url = Site::module_url();

        include "{$module_url}{$module}/{$module}.php";


        $load = new $module($get, $post, $connection->db());
     }
     else {
         //define default module to be loaded
        $module_url = Site::module_url();
        include "{$module_url}Home/Home.php";
        $load = new Home(NULL, NULL, $connection->db());
     }
 
 $connection->end();
 
//Pievienot galveno TEMPLATE
include Site::template_url() . 'default/default.php';