<?php

class AdmincategoryController extends AdminBase{
   
    
    public function actionCreate(){
        
        if (self::checkAdmin()){if($_POST['submit']){
            $name=$_POST['name'];
            $status=$_POST['status'];
        Category::createCategory($name, $status);}
        }
        require_once ROOT.'/views/admin/create.php';        
        return TRUE;
    }
    
}
