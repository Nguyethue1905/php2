<?php
namespace Core;

class  Register extends Database{

    public function register(){
        // method register: if..else
        if(isset($_POST['submit'])){
            $this->fname = $_POST['firstname'];
            $this->lname = $_POST['lastname'];
            $this->pwd = $_POST['password'];
            $this->pwdRepeat = $_POST['confirmPassword'];
            $this->email = $_POST['email'];
    
            $this->signupUser();
            header("location:/");
        }else{
            return <<<'HTML'
            <form action="register" method="post">
            <div class="row">
            <div class="col">
            </div>
            <div class="col">
            </div>
            </div>
            <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
            <input type='password' class='form-control' name='confirmPassword'>
            <button type='submit' name='submit' class='btn btn-primary'>Submit
            HTML;
        }
}
protected function signupUser(){
    if($this->emptyInput()!==false){
        header("location: /register/error/emptyInput");
        exit();
    }
    if($this->invalidEmail()!==false){
        header("location: /register/error/email");
        exit();
    }
    if($this->pwdMatch()!==false){
        header("location: /register/error/passwordMatch");
        exit();
    }
    if($this->emptyInput()!==false){
        header("location: /register/error/emptyInput");
        exit();
    }
    
    $this->setUser($this->fname, $this->lname, $this->pwd, $this->email);
}

protected function setUser($fname,$lname,$pwd,$email){
    $stmt = $this->_db_->prepare('INSERT INTO users (first_name,last_name,password,email,status,'created_at','password') VALUES (?,?,?,?,?,?,?)');
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
    $stmt -> bind_param('sssssss',$fname,$lname,$hashedPwd,$email,'1',date('Y-m-d H:i:s'),$hashedPwd);
    $resultCheck = "";
    if ($stmt == FALSE) {
        $resultCheck = false;
        $stmt = null;
        header("location:/register/error/statementfailed");
        exit();
    }
    else {
        $resultCheck = true;
    }
    return $resultCheck;
}


}
    

?>