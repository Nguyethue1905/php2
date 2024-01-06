<?php
function get_user($email)
{
    global $connection;
    require_once 'config.php';
    $sql = "SELECT * FROM stafff WHERE email = ?";
    $stmt = $connection->prepare($sql);

    if ($stmt === false) {
        die($connection->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    /*Get the result*/
    $result = $stmt->get_result();

    $row = null;
    if($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }

    $connection->close();
    return $row;
}
?>
