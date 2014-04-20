<?php
/*
 * M.Bitenieks @ Daugavpils Universitate
 * y: 2014
 * 
 *
 * en: Simple framework for AJAX based WEB development
 * 
 * lv: Vienkārša sistēma AJAX bāzētu WEB izstrādņu veidošanai.
 * 
 *  
 */

session_start();

$config = (include 'core/Site.php');
require_once 'core/controller.php';
require_once 'core/UserManager.php';

// en: Initializing DB connection. Single connection is used for all database queries during single request.
// After request the connection gets closed.
// lv: Inicializējam DB pieslēgumu. Viena servera pieprasījuma laikā tiek lietots tikai viens pieslēgums
// visiem DB queries. Pēc pieprasījuma pieslēgums tiek slēgts.
$connection = new controller();
$connection->start();

$get = $_GET;
$post = $_POST;

// en: Processing static requests via URL or async requests via AJAX
// lv: Apstrādā statiskus pieprasījumus caur URL vai asinhronus pieprasījumus caur AJAX
    if(isset($_GET['module'])){

        $module = $_GET['module'];
        $module_url = Site::module_url();

        include "{$module_url}{$module}/{$module}.php";
        $load = new $module($get, $post, $connection->db());
     }
     else {
         //en: Define default module to be loaded for root request
         //lv: Nodefinējam noklusējuma moduli saimniekmapes pieprasījumiem
        $module_url = Site::module_url();
        include "{$module_url}Home/Home.php";
        $load = new Home(NULL, NULL, $connection->db());
     }
// en: Destroying connection to DB
// lv: Iznīcinām pieslēgmu pie datubāzes
$connection->end();
 
// en: Including template. You can use your own template and/or fully modifiy it's css and completly
// redefine structure. See for documentation about modules to learn how you can create and call
// content parts via AJAX.
// lv: Pievienojam šablonu. Var izmantot savu šabloni vai/un pilnībā modificēt esošo - 
// tai skaitā pilnībā pārdefinēt šablona struktūru. Skatīt dokumentāciju par moduļiem lai 
// uzzinātu kā, izmantojot AJAX, veidot un izsaukt savas satura sadaļas
include Site::template_url() . 'default/default.php';
