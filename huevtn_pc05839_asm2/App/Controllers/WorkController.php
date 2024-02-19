<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Work;
use App\Models\Detail;

class WorkController extends BaseController
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
        $this->load->render('Manager/workList', $data);
        // var_dump($data);
        $this->_renderBase->renderFooter();
    }
    function indexStaff()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $category = new Detail();
        $data = $category->getDetail('userID', 'jobID', 'StaffID');

        $this->_renderBase->renderStaffSidebar();
        $this->_renderBase->renderStaffNavbar();
        $this->load->render('Staff/workList', $data);
        // var_dump($data);
        $this->_renderBase->renderStaffFooter();
    }

    function create()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $category = new Work();
        $data = $category->getAlluser();
        $this->_renderBase->renderSidebar();
        $this->_renderBase->renderNavbar();
        $this->load->render('Manager/addList', $data);
        // var_dump($data);
        $this->_renderBase->renderFooter();
    }

    public function emptyInput($nameJob, $dateStart, $dateEnd, $userID)
    {
        return empty($nameJob) || empty($dateStart) || empty($dateEnd) || empty($userID);
    }
    function store()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (isset($_POST['submit'])) {
            // var_dump($_POST);

            $old_name = $_FILES['file']['name'];
            $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = date('YmdHis') . '.' . $file_extension;
            move_uploaded_file($_FILES['file']['tmp_name'], 'public/uploads/' . $new_name);

            $nameJob = $_POST['nameJob'];
            $dateStart = $_POST['dateStart'];
            $dateEnd = $_POST['dateEnd'];
            $userID = $_POST['nameStaff'];
            // echo $new_name;
            // exit();
            if ($this->emptyInput($nameJob, $dateStart, $dateEnd, $userID)) {
                echo $_SESSION['message'] = '
                <div class="error">
                    <p style="color: red;">
                    Please fill in the information
                    </p>
                </div>
                ';
                header('location: ' . ROOT_URL . '?url=WorkController/create');
            }
            $id = $_SESSION['user'];
            $data = [
                'nameJob' => $_POST['nameJob'],
                'dateStart' => $_POST['dateStart'],
                'dateEnd' => $_POST['dateEnd'],
                'file' => $new_name,
                'note' => $_POST['note'],
                'userID' => $id['userID']


            ];
            $work = new Work();
            $result = $work->addWork($data);

            if ($result) {
                $data = [
                    'jobID' => $result,
                    'StaffID' => $_POST['nameStaff'],
                ];
                // var_dump($result); exit();
                $detail = new Detail();
                $results = $detail->addJob($data);


                if ($result) {
                    header('location: ' . ROOT_URL . '?url=WorkController/index');
                } else {
                    echo 'them loi';
                }
            } else {
                echo ' ko thêm đc';
            }
        } else {
            echo 'ko submit';
        }
    }

    function down()
    {
        if (isset($_GET['file'])) {
            $file = $_GET['file'];
            if (file_exists($file) && is_readable($file)) {
                header('Content-Type: application/octet-stream');
                header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
                readfile($file);
            }
        }
    }

    function start($jobID)
    {
        $start =  new Detail();
        $result = $start->updateStart($jobID);
        header('location: ' . ROOT_URL . '?url=WorkController/indexStaff');
    }
    function finish($jobID)
    {
        $start =  new Detail();
        $result = $start->updateProgess($jobID);
        header('location: ' . ROOT_URL . '?url=WorkController/indexStaff');
    }

    function edit($id)
    { 
        
        $category = new Detail();
        $data = $category->getDetailID('userID', 'jobID', $id,'StaffID');
        $this->_renderBase->renderSidebar();
        // echo '<pre>';
        // var_dump();
        $this->_renderBase->renderNavbar();
        $this->load->render('Manager/editWork', $data);
       
        $this->_renderBase->renderFooter();
    }

    function editWork($id){
        if(isset($_POST['submit'])){
            $data = [
                'dateStart' => $_POST['dateStart'],
                'dateEnd' => $_POST['dateEnd'],
                'note' => $_POST['note']
               
            ];
            var_dump($data);
            $work = new Work();
            $go = $work->updateWork($id, $data);
            header('location: ' . ROOT_URL . '?url=WorkController/index');
        }
    }

    function deleteWork($jobID){
        // var_dump($jobID);
        $start =  new Work();
        $result = $start->deleteW1($jobID);
        $result = $start->deleteW($jobID);
        header('location: ' . ROOT_URL . '?url=WorkController/index');
    }
}
