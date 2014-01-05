<?php
/*
 *  Framework @d100466 -2014-
 * 
 *  Controlls ASYNC commands
 */
require_once '../Site.php';
require_once '../controller.php';

class async extends controller
{
    private $query;
    private $data;
    
    public function controller_async($get, $post) {
        $this->query = $get;
        $this->data = $post;
    }
    public function query() {return $this->query;}
    public function data() {return $this->data;}
}

/*
 *  Parsing AJAX request
 */

$get = $_GET;
$post = $_POST;

if(isset($_GET['module'])){
    $async = new async($get, $post);
    $async->start();
    
    $module = $_GET['module'];
    $command ='async__' . $_GET['command'];
    $module_url = Site::module_url();
    
    include "{$module_url}{$module}.php";
    //$q = $async->query();
    //$d = $async->data();
    
    $async_instance = new $module(false, false, $async->db());
    $async_instance->$command($get, $post);
    $async->end();
 }