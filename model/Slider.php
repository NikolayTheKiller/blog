<?php

class Slider {
    public static function showForSlider(){
        $db= Db::getConnection();
        $sql='SELECT * FROM slider ORDER BY id LIMIT 5';
        $result = $db->prepare($sql);
        //$result->bindParam(':num', $num, PDO::PARAM_INT); для установки кол-ва фото выводимых в слайдер 
        $result->setFetchMode(PDO::FETCH_ASSOC);     
        $result->execute();
        $picts = array();
        while ($row=$result->fetch()){
            $picts[]=$row;
        }
        return $picts;
    }
    
    public static function addToSlider($dir){
       $db = Db::getConnection();
       $sql='INSERT INTO slider(path_t_pict) VALUES (:path)';
       $result = $db->prepare($sql);
       $result->bindParam(':path', $dir, PDO::PARAM_STR);
       return $result->execute();
    }
    
}
