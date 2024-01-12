<?php
spl_autoload_register(function($class){
    // require_once __DIR__ . '\\'.$class.'.php';
    include $class.'.php';
});                                

use App\Database as DB;

$db = new DB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Home Page
</body>
</html>