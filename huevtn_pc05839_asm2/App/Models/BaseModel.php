<?php

namespace App\Models;

use App\Interfaces\CrudInterface;
use App\Models\Database;
use PDO;

abstract class BaseModel implements CrudInterface
{

    protected $table;
    protected $table1;
    protected $table2;



    private $_connection;

    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->table1 ";

        // return $this;

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll1()
    {
        $this->_query = "SELECT * FROM $this->table ";

        // return $this;

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOne($email)
    {
        $this->_query = "SELECT * FROM $this->table WHERE email = '$email'";
        $result   = $this->_connection->PdO()->prepare($this->_query);
        $result->execute();

        $stmt = $result->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    }
    public function getUser($userID)
    {
        $this->_query = "SELECT * FROM $this->table WHERE userID = '$userID'";
        $result   = $this->_connection->PdO()->prepare($this->_query);
        $result->execute();

        $stmt = $result->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    }
    public function create(array $data)
    {
        $this->_query = "INSERT INTO $this->table (";
        foreach ($data as $key => $value) {
            $this->_query .= "$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .=   " ) VALUES (";
        foreach ($data as $key => $value) {
            $this->_query .= "'$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= ")";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        return $stmt->execute();
    }
    public function update(int $id, array $data)
    {

        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query .= "$key = :$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " WHERE userID = $id";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        // var_dump($this->_query);
        return $stmt->execute();
    }
    public function updateJob(int $id, array $data)
    {

        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query .= "$key = :$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " WHERE jobID = $id";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        var_dump($this->_query);
        return $stmt->execute();
    }
    public function delete(int $jobID): bool
    {
        $this->_query = "DELETE  FROM $this->table WHERE jobID = $jobID ";
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return true;
        
    }
    public function delete1(int $jobID): bool
    {
        $this->_query = "DELETE  FROM $this->table2 WHERE jobID = $jobID ";
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return true;
        
    }
    public function joinJob($userID, $nameUser)
    {
        $this->_query = "SELECT $this->table.*, $this->table1.$nameUser FROM $this->table INNER JOIN $this->table1 ON $this->table.$userID = $this->table1.$userID";
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function join($userID, $jobID, $StaffID)
    {
        $this->_query = "SELECT  jobs.nameJob as nameJob, jobs.jobID as jobID, jobs.dateStart as dateStart ,
         jobs.dateEnd as dateEnd,users.nameUser as staff,
         (SELECT users.nameUser FROM users WHERE users.userID = jobs.userID ) as manager ,
          jobs.file as file, jobs.note as note , jobdetails.status as status 
          FROM $this->table
          INNER JOIN $this->table1 ON $this->table.$jobID = $this->table1.$jobID 
          INNER JOIN $this->table2 ON $this->table.$StaffID = $this->table2.$userID";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function joinID($userID, $jobID, $id, $StaffID)
    {
        $this->_query = "SELECT  jobs.nameJob as nameJob, jobs.dateStart as dateStart ,
         jobs.dateEnd as dateEnd,users.nameUser as staff,
         (SELECT users.nameUser FROM users WHERE users.userID = jobs.userID ) as manager ,
          jobs.file as file, jobs.note as note , jobdetails.status as status , jobs.jobID as jobID
          FROM $this->table
          INNER JOIN $this->table1 ON $this->table.$jobID = $this->table1.$jobID 
          INNER JOIN $this->table2 ON $this->table.$StaffID = $this->table2.$userID WHERE $this->table1.jobID = $id";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateFromEmail($email, array $data)
    {

        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query .= "$key = :$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " WHERE email = :email";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":email", $email);
        return $stmt->execute();
    }

    public function getNewID($data)
    {
        $this->_query = "INSERT INTO $this->table (";
        foreach ($data as $key => $value) {
            $this->_query .= "$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .=   " ) VALUES (";
        foreach ($data as $key => $value) {
            $this->_query .= "'$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= ")";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute(); // Thực thi câu lệnh INSERT

        $this->_query = "SELECT Max(jobID) FROM $this->table";
        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $newID = $result['Max(jobID)'];

        return $newID; // Trả về ID mới
    }
    function updatestutus($jobID){
        $this->_query = "UPDATE
         $this->table SET status = 'Progressing' WHERE jobID = $jobID";
        $result   = $this->_connection->PdO()->prepare($this->_query);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
        
    }
    function updateProgessing($jobID){
        $this->_query = "UPDATE
         $this->table SET status = 'Success' WHERE jobID = $jobID";
        $result   = $this->_connection->PdO()->prepare($this->_query);
        $result->execute();

        $stmt = $result->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    }
    function updateIMG($userID, $avatar){
        $this->_query = "UPDATE
         $this->table SET avatar = '$avatar' WHERE userID = $userID";
        $result   = $this->_connection->PdO()->prepare($this->_query);
        $result->execute();
        // var_dump($this->_query);
        $stmt = $result->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
