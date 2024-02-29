<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Work;
use App\Models\Detail;

class BellContronller extends BaseController
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
        $category = new Detail();
        $data = $category->getDetail('userID', 'jobID', 'StaffID');
        $this->_renderBase->renderSidebar();
        $this->_renderBase->renderNavbar();
        $this->load->render('Manager/notification', $data);
        // var_dump($data);
        $this->_renderBase->renderFooter();
    }
    function indexStaff()
    {
        $category = new Detail();
        $data = $category->getDetail('userID', 'jobID', 'StaffID');
        $this->_renderBase->renderStaffSidebar();
        $this->_renderBase->renderStaffNavbar();
        $this->load->render('Staff/notification', $data);
        // var_dump($data);
        $this->_renderBase->renderStaffFooter();
    }

   
}