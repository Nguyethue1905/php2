<?php
namespace App\Model;
// Abstract
abstract class  BaseModel{
    protected $connection;
    abstract function connect();
    abstract function Play();
    abstract function Add();
    abstract function Change();
    abstract function Delete();
}



?>