<?php

namespace App\Core;

use App\Controllers\Manager\BaseController;

class BaseRender extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function renderNavbar(){
        $this->load->render('Manager/component/navbar');
    }

    public function renderSidebar(){
        $this->load->render('Manager/component/sidebar');
    }
    public function renderFooter(){
        $this->load->render('Manager/component/footer');
    }

    public function renderStaffNavbar(){
        $this->load->render('Staff/component/navbar');
    }
    public function renderStaffSidebar(){
        $this->load->render('Staff/component/sidebar');
    }
    public function renderStaffFooter(){
        $this->load->render('Staff/component/footer');
    }


}