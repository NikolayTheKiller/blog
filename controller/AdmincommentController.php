<?php

class AdmincommentController {
    public function actionIndex(){
        $comments=Comments::showAllComments();
        include_once ROOT.'/views/admin/adm_comments.php';
        return TRUE;
    }
    
    public function actionDelete($id){
        Comments::deleteComment($id);
         header("location:/admincomment");
        return TRUE;
        
        
    }
    
    
}
