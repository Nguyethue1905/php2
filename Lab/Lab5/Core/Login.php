<?php

namespace Core;
use Core\Database;
use Core\Validator;


class Login extends Database
{
    public $vali;
    public $user;
    public function __construct()
    {
        $this->user = new User();
        $this->vali = new Validator();

    }
    public function login()
    {

        if (isset($_SESSION['user'])) {
            
            $username = $_SESSION['user'];
        
            // $nameCompany = $_SESSION['user']['nameCompany'];
            return "{$username} <a href='/logout'>Logout</a>";
        } else {
            return '
            <form method="post" action="">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" value="Submit">Submit</button>
                <a href="/forgot" class="btn btn-primary">ForgotPassword</a>
            </form>
            ';
        
        }
    }

    public function loginUser($email, $password)
    {

        if ($this->vali->emptyInput($email, $password)) {
            // header("location:/validation/emptyInput");
            echo 'Empty';
            exit();
        }
        if ($this->vali->invalidEmail($email)) {
            // header("location:/validation/invalidEmail");
            echo 'Invalid email';
            exit();
        }
        
        $this->getUser($email, $password);
    }


    public function logout(){
        session_unset();
        session_destroy();
        header("location:/");
    }

    public function getUser($email, $password){
        $this->user->getUserInfo($email, $password);
    }

    public function Submit()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $this->loginUser($email, $password);
        // header("Location:/login");
    }
}
