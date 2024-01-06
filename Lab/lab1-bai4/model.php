<?php

function getStaff(){
    global $connection;
    require_once 'config.php';
    $sql = "SELECT * FROM stafff";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    /*Get the result*/
    $result = $stmt->get_result();
    return $result;
}