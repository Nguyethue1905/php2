<?php
    namespace Core;

    use mysqli;

    class Database{
        public function __construct(){
            $servername = "localhost";
            $username = "root";
            $password = "mysql";

            //$conn = mysql_connect($servernaem,$username,$password);
            $conn = new mysqli($servername,$username,$password);

            if(!$conn){
                //die("Connection failed: " . mysqli_connect_error());
                die("Connection failed: ". $conn->connect_error());
            }

            echo "Connection successful";
        }
        public function HelloWord(){
            echo "Hello Word";
        }
            
        }
            
        
    ?>