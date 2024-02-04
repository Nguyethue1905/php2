<?php
    namespace Core;

    class ForgotPass extends Database 
    {
        public function forget(){
            return '
            <form method="post" action="">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <button type="submit" name="check" class="btn btn-primary" value="Submit">ForgotPassword</button>
            </form>
            ';
        
        }
        public function checkEmail($email){
            $stmt  = $this->connect()->query("SELECT * FROM users WHERE email= '{$email}' ");
            $user = $stmt->fetch_array(MYSQLI_ASSOC); 
            // var_dump($user['email']);
            // var_dump($email);
            if($email ==  $user['email']){
                $_SESSION['email'] = $user['email'];
                echo  $this->newPass();
               
                // header("Location:/forgot");
            }else{
                echo 'email ko tồn tại';
            } 
        }

        public function newPass(){
            return '
            <form method="post" action="/Setup">
                <div class="form-group">
                    <label>New Passworrd </label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" name="newPass" class="btn btn-primary py-1 w-20 mb-1" value="Submit">Setup</button>
            </form>
            ';
        }

        public function reSet($password, $email){
            // var_dump($password);

            $this->connect()->query("UPDATE users SET password = '{$password}' WHERE email= '{$email}' ");
             header('Location:/login');
            
        }
        public function check()
    {
        $email = $_POST['email'];
        $this->checkEmail($email);
    }

        public function Setup()
    {
        // var_dump($_SESSION['email']);
        $password = $_POST['password'];
        // var_dump($password);
        $email = $_SESSION['email'];
        $this->reSet($password, $email);
    }
    }
?>