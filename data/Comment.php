<?php
/**
* phpAJAX simple framework for agile AJAX development
* 
* @author Mārtiņš Bitenieks
* @licence http://www.opensource.org/licenses/mit-license.html MIT License
* @version Look at /index.php
*/

class Comment
{
    protected $con;
    public function db() {return $this->con;}
    
    public $data = array(
        'id', 'content', 'user_id'
    );
    
    protected $pk = 'id';
    
    public      $id,
                $content,
                $user_id;
    
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
            if ($this->$col != null) {$DBDATA[":{$col}"] = htmlentities($this->$col);}
        }
        //return $statement->execute($DBDATA) or die(print_r($statement->errorInfo(), true));
        $statement->execute($DBDATA);
        
        return $this->db()->lastInsertId();
    }
    
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
    
    public function Delete(){
        $table = get_class($this) . 's';
        $pk = $this->pk;
        
        $sql = "DELETE FROM {$table} WHERE {$pk} = {$this->$pk}";
        $this->db()->query($sql);
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
            $data[$i] = new $obj($this->db());
            
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

class CommentContext
{
    public static function getAllComments($con)
    {
        $Users = new Comment($con);
        return $Users->GetAll();
    }
    
    public static function getComment($con, $id)
    {
        $User = new Comment($con);
        return $User->Get($id);
    }
}

