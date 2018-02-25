<?php

class User {
   
    public static function register($name, $email, $password){
        $db= Db::getConnection();
        $sql='INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';
        $result=$db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();        
    }
    
     public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
     public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    
    public static function checkEmailExists($email){
         $db= Db::getConnection();
         $sql='SELECT COUNT(*) FROM user WHERE email=:email';
         $result=$db->prepare($sql);
         $result->bindParam(':email', $email, PDO::PARAM_STR);
         $result->execute();
        if ($result->fetchColumn()){
        return false;}
        return true;       
        
    }
    
    public static function checkUserExists($email, $password){
        $db= Db::getConnection();
        $sql='SELECT * FROM user WHERE email = :email AND password = :password';
        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user=$result->execute();
        $user=$result->fetch();
        if($user){
        return $user['id'];
        } 
        return FALSE;  
        
    }
    
     public static function authSession($userId){
               $_SESSION['user'] = $userId;
    }
    
    public static function authCookie($userId){
        setcookie('user',$userId, time()+60*60,'/');
    }
    
    public static function unsetCookie($userId){
        setcookie('user',$userId, time()-3600,'/');
    }

    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }elseif(isset($_COOKIE['user'])) {
            return $_COOKIE['user'];
        }else{
            header("Location: /user/login");
        }
        
    }
    
    public static function getUserById($id){
        $db= Db::getConnection();
        $sql='SELECT * FROM user WHERE id=:id';
        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
      public static function isGuest()
    {
        if (isset($_SESSION['user']) || isset($_COOKIE['user'])) {
            return false;
        }
        return true;
    }
    
    public static function edit($id, $name, $password){
       $db= Db::getConnection();
       $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";
       $result = $db->prepare($sql);
       $result->bindParam(':id', $id, PDO::PARAM_INT);
       $result->bindParam(':name', $name, PDO::PARAM_STR);
       $result->bindParam(':password', $password, PDO::PARAM_STR);
       return $result->execute();
    }
    
    public static function admShowAllUsers(){
        $db= Db::getConnection();
        $sql='SELECT * FROM user';
        $result=$db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $users = array();
        while ($row=$result->fetch()){
            $users[]=$row;
        }
        return $users;
    }
    
    public static function banUser($id){
       $db= Db::getConnection();
       $sql = "UPDATE user SET role = 'ban' WHERE id = :id";
       $result = $db->prepare($sql);
       $result->bindParam(':id', $id, PDO::PARAM_INT);
       return $result->execute();
        
    }
    
    
     public static function DebanUser($id){
       $db= Db::getConnection();
       $sql = "UPDATE user SET role = '' WHERE id = :id";
       $result = $db->prepare($sql);
       $result->bindParam(':id', $id, PDO::PARAM_INT);
       return $result->execute();
        
    }
     
    
    public static function checkUserStatus($email){
        $db= Db::getConnection();
        $sql='SELECT role FROM user WHERE email = :email';
        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $status=$result->fetch();
        if($status['role']=='ban'){
        return TRUE;
        } 
        return FALSE;  
        
    }
    
    
}
