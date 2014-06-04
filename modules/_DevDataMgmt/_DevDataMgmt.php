<?php

class _DevDataMgmt {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Datu abstrakcijas modulis';
    
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
    
    public function GetTableList()
    {
        $html = '';
        $modules = scandir(Site::data());
        $i = 0;
        foreach($modules as $m)
        {
            if ($i !== 0 && $i !== 1)
            {
                if ($m != "_Data.php")
                {
                    $i_m = substr($m, 0, -4);
                    $html .= '<span class="mgmt-dir btn">' . $i_m . '</span>';
                }
            }
            $i++;
        }
        return $html;
    }

    public function renderDataLayer(){
        
    }
    
    public function CollectDataFileContent($table, $data){
        $str = '';
        
        return $str;
    }
    
    public function CreateFile($tableName, $content)
    {
        $fileName = substr($tableName, 0, -1);
        
        $file = Site::data() . $fileName . '.php';
        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, $content);
        fclose($fh);
    }
    
    public function GenerateTable($tableName, $pk, $pk_type, $pk_size, $values)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$tableName}` ("
             . "  `{$pk}` {$pk_type}{$pk_size} NOT NULL AUTO_INCREMENT,"
             . " PRIMARY KEY(`{$pk}`) )";
    }
    
    
    public function async__AddNewDataAbstraction($query, $data) {
        $result = 0;
        if (UserManager::GetUserAccessLevel() >= AccessLevels::DEVELOPER_ACCESS_LEVEL)
        {
            if (isset($data['data-table-name']))
            {
                $tableName = $data['data-table-name'] + "s";
                $className = $data['data-table-name'];
                
                if (isset($data['data-pk']) && isset($data['data-type']))
                {
                    $pk = $data['data-pk'];
                    $pk_type = $data['data-type'];
                    $pk_size = '';
                    
                    if (isset($data['data-size']) && $data['data-size'] != '') $pk_size = "(" . $data['data-size'] . ")";
                    
                }
                
                //$result = 1;
            }
        }
        die(json_encode($result));
    }

}

