<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

class controller
{
    private $db;
    
    /**
    * en: Get the DB connection string and instance
    * lv: Saņemt DB pieslēguma rindu un instanci
    * 
    * @param    string	@host	MySQL host
    * @param    string	@dbname	MySQL DB name
    * @param    string	@user	MySQL user name
    * @param    string	@pass	MySQL user password
    *
    * @return	void    sets class property as connection instance which is later inherited
    */
    public function controller_descriptor($host, $dbname, $user, $pass) {
        $this->Db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
    }
    
    /**
    * en: Starting connection to DB
    * lv: Sākam pieslēgumu DB
    *
    * @return	void
    */
    public function start() {
        $config = (include 'conf/db_connect.php');
        $this->controller_descriptor($config['host'], $config['dbname'], $config['user'], $config['pass']);
    }
    
    /**
    * en: Atgriež DB instanci
    * lv: Atgriež DB isntanci
    *
    * @return	PDO:object  PDO object instance 
    */
    public function db() {
        return $this->Db;
    }
    
    /**
    * en: Destroy DB connection
    * lv: Iznīcina DB pieslēgumu
    *
    * @return	PDO:object  PDO object instance 
    */
    public function end() {
        $this->Db = NULL;
    }
}
