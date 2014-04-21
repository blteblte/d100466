<?php
/*
 * Daugavpils Universitate
 * y: 2014
 * 
 * en: Simple framework for AJAX based WEB development
 * lv: Vienkārša sistēma AJAX bāzētu WEB izstrādņu veidošanai.
 * 
 * @author Mārtiņš Bitenieks
 * @licence http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.9
 * 
 */

// en: Define your TITLE prefix in /core/ProjectConstants.php
// lv: Definē sava prjekta TITLE prefiksu /core/ProjectConstants.php

session_start();
// en: Including configuration
// lv: Pievienojam konfigurāciju
$config = (include 'core/Site.php');

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
        
        // en: Checking user rights to access this module
        // lv: Pārbaudām lietotāja tiesības piekļūt šim modulim
        if ($load->AccessLevel() > UserManager::GetUserAccessLevel())
        {
            $module_url = Site::module_url();
            include "{$module_url}Home/Home.php";
            $load = new Home(NULL, NULL, $connection->db());
            
            // en: Default module should always have default access level
            // lv: Noklusējuma modulim vienmēr vajadzētu būt ar noklusējuma piekļuves tiesībām
            if ($load->AccessLevel() > UserManager::GetUserAccessLevel())
            {
                echo "<html><head><title>ERROR</title></head><body><h1>You do not have rights to view this page</h1></body></html>";
                $connection->end();
                return;
            }
        }
     }
     else {
         // en: Define default module to be loaded for root request. Default
         // module should always have default AccessLevel
         // lv: Nodefinējam noklusējuma moduli saimniekmapes pieprasījumiem.
         // Noklusējuma modulim vienmēr vajadzētu būt ar noklusējuma piekļuves
         // tiesībām
        $module_url = Site::module_url();
        include "{$module_url}Home/Home.php";
        $load = new Home(NULL, NULL, $connection->db());
        
        if ($load->AccessLevel() > UserManager::GetUserAccessLevel())
        {
            echo "<html><head><title>ERROR</title></head><body><h1>You do not have rights to view this page</h1></body></html>";
            $connection->end();
            return;
        }
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
