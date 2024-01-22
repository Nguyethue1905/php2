<?php
namespace annimal;
use annimal\Dog;

class Kitty extends Dog
{
    public function message()
    {
        echo "Hello, my name is " . $this->name . ", has " . $this->color . " color";
    }
}
