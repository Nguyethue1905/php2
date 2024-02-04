<?php
namespace Core;
class Validator {
    public function emptyInput($email, $password){
        // if(empty($_POST['email'])){
        //     echo 'Vui lòng nhập email ';
        //     // header('Location: /login');
        // }elseif(empty($_POST['password'])){
        //     echo 'Vui lòng nhập password ';
        //     // header('Location: /login');
        // }
        return empty($email) || empty($password);
    }

     public function invalidEmail($email){
            return !(bool) preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+.[A-Za-z]{2,6}$/", $email);
        //biểu thức 9 qui bắt lỗi email
        
        // return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
    
?>