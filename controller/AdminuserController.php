<?php

class AdminuserController {
    public function actionIndex(){
        $users= User::admShowAllUsers();
        include_once ROOT.'/views/admin/users.php';
        return true;       
    }
    
    public function actionBan($id){
        User::banUser($id);
        
        header("location:/adminuser");
        return true;
        
    }
    
    public function actionDeban($id){
        User::DebanUser($id);
        header("location:/adminuser");
        return true;      
        
    }
    
    
    
    
    
}
