<?php
require 'vendor/autoload.php';

use App\Core\Route;

$home = new Route();

use App\Controller\BaseControl;

$home = new BaseControl();

use App\Core\Database;;

$hello = new Database();
$hello->HelloWord();

use App\Model\RunModel;
$basemodel = new RunModel();
$basemodel->connect();
$basemodel->Play();
$basemodel->Add();
$basemodel->Change();
$basemodel->Delete();


use App\Interfaces\WalkInterface;
$baseInter = new WalkInterface();
$baseInter->connect();
$baseInter->Play();
$baseInter->Add();
$baseInter->Change();
$baseInter->Delete();
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

    <div class="container">
        <h1>Create an Account</h1>
        <?php
        $form = App\Core\Form::begin('', 'post');
        ?>
        <div class="row">
            <div class="col">
                <?php echo $form->field('firstname'); ?>
            </div>
            <div class="col">
                <?php echo $form->field('lastname'); ?>
            </div>
        </div>
        <?php
        echo $form->field('email');
        echo $form->field('password')->passwordField();
        echo $form->field('confirmPassword')->passwordField();
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php
        echo App\Core\Form::end();
        ?>
    </div>



</body>

</html>