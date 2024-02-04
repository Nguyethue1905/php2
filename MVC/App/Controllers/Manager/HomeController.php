<?php

namespace App\Controllers\Manager;

use App\Controllers\Manager\BaseController;
use App\Core\BaseRender;

class HomeController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }

    // function HomeController()
    // {
    //     $this->homePage();
    // }

    function homePage()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $data = [

            "products" => [
                [
                    "id" => 1,
                    "name" => "Sản phẩm"
                ]
            ]
        ];


        $this->_renderBase->renderNavbar();
        // $this->load->render('layouts/client/slider');
        $this->load->render('Manager/home');
        $this->_renderBase->renderFooter();
    }

}
