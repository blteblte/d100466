<?php

class AdminFeedback {
    
    protected $db;
    protected $query;
    protected $data;
    protected $title = 'Atsauksmes';
    
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
    
    public function getFeedbackData(){
        $html = '';
        
        $feedbacks = CommentContext::getAllComments($this->db());
        foreach($feedbacks as $fb)
        {
            $User = UserContext::getUser($this->db(), $fb->user_id);
            $html .= '<section class="f-comment-section" id="fb_' . $fb->id . '">'
                        . '<span class="f-uname">Lietotājs: ' . $User->username . '</span>'
                        . '<span class=f-uid>ID: ' . $User->user_id . '</span>'
                        . '<span class="f-comment">' . $fb->content . '</span>'
                        . '<span class="f-delete" onclick="CommentControl.Delete(' . $fb->id . ')">X</span>'
                    . '</section>';
        }
        return $html;
    }

    public function renderDataLayer(){
        require_once Site::data() . 'Comment.php';
        require_once Site::data() . 'User.php';
    }
    
    public function async__DeleteComment($query, $data) {
        $result = 0;
        if (UserManager::GetUserAccessLevel() >= AccessLevels::ADMIN_ACCESS_LEVEL)
        {
            if (isset($query["comment_id"]))
            {
                $comment_id = intval($query["comment_id"]);
                $Comment = CommentContext::getComment($this->db(), $comment_id);
                $Comment->Delete();
                $result = 1;
            }
        }
        die(json_encode($result));
    }

}

