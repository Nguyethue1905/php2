<?php
namespace annimal;
class Dog
{
public $name;
public $color;
public function __construct($name, $color)
{
$this->name = $name;
$this->color = $color;
}
public function getInfo()
{
echo "The dog is {$this->name} and the color is {$this->color}.";
}
}
