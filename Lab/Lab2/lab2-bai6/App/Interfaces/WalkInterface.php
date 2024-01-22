<?php
namespace App\Interfaces;

class WalkInterface implements BaseInterface{
    public function __construct()
    {
        echo '<br/> Interface <br/>';
    }
    public function Connect(){
        echo 'Connect successfully <br/>';
    }
    public function Play(){
        echo 'Xem thành công <br/>';
    }
    public function Add(){
        echo 'Thêm thành công <br/>';
    }
    public function Change(){
        echo 'Đổi thành công <br/>';
    }
    public function Delete(){
        echo 'XÓa thành công <br/>';
    }
}
?>