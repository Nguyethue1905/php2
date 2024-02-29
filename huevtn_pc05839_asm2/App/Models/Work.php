<?php

namespace App\Models;

class Work extends BaseModel{
    
    protected $table = 'jobs';
    protected $table1 = 'users';
    protected $table2 = 'jobdetails';
    
    public function getAllJob($userID,  $nameUser){
        return $this->joinJob($userID, $nameUser);
    }
    public function getAlluser(){
        return $this->getAll();
    }
    public function addWork(array $data){
        return $this->getNewID($data);
    }
    public function updateWork($id, $data){
        return $this->updateJob($id, $data);
    }
    public function updateDealine($jobID, $time){
        return $this->updateTime($jobID, $time);
    }
    function deleteW($jobID){
        return $this->delete($jobID);
    }
    function deleteW1($jobID){
        return $this->delete1($jobID);
    }

    function countJob($jobDetailID){
        return $this->count($jobDetailID);
       }
    function selectUser(){
        return $this->countUser();
       }


}
