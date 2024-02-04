<?php
require 'vendor/autoload.php';

use App\Route as Route;

$route = new Route();

// $route->register('/',function(){
//     echo'Home';
// });

// $route->register('/Invoices',function(){
//     echo'Invoices';
// });
// $route->register('/Invoices/create',function(){
//     echo'Create Invoices';
// });

// $route->register('/', [App\Home::class, 'index'])
//     ->register('/Invoices', [App\Invoices::class, 'index'])
//     ->register('/Invoices/create', [App\Invoices::class, 'create']);

$route
    ->get('/', [App\Home::class, 'index'])
    ->post('/upload', [App\Invoices::class, 'index']);

echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));


?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Nguyệt Huế</h1>
</body>

</html>