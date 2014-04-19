<?php

class User
{
    protected $con;
    public function db() {return $this->con;}
    
    //column names
    public $data = array(
        'user_type', 'username', 'nickname',
        'password', 'email', 'reg_dt', 'phone', 'address',
        'fname', 'lname', 'birthday', 'allow_multiple_sessions',
        'session_token', 'active_ip', 'admin_description'
    );
    
    protected $pk = 'user_id';
    
    //columns
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
    
    public function __construct($con)
    {
        $this->con = $con;
    }
    
    public function getNullColumnsCount(){
        $count = 0;
        foreach($this->data as $col)
        {
            if($this->$col == null) $count++;
        }
        return ($count + 1);
    }
    
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
            if ($this->$col != null) $DBDATA[":{$col}"] = $this->$col;
        }
        $statement->execute($DBDATA);
        return 1;
    }
    
    public function Update(){
        $nullColumns = $this->getNullColumnsCount();
        $table = get_class($this) . 's';
        $sql = "UPDATE {$table} SET (";
        
        $i = 0;
        foreach($this->data as $col){ 
            if ($this->$col != null)
            {
                $sql .= "{$col} = :{$col}";
                if ($i < (count($this->data) - $nullColumns)) {$sql .= ',';}
                $i++;
            }
        }
        $sql .= ") WHERE {$this->pk} = {$this->$this->pk}";
        $DBDATA = array();
        
        $statement = $this->db()->prepare($sql);
        foreach($this->data as $col)
        {
            if ($this->$col != null) $DBDATA[":{$col}"] = $this->$col;
        }
        $statement->execute($DBDATA);
        return 1;
    }
    
    public function GetAll(){
        $data = array();
        $table = get_class($this) . 's';
        $obj = get_class($this);
        
        $sql = "SELECT * FROM {$table}";
        $t_data = $this->db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        $i = 0;
        foreach($t_data as $d)
        {
            $data[$i] = new $obj(null);
            
            $data[$i]->{$this->pk} = $d["{$this->pk}"];
            foreach($this->data as $col){ 
                $data[$i]->{$col} = $d["{$col}"];
            }
            $i++;
        }
        return $data;
    }
    
    public function Get($id){
        $table = get_class($this) . 's';
        $obj = get_class($this);
        
        $sql = "SELECT * FROM {$table} WHERE {$this->pk} = ':id'";
        $statement = $this->db()->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $t_data = $statement->fetch(PDO::FETCH_ASSOC);
        
        $object = new $obj(null);
        foreach($this->data as $col){ 
            $object->$col = $t_data["{$col}"];
        }
        return $object;
    }
    
}

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

