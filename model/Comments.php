<?php

class Comments {
    public static function createComment($author,$text,$post,$parent){
        $db= Db::getConnection();
        $sql='INSERT INTO `comments`( `author_id`, `text`, `post_id`, `parent_id`)'.
                ' VALUES (:author,:text,:post,:parent)';
        $result = $db->prepare($sql);
        $result->bindParam(':author', $author, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR); 
        $result->bindParam(':post', $post, PDO::PARAM_INT); 
        $result->bindParam(':parent', $parent, PDO::PARAM_INT); 
        $result->execute();
        return array(
             'author'=>$author,
            'text'=>$text,
            'post'=>$post,
            'parent'=>$parent
        );
            
    }
    
      public static function showComment($post){
        $db= Db::getConnection();
        $sql='SELECT * FROM comments WHERE post_id=:post ORDER BY pub_date';
        $result = $db->prepare($sql);
        $result->bindParam(':post', $post, PDO::PARAM_INT); 
        $result->execute();
        $comment = array();
        while ($row=$result->fetch()){
            $comment[] = $row;
        }
        return $comment;
        
    }
    
      public static function getTree($dataset) {
	$tree = array();
	foreach ($dataset as $id => &$node) {    
		if (!$node['parent_id']){
		$tree[$id] = &$node;
		}else{ 
                //Если есть потомки то перебераем массив
                $dataset[$node['parent_id']]['childs'][$id] = &$node;
		}
	}
      return $tree;
}

 



 public static function replyComment($author,$text,$post,$parent){
        $db= Db::getConnection();
        $sql='INSERT INTO `comments`( `author_id`, `text`, `post_id`, `parent_id`)'.
                ' VALUES (:author,:text,:post,:parent)';
        $result = $db->prepare($sql);
        $result->bindParam(':author', $author, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR); 
        $result->bindParam(':post', $post, PDO::PARAM_INT); 
        $result->bindParam(':parent', $parent, PDO::PARAM_INT); 
        return $result->execute();
     
 }
 
 public static function deleteComment($id){
        $db = Db::getConnection();      
        $sql = 'DELETE FROM comments WHERE comment_id = :id OR parent_id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute(); 
 }
       
  
 
}
