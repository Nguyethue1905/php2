<?php
namespace Core;

class User extends Database
{
    public function getUserInfo($email, $password)
    {
    
        $stmt  = $this->connect()->query("SELECT * FROM users WHERE email= '{$email}' ");

        if ($stmt->num_rows == 0) {
            $stmt = null;
            header("location: login?error=usernotfound");
            exit();
        }
        // $user = $stmt->fetch_array(MYSQLI_ASSOC); //one row
        // $checkpwd = password_verify($password, $user['password']);
        // if ($checkpwd === false) {
        //     $stmt = null;
        //     header("location: login?error=wrongpassword");
        //     exit();
        // } else if ($checkpwd === true) {
        //     $_SESSION['user'] = $user;
        //     echo ' Đăng nhập thành công';
        // }
    
        foreach ($stmt as $row) {
            $_SESSION['user'] = $row['nameUser'];
            // var_dump($row['nameUser']);
            header("Location:/login");
            exit();
        }
    
       header("Location:/login");
        echo ' Đăng nhập thành công';
    
    }
}