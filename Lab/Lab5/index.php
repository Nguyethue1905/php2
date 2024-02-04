<?php
session_start();
require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <h1>Lab5</h1>
    <h5>Văn Thị Nguyệt Huế-PC05839</h5>
    <h4>   </h4>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <?php
            // use Core\Databases;
            use Core\Route as Route;

            $route = new Route();
            $route
                ->get('/', [Core\Home::class, 'index'])
                ->post('/upload', [Core\Home::class, 'upload'])
                ->get('/login', [Core\Login::class, 'login'])
                ->post('/login', [Core\Login::class, 'Submit'])
                ->get('/logout', [Core\Login::class, 'logout'])
                ->get('/forgot', [Core\ForgotPass::class, 'forget'])
                ->post('/Setup', [Core\ForgotPass::class, 'Setup'])
                ->post('/forgot', [Core\ForgotPass::class, 'check'])

                ->get('/register', [Core\Register::class,'register'])
                ->post('/register', [Core\Register::class,'register']);
            //  $data = new Databases();

            echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>