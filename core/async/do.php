<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

 // en: Core: Module: Controlling ASYNCHRONOUS calls. You can use 2 types of calls in current version:
 // - To call modules defined in /root/Modules/
 // - To call system extensions defined in /root/core/nameofextensionmodule/
 // lv: Core: Module: Kontrolē ASINHRONOS izsaukumus. Dotajā versijā var izmantot 2 tipus asinhrono
 // pieprasījumu veikšanai:
 // - Lai izsauktu moduļus definētus /root/Modules/
 // - Lai izsauktu sistēmmoduļus definētus /root/core/sistēmmoduļanosaukums/
 
 session_start();

 // en: Adding configuration methods
 // lv: Pievienojam konfigurācijas metodes
require_once '../Site.php';
 
 // en: Adding DB connection instance
 // lv: Pievienojam DB pieslēguma instanci
require_once '../controller.php';

 // en: Including AccessLevels
 // lv: Pievienojam piekļuves tiesību definīcijas
require_once '../AccessLevels.php';

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

// en: Parsing AJAX request.
//  - Define ?system=true, &sysmodule=foldername, &module=modulename to call system modules
//  - Define ?module=modulenameandfoldername to call modules
// lv: Apstrādājam AJAX pieprasījumu.
//  - Definējam ?system=true, &sysmoule=mapesnosaukums, &module=moduļanosaukums lai izsauktu sistēmmoduļus
//  - Definējam ?module=moduļaunmapesnosaukums lai izsauktu moduli

$get = $_GET;
$post = $_POST;

    if(isset($_GET['system']) == 'true')
    {
        if(isset($_GET['sysmodule']))
        {
            if(isset($_GET['module']))
            {
                $async = new async($get, $post);
                $async->start();
                
                $module = $_GET['module'];
                $path = $_GET['sysmodule'];
                $command ='async__' . $_GET['command'];
                $home = Site::home_url();
                
                include "{$home}/core/{$path}/{$module}.php";
                
                $async_instance = new $module(false, false, $async->db());
                $async_instance->renderDataLayer();
                $async_instance->$command($get, $post);
                $async->end();
            }
        }
    }
    else
    {
        if(isset($_GET['module']))
        {
            $async = new async($get, $post);
            $async->start();

            $module = $_GET['module'];
            $command ='async__' . $_GET['command'];
            $module_url = Site::module_url();

            include "{$module_url}{$module}/{$module}.php";

            $async_instance = new $module(false, false, $async->db());
            $async_instance->renderDataLayer();
            $async_instance->$command($get, $post);
            $async->end();
        }
    }
