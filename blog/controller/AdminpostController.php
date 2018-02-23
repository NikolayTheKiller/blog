<?php
class AdminpostController extends AdminBase{
    public function actionIndex(){
        if(self::checkAdmin()){
            $posts= Post::adminGetAllPosts();
            $categories= Category::AdminGetCategorysList();
            if($_POST['submit']){
                $id=$_POST['sort'];               
                self::sortPostsByCat($id);                
                exit();
            }
        }
        require_once ROOT.'/views/admin/adm_post.php';
        return TRUE;
    }
    
    public static function sortPostsByCat($id){                
         $sort=Post::getAllPosts($id);     
         $categoryById= Category::getCategoryById($id);
        require_once ROOT.'/views/admin/sort_posts_by_cat.php';
        return TRUE;   
      
    }

        public function actionCreate($id){
        if(self::checkAdmin()){
           if($_POST['submit']){
              $name=$_POST['title'];
              $content=$_POST['content'];              
              $author=$_POST['author'];
              $pic_name=trim(mb_strtolower($_FILES['picture']['name']));
              $pic_tmp=$_FILES['picture']['tmp_name'];
            if(!file_exists('uploads')){
                mkdir('uploads');
            }elseif(!file_exists('thumbs')) {
                     mkdir('thumbs');
                }
               $dir= "uploads/$pic_name";
               $thumb="thumbs/$pic_name";
               $picture= move_uploaded_file($pic_tmp, $dir);            
               resizer::resize($dir,300,$thumb);           
            echo $thumb;
            if(strlen($content)>200){           
              $short_content= substr($content,0,200);
              
            } else {
              $short_content='читать всю статью';  
            }
              Post::uploadPictureInPost($name, $thumb);            
              Post::createNewPost($name,$content,$id,$short_content,$author);
             
        }}
        require_once ROOT.'/views/admin/create_post.php';
        return TRUE;
        }
    
    public function actionUpdate($id){
       $oldVersion= Post::getOnePostById($id);
       $cat= Category::AdminGetCategorysList();
       if($_POST['submit']){
       $name=$_POST['title']; 
       $content=$_POST['content'];       
       $author=$_POST['author'];
       $category_id=$_POST['parent'];
       $short_content='';
       if(strlen($content)>200){           
              $short_content= substr($content,0,200);
             // $short_content= strip_tags($short_content);              
              //$short_content= rtrim($short_content, "!,.-");
            } else {
              $short_content='читать всю статью';  
            }
       Post::updatePost($id, $name, $content,$category_id,$author,$short_content);
       header("location:/adminpost/index");
       }
       require_once ROOT.'/views/admin/upd_post.php';
       return TRUE;  
    }
   
    public function actionDelete($id){        
            Post::deletePostById($id);
            header('location:/adminpost/index');
        
        return TRUE;
    }
    //помещает пост в несколько категорий
    public function actionExtra($id){
        $post_name= Post::getOnePostById($id);
        $extra_cat= Category::AdminGetCategorysList();
        if($_POST['submit']){
           $ex_cat=$_POST['extra_cat'];
           Post::addExtraCatInPost($id,$ex_cat);
           header('location:/adminpost/index');
         
        }
        require_once ROOT.'/views/admin/extra_cat.php';
       return TRUE; 
    }
    
    public function actionCreatenew(){      
      if(self::checkAdmin()){
           $cat= Category::AdminGetCategorysList();
           if($_POST['submit']){
              $name=$_POST['title'];
              $content=$_POST['content'];              
              $author=$_POST['author'];
              $pic_name=trim(mb_strtolower($_FILES['picture']['name']));
              $pic_tmp=$_FILES['picture']['tmp_name'];
            if(!file_exists('uploads')){
                mkdir('uploads');
            }elseif(!file_exists('thumbs')) {
                     mkdir('thumbs');
                }
               $dir= "uploads/$pic_name";
               $thumb="thumbs/$pic_name";
               $picture= move_uploaded_file($pic_tmp, $dir);            
               resizer::resize($dir,300,$thumb);           
              if(strlen($content)>200){           
              $short_content= substr($content,0,200);              
            } else {
              $short_content='читать всю статью';  
            }
              Post::uploadPictureInPost($name, $thumb);            
              Post::createNewPost($name,$content,NULL,$short_content,$author);
              $category=$_POST['category'];
              $p_name= Post::getLatestPost();          
       
              foreach ($category as $key=>$value){
                  foreach ($p_name as $i):
               Post::addExtraCatInPost($i['id'], $value);
              endforeach;
              }
             
        }
       require_once ROOT.'/views/admin/create_new_post.php';
       return TRUE;
    }
    
}
}