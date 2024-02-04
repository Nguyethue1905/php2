<?php
namespace App\Model;

class RunModel extends BaseModel{
    public function __construct()
    {
        echo '<br/> <b>Lab3</b><br />';
        echo ' Abstract <br/>';
    }
    public function connect()
    {
        echo 'Kết nối thành công !<br/>';
    }
    public function Play(){
        echo 'Xem dữ liệu <br/>';
    }
    public function Add(){
        echo 'Thêm dữ liệu <br/>';
    }
    public function Change(){
        echo 'Đổi dữ liệu <br/>';
    }
    public function Delete(){
        echo 'Xóa dữ liệu <br/><br/><br/>';
    }
}