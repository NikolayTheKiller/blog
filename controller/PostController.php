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
     
             
       require_once(ROOT.'/views/post/full.php');           
       return true;  
    }
    
    public function actionComments($id){
       $showCommnt = Comments::showComment($id);
       echo json_encode($showCommnt);
       return TRUE;
    }
    
    
    
    
}
