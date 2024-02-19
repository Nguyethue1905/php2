<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;
use App\Controllers\LoginController;


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

    function homePage()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $login = new LoginController();
        if (isset($_SESSION['user'])) {

            $this->_renderBase->renderSidebar();
            $this->_renderBase->renderNavbar();
            $this->load->render('Manager/home');
            $this->_renderBase->renderFooter();
        } else {
            $login->login();
        }
    }
    function homePageStaff()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $login = new LoginController();
        if (isset($_SESSION['user'])) {

            $this->_renderBase->renderStaffSidebar();
            $this->_renderBase->renderStaffNavbar();
            $this->load->render('Staff/home');
            $this->_renderBase->renderStaffFooter();
        } else {
            $login->login();
        }
    }


}
