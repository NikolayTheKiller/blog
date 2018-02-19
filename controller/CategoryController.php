<?php

class CategoryController {
    public function actionCategory(){
        $categories= Category::getCategorysList();
        $tree= Category::getTree($categories);       
        $cat_menu=Category::showCat($tree);

        
        require_once(ROOT.'/views/category/index.php');           
        return true;
    }
    
    
}
