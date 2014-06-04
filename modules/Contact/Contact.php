<?php

class Contact {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Sazinies ar mums!';
    
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
        include ('view.php');
    }

    public function renderDataLayer(){
        include(Site::data() . 'Comment.php');
    }
    
    public function getComment(){
        if (isset($_SESSION['comment_txt'])){
            return $_SESSION['comment_txt'];
        }
        else return "";
    }

    public function async__AddNewComment($query, $data) {
        $result = 0;
        $comment_new = '';
        if (UserManager::GetUserAccessLevel() >= AccessLevels::REGISTERED_ACCESS_LEVEL)
        {
            //new
            $comment = $query['comment'];
            $Com = new Comment($this->db());
            $Com->content = $comment;
            $Com->user_id = UserManager::GetActiveUser();
            $newCommentId = $Com->Insert();
            $result = 1;
            $_SESSION['comment_txt'] = null;
            
            //get
            $Com2 = CommentContext::getComment($this->db(), $newCommentId);
            $comment_new = $Com2->content;
        }
        else
        {
            $result = -1;
        }
        
        if ($result != 1)
        {
            $_SESSION['comment_txt'] = $query['comment'];
        }
        
        die(json_encode(array('status' => 'OK', 'data' => $result, 'comment' => $comment_new)));
    }
}

