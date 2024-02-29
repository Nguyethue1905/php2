<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;
use App\Controllers\LoginController;
use App\Helpers\PHPMailer\Mailer;

class ForgotController extends BaseController
{

    private $_renderBase;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }


    function forgot()
    {
        $this->load->render('forgotpass');
     
    }
    function pass(){
        if(isset($_POST['submit'])){
            $signup = new User();
            $users = $signup->getAllUser();
            var_dump($_POST['email']);
            foreach ($users as $user) {
                // var_dump($user['email']);
                if ($_POST['email'] === $user['email']) {
                   $this->form();
                   exit();
                }else{
                    $_SESSION['error'] ='Email does not have an account';
                    header("location:" . ROOT_URL . "?url=ForgotController/forgot");
                    exit();
                }
            }
        }
    }
    


    function form(){
        $mail = new Mailer();
        if(isset($_POST['submit'])){
            $_SESSION['email'] =  $_POST['email'];
            $mail->sendMail();
            header("location:" . ROOT_URL . "?url=ForgotController/otp");
        }
    }

    function otp(){
        $this->load->render('otp');

    }

    function newPass(){
        $this->load->render('reSetPass');
    }
    function updatePass(){
        
        if(isset($_POST['submit'])){
            // var_dump($_POST['code']);
            if($_POST['code'] == $_SESSION['code']){
                // var_dump($_POST['code']);
                // var_dump($_SESSION['code']);
            header("location:" . ROOT_URL . "?url=ForgotController/newPass");
            }else{
                $_SESSION['error'] = 'Code is incorrect';
                header("location:" . ROOT_URL . "?url=ForgotController/otp");
                exit();
            }
        }
    }

    function New(){
        if(isset($_POST["submit"])){
            if ($_POST['password1'] != $_POST['password']) {
                $_SESSION['error'] = 'Passwords are not the same';
                header("location:" . ROOT_URL . "?url=ForgotController/newPass");
                exit();
            }
            
            $email = $_SESSION['email'];
            // var_dump($email);
            $data = [
                'password' => $_POST['password']
            ];
            $user = new User();
            $user->updateUser($email, $data);
            header("location:" . ROOT_URL . "?url=LoginController/login");
        }
    }
}
