<?php
class Demo{
    public $public = "Truy cập ở bất cứ đâu";
    private $private = "Truy cập ở trong class";
    protected $protected = "Truy cập ở trong class và class kế thừa";

    public function setName() {
       echo $this->public;
       echo $this->private;
       echo $this->protected;
    }

   
}

class small extends Demo {
    public function Select() {
        echo $this->public.'<br>';
        // echo $this->private; // private chỉ truy cập được trong class đã khai báo 
        echo $this->protected.'<br>';
      
    }
}

$text = new Demo();
echo $text->public.'<br>';
// echo $this->private; Lỗi vì chỉ truy cập được trong class đã khai báo 
// echo $this->protected; Lỗi vì protected chỉ truy cập ở trong class và class kế thừa


$text2 = new small();
$text2->Select();
?>