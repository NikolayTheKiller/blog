<?php

class UserController {
    //1.регистрация
    public function actionRegister(){
                $name = false;
                $email = false;
                $password = false;
                $result = false;
        //обработка формы
         if (isset($_POST['submit'])) {         
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = trim(strip_tags(crypt($_POST['password'])));
                //флаг ошибок
                $errors=FALSE;
            if(!User::checkName($name)){
                $errors[]='имя не должно быть короче 2-х символов';
            }
            if(!User::checkEmail($email)){
                $errors[]='введите правильный email';
            }
            if(!User::checkEmailExists($email)){
                $errors[]='такой эмеил уже существует';
            }
            if(!User::checkPassword($password)){
                $errors[]='пароль не должен быть короче 6 символов';
            }
            if($errors==FALSE){
                 $result = User::register($name, $email, $password);
            }
            
            
            
         }
        
        include_once ROOT.'/views/user/register.php';
        return TRUE;
    }
    
    //2.авторизация
    public static function actionLogin(){
        $email=FALSE;
        $password=FALSE;
        $result = FALSE;
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $password = trim(strip_tags($_POST['password']));
            $errors=FALSE;
            $userId = User::checkUserExists($email, $password);
            $userStatus = User::checkUserStatus($email);
            if($userStatus==TRUE){
                $errors[]='вы забанены и не можете авторизироваться на этом сайте';
                header("Location: ");
            }
           elseif($userId==FALSE){
               $errors[]='пользователя с такими данными не существует, '.
                       'пройдите регистрацию';
               //header("Location:user/login");
         } else {
                             if($_POST['remember']){
                                 User::authCookie($userId);
                                 header("Location:/cabinet"); 
                             } else {
                             User::authSession($userId);                             
                             header("Location:/cabinet"); 
                             }
                             
           }
            
            
            
        }
        
          include_once ROOT.'/views/user/login.php';
        return TRUE;
    }
    
    public static function actionLogout(){
        if(isset($_SESSION['user'])){
        session_start();
        unset($_SESSION['user']);
        header('location:/');}
        elseif (isset ($_COOKIE['user'])) {
        User::unsetCookie($userId);
        header('location:/');        
        }
        
    }
    
}
