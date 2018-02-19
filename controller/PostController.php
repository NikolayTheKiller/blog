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
        if(!User::isGuest()){
             $author = User::checkLogged();
             $parent=0;
             $text=$_POST['text'];
             Comments::createComment($author, $text, $id, $parent); 
             //header("location:/post/$id");
                         
        }        
        $comment= Comments::showComment($id);
        $tree= Comments::getTree($comment);
        $showComments= Comments::showCom($tree);
        
        
       require_once(ROOT.'/views/post/full.php');           
       return true;  
    }
    
    public function actionReply($parent,$post_id){
      
        if(!User::isGuest()){
             $author = User::checkLogged();
             $text=$_POST['text'];
             Comments::createComment($author, $text, $post_id, $parent); 
             
       require_once(ROOT.'/views/post/full.php');           
       return true; 
        
        
    }
    
   

    
}

        }
