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
class Kitty extends Dog
{
public function message()
{
echo "Hello, my name is " . $this->name . ", has " . $this->color . " color";
}
}