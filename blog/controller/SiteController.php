<?php

class SiteController {
    public function actionIndex(){
        $categories= Category::getCategorysList();
        $tree= Category::getTree($categories);       
        $cat_menu=Category::showCat($tree);
        $new = Post::getLatestPost();
        $sliderShow= Slider::showForSlider();
        require_once ROOT.'/views/index.php';
        return TRUE;
    }
}
