<?php

namespace App\Models;

class Detail extends BaseModel{
    
    protected $table = 'jobdetails';
    protected $table1 = 'jobs';
    protected $table2 = 'users';
    
    
    public function getDetail($userID, $jobID,$StaffID){
        return $this->join($userID, $jobID, $StaffID);
    }
    public function getDetailID($userID, $jobID,  $id,$StaffID){
        return $this->joinID($userID, $jobID, $id, $StaffID);
    }
    public function addJob(array $data){
        return $this->create($data);
    }
    public function updateStart($jobID){
        return $this->updatestutus($jobID);
    }
    public function updateProgess($jobID){
        return $this->updateProgessing($jobID);
    }
}
