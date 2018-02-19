<?php

class Post{
    const SHOW_BY_DEFAULT = 3;
    public static function getAllPosts($id,$page=1){
        $page= intval($page);
        $offset=($page-1)*self::SHOW_BY_DEFAULT;
        $db= Db::getConnection();
        $sql='SELECT * FROM posts P LEFT JOIN add_post_cat A ON A.cat_id=:id AND P.id=A.post_id'.
                ' LEFT JOIN pictures F ON F.post_name=P.name WHERE p.category_id=:id OR (A.cat_id=:id AND P.id=A.post_id)'.
                'LIMIT 3 OFFSET :offs';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':offs', $offset, PDO::PARAM_INT); 
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();
        $posts = array();
        while ($row=$result->fetch()){
            $posts[]=$row;
        }
        return $posts;
    }
    
    public static function getOnePostById($id){
        $db= Db::getConnection();
        $sql='SELECT * FROM posts P LEFT JOIN pictures F ON F.post_name=P.name WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);   
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();
        $post = array();
        while ($row=$result->fetch()){
            $post[]=$row;
        }
        return $post;
    }
      
    public static function createNewPost($name,$content,$category_id,$author,$short_content){
        $db = Db::getConnection(); 
        $sql = 'INSERT INTO posts '.
                 '(name,content,category_id,short_content,author)'.
                 'VALUES (:name,:content,:category_id,:short_content,:author)';
         $result = $db->prepare($sql);
         $result->bindParam(':name', $name, PDO::PARAM_STR);
         $result->bindParam(':content', $content, PDO::PARAM_STR);
         $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
         $result->bindParam(':short_content', $short_content, PDO::PARAM_STR);
         $result->bindParam(':author', $author, PDO::PARAM_STR);                  
         return $result->execute();
    }
    
    public static function updatePost($id,$name,$content,$category_id,$author,$short_content){
        $db = Db::getConnection(); 
        $sql='UPDATE posts SET '.
                ' name=:name,content=:content,category_id=:category_id,'.
                'author=:author,short_content=:short_content WHERE id=:id';
         $result = $db->prepare($sql);
         $result->bindParam(':id', $id, PDO::PARAM_INT);
         $result->bindParam(':name', $name, PDO::PARAM_STR);
         $result->bindParam(':content', $content, PDO::PARAM_STR);
         $result->bindParam(':category_id', $category_id, PDO::PARAM_INT); 
         $result->bindParam(':author', $author, PDO::PARAM_STR);
         $result->bindParam(':short_content', $short_content, PDO::PARAM_STR);                    
         return $result->execute();
    }
    
       public static function adminGetAllPosts(){
        $db= Db::getConnection();
        $sql='SELECT * FROM posts ORDER BY name DESC';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);   
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();
        $posts = array();
        while ($row=$result->fetch()){
            $posts[]=$row;
        }
        return $posts;
    }
    
    public static function deletePostById($id){
        $db = Db::getConnection();      
        $sql = 'DELETE FROM posts WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function addExtraCatInPost($postId,$catId){
       $db = Db::getConnection();
       $sql='INSERT INTO add_post_cat(post_id, cat_id) VALUES (:post_id,:cat_id)';
       $result = $db->prepare($sql);
       $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
       $result->bindParam(':cat_id', $catId, PDO::PARAM_INT);
       return $result->execute();
    }
    
    public static function uploadPictureInPost($name,$picture){
       $db = Db::getConnection();
       $sql='INSERT INTO pictures(post_name, path_t_pict) VALUES (:post_name,:path_t_pict)';
       $result = $db->prepare($sql);
       $result->bindParam(':post_name', $name, PDO::PARAM_STR);
       $result->bindParam(':path_t_pict', $picture, PDO::PARAM_STR);
       return $result->execute();
    }
    
    public static function getLatestPost(){
        $db= Db::getConnection();
        $sql='SELECT * FROM posts P LEFT JOIN pictures F ON F.post_name=P.name ORDER BY pub_date DESC LIMIT 1';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);   
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();
        $post = array();
        while ($row=$result->fetch()){
            $post[]=$row;
        }
        return $post;
    }
    
     public static function countAllPosts($id){
        $db= Db::getConnection();
        $sql='SELECT count(id) AS count FROM posts P LEFT JOIN add_post_cat A ON A.cat_id=:id AND P.id=A.post_id'.
                ' WHERE p.category_id=:id OR (A.cat_id=:id AND P.id=A.post_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();
        $posts = array();
        $row=$result->fetch();
        return $row['count'];
    }
}