<?php

class AdminUsers {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Module';
    
    public function AccessLevel() {
        return AccessLevels::ADMIN_ACCESS_LEVEL;
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

    public function renderDataLayer(){
        require_once Site::data() . 'User.php';
    }
    
    protected function RenderUsersTableRows()
    {
        $Users = UserContext::getAllUsers($this->db());
        
        $html = '';
        foreach ($Users as $User)
        {
            $date = new DateTime($User->reg_dt);
            $dt = $date->format('Y-m-d');
            
            $html .= "<div id=\"user_{$User->user_id}\" class=\"row\">"
                        . "<span>{$User->username}</span>"
                        . "<span>{$User->email}</span>"
                        . "<span>{$User->nickname}</span>"
                        . "<span>{$User->fname}</span>"
                        . "<span>{$User->lname}</span>"
                        . "<span class=\"dt\">{$dt}</span>"
                     . "</div>"
                        . "<span class=\"option option_{$User->user_id}\" onclick=\"showEditPanel({$User->user_id})\">REDIĢĒT</span>"
                        . "<span class=\"option option_{$User->user_id}\" onclick=\"deleteUser({$User->user_id})\">DZĒST</span>";
                        
            $html .= "<div id=\"edit_{$User->user_id}\" class=\"row edit-row\" style=\"display:none\">"
                        . "<span><input type=\"text\" value=\"{$User->username}\" id=\"username_{$User->user_id}\" /></span>"
                        . "<span><input type=\"text\" value=\"{$User->email}\" id=\"email_{$User->user_id}\" /></span>"
                        . "<span><input type=\"text\" value=\"{$User->nickname}\" id=\"nickname_{$User->user_id}\" /></span>"
                        . "<span><input type=\"text\" value=\"{$User->fname}\" id=\"fname_{$User->user_id}\" /></span>"
                        . "<span><input type=\"text\" value=\"{$User->lname}\" id=\"lname_{$User->user_id}\" /></span>"
                        . "<span>{$dt}</span>"
                    . "</div>"
                        . "<span class=\"option edit_option_{$User->user_id}\" onclick=\"hideEditPanel({$User->user_id})\" style=\"display:none\">ATCELT</span>"
                        . "<span class=\"option edit_option_{$User->user_id}\" onclick=\"saveUserData({$User->user_id})\" style=\"display:none\">SAGLABĀT</span>";
        }
        return $html;
    }
    
    public function async__DeleteUser($query, $data) {
        $result = 0;
        if (UserManager::GetUserAccessLevel() >= AccessLevels::ADMIN_ACCESS_LEVEL)
        {
            if (isset($query['id']))
            {
                $user_id = intval($query['id']);
                if ($user_id !== 0)
                {
                    $User = UserContext::getUser($this->db(), $user_id);
                    $result = $User->Delete();
                }
            }
        }
        
        die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }
   
   public function async__EditUser($query, $data) {
       $result = 0;
       if (UserManager::GetUserAccessLevel() >= AccessLevels::ADMIN_ACCESS_LEVEL)
       {
           if (isset($query['id']))
           {
               $id = $query['id'];
               $User = UserContext::getUser($this->db(), $id);
               $User->username = $query['username'];
               $User->email = $query['email'];
               $User->nickname = $query['nickname'];
               $User->fname = $query['fname'];
               $User->lname = $query['lname'];
               $result = $User->Update();
           }
       }
       die(json_encode(array('status'=>'OK', 'data'=>$result)));
   }

}

