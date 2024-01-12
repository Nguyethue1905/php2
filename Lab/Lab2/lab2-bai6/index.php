<?php
 require 'vendor/autoload.php';
 spl_autoload_register(function($class){
    include $class.'.php';
});  
 use App\Core\Route;
 $home = new Route();

 use App\Model\BaseModel;
 $home = new BaseModel();

 use App\Controller\BaseControl;
 $home = new BaseControl();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home nè</h1>
</body>
</html>