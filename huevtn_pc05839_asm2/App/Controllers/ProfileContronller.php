<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Work;
use App\Models\User;
use App\Models\Detail;

class ProfileContronller extends BaseController
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
        $id = $_SESSION['user'];
        $userID = $id['userID'];
        $user = new User();
        $data = $user->getUserOne($userID);
        $this->_renderBase->renderSidebar();
        $this->_renderBase->renderNavbar();
        $this->load->render('Manager/profile', $data);
        // var_dump($data);
        $this->_renderBase->renderFooter();
    }
    function indexStaff()
    {
        $id = $_SESSION['user'];
        $userID = $id['userID'];
        $user = new User();
        $data = $user->getUserOne($userID);
        $this->_renderBase->renderStaffSidebar();
        $this->_renderBase->renderStaffNavbar();
        $this->load->render('Staff/profile', $data);
        $this->_renderBase->renderStaffFooter();
    }

    function uploadIMG($userID){
        if(isset($_POST['submit'])){
            $user = new User();
            $old_name = $_FILES['avatar']['name'];
            $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = date('YmdHis') . '.' . $file_extension;
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/img/' . $new_name);
    
            $avatar = $new_name;
            $ava = $user->uploaAvatar($userID, $avatar);
            var_dump($ava); 
            // exit();
            header('Location: ' . ROOT_URL . '?url=ProfileContronller/index');
        }else{
            header('Location: ' . ROOT_URL . '?url=ProfileContronller/index');
        }
      
    }
    function uploadIMGStaff($userID){
        if(isset($_POST['submit'])){
            $user = new User();
            $old_name = $_FILES['avatar']['name'];
            $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = date('YmdHis') . '.' . $file_extension;
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/img/' . $new_name);
    
            $avatar = $new_name;
            $ava = $user->uploaAvatar($userID, $avatar);
            var_dump($ava); 
            // exit();
            header('Location: ' . ROOT_URL . '?url=HomeController/homePageStaff');
        }else{
            header('Location: ' . ROOT_URL . '?url=ProfileContronller/indexStaff');
        }
      
    }

    function editInfor(){
        if(isset($_POST['change'])){
            $arr = $_SESSION['user'];
            $id = $arr['userID'];
            $data = [
                'nameUser' => $_POST['nameUser'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'position' => $_POST['position'],
                'phone' => $_POST['phone'],
                'nameCompany' => $_POST['nameCompany'],
            ];
            $profile = new User();
            $edit = $profile->updateList($id,  $data);
            header('Location: ' . ROOT_URL . '?url=ProfileContronller/index');
        }
    }
    function editInforStaff(){
        if(isset($_POST['change'])){
            $arr = $_SESSION['user'];
            $id = $arr['userID'];
            $data = [
                'nameUser' => $_POST['nameUser'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'position' => $_POST['position'],
                'phone' => $_POST['phone'],
                'nameCompany' => $_POST['nameCompany'],
            ];
            $profile = new User();
            $edit = $profile->updateList($id,  $data);
            header('Location: ' . ROOT_URL . '?url=ProfileContronller/indexStaff');
        }
    }
   
}
