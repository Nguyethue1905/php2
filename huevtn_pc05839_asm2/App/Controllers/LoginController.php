<?php
// session_start();
?>
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;

class LoginController extends BaseController
{

    private $_renderBase;
    private $vali;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }


    function login()
    {
        $this->load->render('signin');
        $this->submit();
    }


    function signup()
    {
        $this->load->render('signup');
    }

    function addLogin()
    {
        if (isset($_POST['submit'])) {
            // var_dump($_POST);

            $email = $_POST['email'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            // var_dump($email);
            if ($this->emptyInput($email, $password, $status)) {
                $_SESSION['error']= 'Please fill in the information';
                header("location:" . ROOT_URL . "?url=LoginController/signup");
                exit();
            }
            if ($this->invalidEmail($email)) {
                $_SESSION['error'] = 'Invalid email';
                header("location:" . ROOT_URL . "?url=LoginController/signup");
                exit();
            }
            if ($_POST['password1'] != $_POST['password']) {
                $_SESSION['error'] = 'Passwords are not the same';
                header("location:" . ROOT_URL . "?url=LoginController/signup");
                exit();
            }
            $data = [
                'email' => $email,
                'password' => $password,
                'nameUser' => $_POST['nameUser'],
                'status' => $_POST['status']
            ];

            // var_dump($data);
            $signup = new User();
            $users = $signup->getAllUser();
            $email = $_POST['email'];
           
            foreach ($users as $user) {
                //  var_dump($user['email']);
                if ($_POST['email'] === $user['email']) {
                    $_SESSION['error'] = 'Email already has an account';
                    header("location:" . ROOT_URL . "?url=LoginController/signup");
                    exit();
                }
            }
            $result = $signup->createUser($data);
            $ad = $signup->getCheck($email);
            $_SESSION['user'] = $ad;
            // var_dump($ad); exit();
            if($status == 'Staff'){
                header("location:" . ROOT_URL . "?url=HomeController/homePageStaff ");
            }else{
                header("location:" . ROOT_URL . "?url=HomeController/homePage");
            }
           
        }
    }
    public function emptyInput($email, $password, $status)
    {
        return empty($email) || empty($password) || empty($status);
    }
    public function emptyInput1($email, $password)
    {
        return empty($email) || empty($password);
    }

    public function invalidEmail($email)
    {
        return !(bool) preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+.[A-Za-z]{2,6}$/", $email);
        //biểu thức 9 qui bắt lỗi email
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("location:" . ROOT_URL . "?url=LoginController/login");
    }
    function submit()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->emptyInput1($email, $password)) {
                $_SESSION['error']= 'Please fill in the information';
                header("location:" . ROOT_URL . "?url=LoginController/login");
                exit();
            }
            if ($this->invalidEmail($email)) {
                 $_SESSION['error'] ='Invalid email';
                 header("location:" . ROOT_URL . "?url=LoginController/login");
                exit();
            }
            $this->getUser($email, $password);
        }
    }
    function getUser($email, $password) 
    {
        $user = new User();
        // var_dump($user);
        $stmt = $user->getCheck($email);
        if ($email !== $stmt['email']) {
            $_SESSION['error'] = 'Email does not have an account';
            header("location:" . ROOT_URL . "?url=LoginController/login");
            exit();
        } elseif ($stmt['password'] != $password) {
            $_SESSION['error'] = 'Incorrect password';
            header("location:" . ROOT_URL . "?url=LoginController/login");
            exit();
        } elseif($stmt['status'] == 'Staff') {
            $_SESSION['user'] = $stmt;
            header("location:" . ROOT_URL . "?url=HomeController/homePageStaff");
        }elseif($stmt['status'] == 'Manager'){
            $_SESSION['user'] = $stmt;
            // $_SESSION['id'] = $stmt['userID'];
            header("location:" . ROOT_URL . "?url=HomeController/homePage");
        }
    }
}
