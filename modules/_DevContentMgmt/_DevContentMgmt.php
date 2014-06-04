<?php

class _DevContentMgmt {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Satura Daļu modulis';
    
    public function AccessLevel() {
        return AccessLevels::DEVELOPER_ACCESS_LEVEL;
    }

    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }

    public function db() {return $this->db;}
    public function title() {echo $this->title;}

    public function renderHTML() {
        $this->renderDataLayer();
            include ('view.php');
    }
    
    public function GetModuleList()
    {
        $html = '';
        $modules = scandir(Site::module_url());
        $i = 0;
        foreach($modules as $m)
        {
            if ($i !== 0 && $i !== 1)
            {
                if (file_exists(Site::module_url() . $m . "/" . $m . ".php"))
                {
                    $html .= '<span class="mgmt-dir btn">' . $m . '</span>';
                }
            }
            $i++;
        }
        return $html;
    }

    public function renderDataLayer(){
        
    }
    
    public function CollectModuleFileContent($module, $title){
        $str = '<?php

class ' . $module . ' {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = \'' . $title . '\';
    
    public function AccessLevel() {
        return AccessLevels::DEFAULT_ACCESS_LEVEL;
    }

    public function __construct($query, $data, $db) {
        $this->db = $db;
        $this->query = $query;
        $this->data = $data;
    }

    public function db() {return $this->db;}
    public function title() {echo $this->title;}

    public function renderHTML() {
        $this->renderDataLayer();
            include (\'view.php\');
    }

    public function renderDataLayer(){
        
    }
    
    public function async__functionname($query, $data) {
        //die(json_encode());
    }

}';
        //return str_replace(' ', '&nbsp;', $str);
        return $str;
    }
    
    public function CollectJsFileContent(){
        $str = '$(function(){
    setTimeout(function(){$(\'.page-content\').fadeIn(300, function(){
            $(this).parent().animate({width: "800px", marginLeft: "0px"});
    });}, 300);
    
});';
        //return str_replace(' ', '&nbsp;', $str);
        return $str;
    }
    
    public function CollectViewContent()
    {
        $str = '<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

';
        //return str_replace(' ', '&nbsp;', $str);
        return $str;
    }
    
    public function CreateModuleFile($fileName, $content, $ext)
    {
        $file = Site::module_url() . $fileName . '/' . $fileName . $ext;
        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, $content);
        fclose($fh);
    }
    
    public function CreateFile($fileName, $content, $ext)
    {
        $file = Site::module_url() . $fileName . '/this' . $ext;
        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, $content);
        fclose($fh);
    }
    
    public function CreateViewFile($fileName, $content, $ext)
    {
        $file = Site::module_url() . $fileName . '/view' . $ext;
        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, $content);
        fclose($fh);
    }
    
    public function CreateModuleDir($module)
    {
        if (!mkdir(Site::module_url() . $module . '/', 0777, true)) {
            die('Failed to create module directory...');
        }
    }
    
    
    public function async__AddNewModule($query, $data) {
        $result = 0;
        if (UserManager::GetUserAccessLevel() >= AccessLevels::DEVELOPER_ACCESS_LEVEL)
        {
            if (isset($query['M']))
            {
                $module = $query['M'];
                $title = $query['T'];
                
                $this->CreateModuleDir($module);
                
                $PHP_file_content = $this->CollectModuleFileContent($module, $title);
                $this->CreateModuleFile($module, $PHP_file_content, '.php');
                
                $JS_file_content = $this->CollectJsFileContent();
                $this->CreateFile($module, $JS_file_content, '.js');
                        
                $View_file_content = $this->CollectViewContent();
                $this->CreateViewFile($module, $View_file_content, '.php');
                
                $this->CreateFile($module, '', '.css');
                
                $result = 1;
            }
        }
        die(json_encode($result));
    }

}

