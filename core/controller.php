<?php

class controller
{
    private $db;
    
    public function controller_descriptor($host, $dbname, $user, $pass) {
        $this->Db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
    }
    
    public function start() {
        $config = (include 'conf/db_connect.php');
        $this->controller_descriptor($config['host'], $config['dbname'], $config['user'], $config['pass']);
    }
    
    public function db() {
        return $this->Db;
    }
    
    public function end() {
        $this->Db = NULL;
    }
}
