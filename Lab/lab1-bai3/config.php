<?php

$connection = new mysqli('localhost','root','mysql','php2');

if($connection->connect_errno){
    die('Erro: '. $connection->connect_errno);
}
echo '';
?>