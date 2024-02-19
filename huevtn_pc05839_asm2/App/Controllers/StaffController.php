<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Work;

class StaffController extends BaseController
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

    function index()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model

        $category = new Work();
        $data = $category->getAll();
        $this->_renderBase->renderSidebar();
        $this->_renderBase->renderNavbar();
        // $this->load->render('layouts/client/slider');
        $this->load->render('Manager/listStaff', $data);
        // var_dump($data);
        $this->_renderBase->renderFooter();
    
    }
    function indexStaff()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model

        $category = new Work();
        $data = $category->getAll();
        $this->_renderBase->renderStaffSidebar();
        $this->_renderBase->renderStaffNavbar();
        // $this->load->render('layouts/client/slider');
        $this->load->render('Manager/listStaff', $data);
        // var_dump($data);
        $this->_renderBase->renderStaffFooter();
    
    }

    function edit(){
        $category = new Work();
        $data = $category->getAll();
        $this->_renderBase->renderSidebar();
        $this->_renderBase->renderNavbar();
        $this->load->render('Manager/editUser', $data);
        $this->_renderBase->renderFooter();
    }
}