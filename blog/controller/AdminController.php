<?php

class AdminController extends AdminBase {
    public function actionIndex(){
         if(self::checkAdmin()){
             $categories= Category::AdminGetCategorysList();
             //добавить фото в слайдер
             if($_POST['submit']){
              $pic_name=trim(mb_strtolower($_FILES['slider']['name']));
              $pic_tmp=$_FILES['slider']['tmp_name'];
            if(!file_exists('slider')){
                mkdir('slider');
            }
            $picture= move_uploaded_file($pic_tmp, "slider/$pic_name");
            $dir= "slider/$pic_name";
            Slider::addToSlider($dir);
             }
             
             
             
        }
        require_once ROOT.'/views/admin/index.php';
        return TRUE;
    }
    
}
