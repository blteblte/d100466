<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

// en: Basic module example. You can see this as a page. To load this page
// you can call javascript:coreRequestAjax(NameOfCurrentModule, PageTitle)
// for AJAX request or pass /?module=NameOfCurrentModule to /index.php for static request.
//
// lv: Vienkāršs moduļa piemērs. Var uzskatīt šo par lapu. Lai ielādētu šo
// lapu var izsaukt javascript:coreRequestAjax(DotāModuļaNosaukums, LapasVirsraksts)
// izmantojot AJAX, vai nodot /?module=DotāModuļaNosaukums uz /index.php lai pārlādētu lapu pilnībā

class AdminPage {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Administratora Sadaļa';
    
    public function AccessLevel() {
        return AccessLevels::REGISTERED_ACCESS_LEVEL;
    }
    
    /**
    * en: ModuleConstructor: Init DB connection for this module using existing PDO instance. This gets called
    * from /core/async/do.php. You can pass either $_POST or $_GET parameters to module directly
    * 
    * lv: Moduļa Konstruktors: Inicializēt DB savienojumu dotajam modulim izmantojot eksistējošu
    * PDO objekta instanci. Tiek izsaukta no /core.async/do.php. Iespējams nodot $_POST un $_GET
    * parametrus izsaucot moduli
    * 
    * @param    array	        @query	$_GET parameters
    * @param    array	        @data	$_POST parameters
    * @param    PDO::object 	@db 	DB connection
    */
    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }
    
    // en: Use this to gain connection to DB within the module
    // lv: Izmanto šo funkciju lai piekļūtu DB moduļa ietvarā
    public function db() {return $this->db;}
    
    // en: This is used in TEMPLATE to init page Title tags
    // lv: Tiek izmantots ŠABLONĀ lai inicializētu lapas Title tega vērtību
    public function title() {echo $this->title;}
    
    // en: This gets called to fill content part from TEMPLATE.
    // You can have as many content parts as you want.
    // lv: Tiek izsaukts no ŠABLONA lai aizpildītu satura daļas.
    // Var saturēt šāda veida funkcijas cik vien nepieciešams.
    public function renderHTML() {
        $this->renderDataLayer();
        
            // en: Include relevant content part here
            // lv: Pievienojiet nepieciešamo satura daļu šeit
            include ('view.php');
    }

    // en: Init data layer for current Module. Include here all the DB table Objects from /data
    // lv: Inicializējam datu slāni. Pievieno visus nepieciešamos DB objektus no /data šeit
    public function renderDataLayer(){
        // en: example:
        // lv: piemērs:
        //
        // include(Site::home_url() . 'data/TableName.php')
    }
    
    /**
    * en: Async function example called from /core/async/do.php
    * 
    * lv: Asinhronās f-jas piemērs kas tiek izsaukta no /core/async/do.php
    * 
    * @param    array	        @query	$_GET parameters
    * @param    array	        @data	$_POST parameters
    * 
    * @return   vary            choose what to return
    */
    public function async__functionname($query, $data) {
        // en: Return whatever you need for this async function:
        // lv: Atgtiezt visu kas nepieciešams:
        //
        //die(json_encode(array()));
    }

}

