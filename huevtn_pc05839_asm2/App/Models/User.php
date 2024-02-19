<?php

namespace App\Models;



class User extends BaseModel{
    
    protected $table = 'users';

    
    public function getAllUser(){
        return $this->getAll1();
    }
    public function getUserOne($userID){
        return $this->getUser($userID);
    }

    public function getCheck($email){
        // $email = $_POST['email'];
        return $this->getOne($email);
        
    }
    public function createUser($data){
        return $this->create($data);
    }
   
    public function updateUser($email, $data){
        return $this->updateFromEmail($email, $data);
    }

    function uploaAvatar($userID,  $avatar){
        return $this->updateIMG($userID,  $avatar);
    }
    function updateList($id,  $data){
        return $this->update($id,  $data);
    }
}