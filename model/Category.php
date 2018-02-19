<?php

class Category {
    public static function getCategorysList(){
        $db= Db::getConnection();
        $sql='SELECT * FROM category WHERE status = "1"  ORDER BY name ASC';       
        $result=$db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC); 
        $result->execute();        
        $categoryList = array();
        while ($row = $result->fetch()) {
                $categoryList[$row['id']] = $row;
                }
        
        return $categoryList;
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

    public static function tplMenu($category){
	$menu = '<li>
		<a href="/category/'. $category['id'] .'" title="'. $category['name'] .'">'. 
		$category['name'].'</a>';		
		if(isset($category['childs'])){
                    $menu.='<i><ul>'.self::showCat($category['childs']) .'</ul></i>';
		}
	$menu .= '</li>';
	
	return $menu;
}

    public static function showCat($data){
	$string = '';
	foreach($data as $item){
		$string .= self::tplMenu($item);
	}
	return $string;
}
   
    public static function getCategoryById($id)
    {      
        $db = Db::getConnection();    
        $sql = 'SELECT * FROM category WHERE id = :id';    
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);   
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();      
        return $result->fetch();
    }
    
    public static function createCategory($name,$status,$child){
         $db = Db::getConnection(); 
         $sql = 'INSERT INTO category (name, status, parent_id)VALUES (:name,:status,:parent_id)';
         $result = $db->prepare($sql);
         $result->bindParam(':name', $name, PDO::PARAM_STR);
         $result->bindParam(':status', $status, PDO::PARAM_INT); 
         $result->bindParam(':parent_id', $child, PDO::PARAM_INT); 
         return $result->execute();
    }
    
      public static function AdminGetCategorysList(){
        $db= Db::getConnection();
        $sql='SELECT * FROM category ORDER BY id ASC';
        $result=$db->prepare($sql);
        $result->execute();
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['status'] = $row['status'];
            $categoryList[$i]['parent_id'] = $row['parent_id'];
            $i++;
        }
        return $categoryList;
    }
    
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();      
        $sql = 'DELETE FROM category WHERE id = :id OR parent_id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
     public static function updateCategoryById($id,$name,$status,$child)
    {
        $db = Db::getConnection();      
        $sql = 'UPDATE category SET name = :name,status = :status,parent_id = :parent_id WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
         $result->bindParam(':parent_id', $child, PDO::PARAM_INT); 
        return $result->execute();
    }    
    
   
}
