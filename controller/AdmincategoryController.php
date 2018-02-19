<?php

class AdmincategoryController extends AdminBase{
   
    
    public function actionCreate(){
        $categories= Category::AdminGetCategorysList();
        if (self::checkAdmin()){if($_POST['submit']){            
            $name=$_POST['name'];
            $status=$_POST['status'];
            $child=$_POST['child'];            
            Category::createCategory($name, $status, $child);
           
           
        header("Location: /admin");
        }
        }
        require_once ROOT.'/views/admin/create.php';        
        return TRUE;
    }
    
    public function actionDelete($id){        
        if(self::checkAdmin()){
            $categories= Category::AdminGetCategorysList();
            if(isset($_POST['submit'])){               
               Category::deleteCategoryById($id);
               header("Location: /admin");
            }
        }
        require_once ROOT.'/views/admin/delete.php';        
        return TRUE;
    }
    
      public function actionUpdate($id){
        
        if (self::checkAdmin()){
            $categories= Category::AdminGetCategorysList();//для селекта родителя категорий
            $safe= Category::getCategoryById($id);            
            if($_POST['submit']){
            $name=$_POST['name'];
            $status=$_POST['status'];
            $child=$_POST['child'];          
        Category::updateCategoryById($id,$name, $status,$child);
        header("Location: /admin");
        }}
        
        require_once ROOT.'/views/admin/update.php';        
        return TRUE;
    }
}
