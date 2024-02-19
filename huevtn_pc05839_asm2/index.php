<?php
session_start();
ob_start();
require_once 'vendor/autoload.php';
define("ROOT_URL", "http://localhost:8000/");

use App\Controllers\BaseController;
use App\Controllers\HomeController;
use App\Controllers\StaffController;
use App\Controllers\WorkController;
use App\Core\Route;

new BaseController();

new HomeController();
new StaffController();
new WorkController();

new Route;
use App\Models\User;

// $userModel = new User();
// var_dump($userModel->getOneUser(2));
// $category=new Category();
// var_dump($category->deleteCategory(1));

ob_end_flush();

?>