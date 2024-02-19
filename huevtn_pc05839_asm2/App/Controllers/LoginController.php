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
            // var_dump($email);
            if ($this->emptyInput($email, $password)) {
                echo 'Please fill in the information';
                exit();
            }
            if ($this->invalidEmail($email)) {
                echo 'Invalid email';
                exit();
            }
            if ($_POST['password1'] != $_POST['password']) {
                echo 'Mật khẩu không khớp';
                exit();
            }
            $data = [
                'email' => $email,
                'password' => $password,
                'nameUser' => $_POST['nameUser'],
            ];

            // var_dump($data);
            $signup = new User();
            $users = $signup->getAllUser();
   
            foreach ($users as $user) {
                //  var_dump($user['email']);
                if ($_POST['email'] === $user['email']) {
                    echo 'Email đã có tài khoản';
                    exit();
                }
            }
            $result = $signup->createUser($data);
            $_SESSION['user'] = $data['nameUser'];
            $_SESSION['id'] = $data['userID'];
            var_dump( $_SESSION['id']);
            header("location:" . ROOT_URL . "?url=HomeController/homePage ");
        }
    }
    public function emptyInput($email, $password)
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
            if ($this->emptyInput($email, $password)) {
                echo 'Please fill in the information';
                exit();
            }
            if ($this->invalidEmail($email)) {
                echo 'Invalid email';
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
        var_dump($stmt);
        if ($email !== $stmt['email']) {
            echo 'Email chưa có tài khoản';
            exit();
        } elseif ($stmt['password'] != $password) {
            echo 'Mật khẩu không chính xác';
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
