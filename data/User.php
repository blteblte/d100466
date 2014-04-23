<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

// en: DataLayer creating DB object using information from DB table. With use for single PK tables.
// lv: Datu slānis DB objektu veidošanai izmantojot informāciju par DB tabulu. Lieto vienas PK ietvaros.


// en: Name tables as "Users", but its representiv object as "User". Following: 
// TABLE: "Employees" -> CLASS: "Employee"
// lv: Saukt tabulas kā "Users", bet respektīvajā objektā "User". Sekojoši:
// TABULA: "Employees" -> KLASSE: "Employee"
class User
{
    protected $con;
    public function db() {return $this->con;}
    
    /**
    * en: Define table column names here. DO NOT DEFINE AUTO_INCREMENT KEY HERE!
    * lv: Definēt tabulas kolonnas nosaukumus šeit. NENORĀDĪT AUTO_INCREMENT KOLONNU!
    * 
    * @public param 	array     @data     column names for current object
    */
    public $data = array(
        'user_type', 'username', 'nickname',
        'password', 'email', 'reg_dt', 'phone', 'address',
        'fname', 'lname', 'birthday', 'allow_multiple_sessions',
        'session_token', 'active_ip', 'admin_description'
    );
    
    // en: AUTO_INCREMENT PK column name here
    // lv: AUTO_INCREMENT PK kolonnas nosaukums šeit
    protected $pk = 'user_id';
    
    /**
    * en: Define all columns as public parameters
    * lv: Definēt visus tabulas kolonnas kā publiskos objekta parametrus
    * 
    * @public param
    */
    public      $user_id,
                $user_type,
                $username,
                $nickname,
                $password,
                $email, 
                $reg_dt,
                $phone,
                $address,
                $fname,
                $lname,
                $birthday,
                $allow_multiple_sessions,
                $session_token,
                $active_ip,
                $admin_description;
    
    // en: Get connection instance for object. Use with new Object(@con)
    // lv: Saņemt DB pieslēguma instanci objektam. Lietot ar new Object(@con)
    public function __construct($con)
    {
        $this->con = $con;
    }
    
    /**
    * en: Get count for columns which are left as null for generating query script
    * lv: Saņemt objekta null parametru skaitu SQL skriptu ģenerēšanai
    * 
    * @return	int     @count	count of null columns
    */
    public function getNullColumnsCount(){
        $count = 0;
        foreach($this->data as $col)
        {
            if($this->$col == null) $count++;
        }
        return ($count + 1);
    }
    
    /**
    * en: Generate insert script and executed prepared PDO statement
    * lv: Ģenerē insert skriptu in izpilda sagatavoto PDO pieprasījumu
    * 
    * @return	ID     ID of inserted record
    */
    public function Insert(){
        $nullColumns = $this->getNullColumnsCount();
        $table = get_class($this) . 's';
        $sql = "INSERT INTO {$table} (";
        
        $i = 0;
        foreach($this->data as $col){ 
            if ($this->$col != null)
            {
                $sql .= "{$col}";
                if ($i < (count($this->data) - $nullColumns)) {$sql .= ',';}
                $i++;
            }
        }
        $sql .= ") VALUES (";
        
        $k = 0;
        foreach($this->data as $col){ 
            if ($this->$col != null)
            {
                $sql .= ":{$col}";
                if ($k < (count($this->data) - $nullColumns)) {$sql .= ',';}
                $k++;
            }
        }
        $sql .= ')';
        $DBDATA = array();
        
        $statement = $this->db()->prepare($sql);
        foreach($this->data as $col)
        {
            if ($this->$col != null) {$DBDATA[":{$col}"] = htmlentities($this->$col);}
        }
        //return $statement->execute($DBDATA) or die(print_r($statement->errorInfo(), true));
        $statement->execute($DBDATA);
        
        return $this->db()->lastInsertId();
    }
    
    /**
    * en: Generate update script and executed prepared PDO statement
    * lv: Ģenerē update skriptu in izpilda sagatavoto PDO pieprasījumu
    * 
    * @return	int     ? true : false
    */
    public function Update(){
        $nullColumns = $this->getNullColumnsCount();
        $table = get_class($this) . 's';
        $sql = "UPDATE {$table} SET ";
        
        $i = 0;
        foreach($this->data as $col){ 
            if ($this->$col != null)
            {
                $sql .= "{$col} = :{$col}";
                if ($i < (count($this->data) - $nullColumns)) {$sql .= ',';}
                $i++;
            }
        }
        $sql .= " WHERE {$this->pk} = {$this->{$this->pk}}";
        $DBDATA = array();
        
        $statement = $this->db()->prepare($sql);
        foreach($this->data as $col)
        {
            if ($this->$col != null) {$DBDATA[":{$col}"] = htmlentities($this->$col);}
        }
        //return $statement->execute($DBDATA) or die(print_r($statement->errorInfo(), true));
        return $statement->execute($DBDATA);
    }
    
    /**
    * en: Generate delete scripts for record. Use on existing record
    * lv: Ģenerē dzēsšanas pieprasījumu. Lietot eksistējošam ierakstam
    * 
    * @return	int     ? 1 : null
    */
    public function Delete(){
        $table = get_class($this) . 's';
        $pk = $this->pk;
        
        $sql = "DELETE FROM {$table} WHERE {$pk} = {$this->$pk}";
        $this->db()->query($sql);
        return 1;
    }
    
    /**
    * en: Get all teble data and return object collection
    * lv: Saņem visus tabulas datus un atgriež DB objektu kolekciju
    * 
    * @return   object	@this     collection of DB objects
    */
    public function GetAll(){
        $data = array();
        $table = get_class($this) . 's';
        $obj = get_class($this);
        
        $sql = "SELECT * FROM {$table}";
        $t_data = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        $i = 0;
        foreach($t_data as $d)
        {
            $data[$i] = new $obj($this->db());
            
            $data[$i]->{$this->pk} = $d["{$this->pk}"];
            foreach($this->data as $col){ 
                $data[$i]->{$col} = $d["{$col}"];
            }
            $i++;
        }
        return $data;
    }
    
    /**
    * en: Get all teble data and return object collection
    * lv: Saņem visus tabulas datus un atgriež DB objektu kolekciju
    * 
    * @param    int     @id       id of current object class, PK, AI
    * 
    * @return   object	@this     single object of @this
    */
    public function Get($id){
        $table = get_class($this) . 's';
        $obj = get_class($this);
        $thisId = intval($id);
        
        $sql = "SELECT * FROM {$table} WHERE {$this->pk} = {$thisId}";
        $t_data = $this->db()->query($sql)->fetch(PDO::FETCH_ASSOC);
        
        $object = new $obj($this->db());
        $object->{$this->pk} = $t_data["{$this->pk}"];
        foreach($this->data as $col){ 
            $object->$col = $t_data["{$col}"];
        }
        return $object;
    }
    
}

// en: Static functions to get an instance of class in a single connection to DB
// lv: Statiskās funkcijas lai saglabātu DB pieslēguma instanci
class UserContext
{
    public static function getAllUsers($con)
    {
        $Users = new User($con);
        return $Users->GetAll();
    }
    
    public static function getUser($con, $id)
    {
        $User = new User($con);
        return $User->Get($id);
    }
}

