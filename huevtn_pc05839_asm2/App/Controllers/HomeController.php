<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\User;
use App\Models\Work;
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
        $login = new LoginController();
        if (isset($_SESSION['user'])) {
            $new = new Work();
            $data1 = $new->countJob('jobDetailID');
            $user = $new->selectUser();
            $data = [
                $user,
                $data1
            ];
            $this->_renderBase->renderSidebar();
            $this->_renderBase->renderNavbar();
            $this->load->render('Manager/home', $data[1]);
            $this->load->render('Manager/tableUser', $data[0]);
            // var_dump($user[0]['name']);
            $this->_renderBase->renderFooter();
        } else {
            $login->login();
        }
    }
    function homePageStaff()
    {
        $login = new LoginController();
        if (isset($_SESSION['user'])) {
            $new = new Work();
            $data1 = $new->countJob('jobDetailID');
            $user = $new->selectUser();
            $data = [
                $user,
                $data1
            ];
            $this->_renderBase->renderStaffSidebar();
            $this->_renderBase->renderStaffNavbar();
            $this->load->render('Staff/home', $data[1]);
            $this->load->render('Manager/tableUser', $data[0]);
            // var_dump($user[0]['name']);
            $this->_renderBase->renderStaffFooter();
        } else {
            $login->login();
        }
    }




}
