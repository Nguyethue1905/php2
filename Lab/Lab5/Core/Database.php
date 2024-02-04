<?php

namespace Core;

use \mysqli;

class Database {

    protected function connect()
    {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'mysql';
        $database = 'work';
        try{
            $conn = new mysqli($hostname, $username, $password, $database);
            if (!$conn){
                die("Connection failed: ". $conn->connect_error());
            }
            return $conn;
        }catch (\Exception $e){
            print "Connection failed: " . $e->getMessage();
            die();
        }
    }
}


// class Databases {
//     public $connection;
//     public function __construct() {
//         $dbhost = 'localhost';
//         $dbuser = 'root';
//         $dbpass = 'mysql';
//         $dbname = 'work';

//         try {
//             $this->connection = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
//             $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//             echo "Successfully Connected";
//         } catch (\PDOException $e) {
//             die("Connection failed: " . $e->getMessage());
//         }
//     }
// }
