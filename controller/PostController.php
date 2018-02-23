<?php
class PostController{
    public function actionIndex($id,$page=1){
        $total= Post::countAllPosts($id);
        $pagination=new Pagination($total, $page, Post::SHOW_BY_DEFAULT, 'page-');
        $post= Post::getAllPosts($id,$page);
        require_once(ROOT.'/views/post/index.php');           
        return true;        
        
    }
    
    public function actionFull($id){
       $fullPost= Post::getOnePostById($id);
      /* if(!User::isGuest()){
             $author = User::checkLogged();
             $parent=0;
            $text=$_POST['text'];
            Comments::createComment($author, $text, $id, $parent); 
       }*/     
             
       require_once(ROOT.'/views/post/full.php');           
       return true;  
    }
    
    public function actionComments($id){
       $showCommnt = Comments::showComment($id);
       echo json_encode($showCommnt);
       return TRUE;
    }
    
     public function actionCreate($post_id){
      
        if(!User::isGuest()){
             $author = User::checkLogged();
             $text=$_POST['text'];
             $parent = 0;
            Comments::createComment($author, $text, $post_id, $parent); 
            $return = Comments::returnLastInsertComment($post_id);
            echo json_encode($return);
            }  

            return true;
        }
    
        public function actionReply($post_id){
            if(!User::isGuest()){
             $author = User::checkLogged();
             $text=$_POST['text'];
             $parent=$_POST['parent'];
             Comments::createComment($author, $text, $post_id, $parent); 
            $return = Comments::returnLastInsertComment($post_id);
            json_encode($return);
            }  

            return true;
            
            
            
        }
    
}
