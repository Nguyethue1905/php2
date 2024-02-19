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

        $category = new Work();
        $data = $category->getAllJob('userID', 'nameUser');
        $this->_renderBase->renderSidebar();
        $this->_renderBase->renderNavbar();
        $this->load->render('Manager/workList', $data);
        // var_dump($data);
        $this->_renderBase->renderFooter();
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
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $new_name);

            $nameJob = $_POST['nameJob'];
            $dateStart = $_POST['dateStart'];
            $dateEnd = $_POST['dateEnd'];
            $userID = $_POST['nameStaff'];

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
            $data = [
                'nameJob' => $_POST['nameJob'],
                'dateStart' => $_POST['dateStart'],
                'dateEnd' => $_POST['dateEnd'],
                'file' => $new_name,
                'note' => $_POST['note'],
                'userID' => $_POST['nameStaff']

            ];

            $work = new Work();
            $result = $work->addWork($data);
            // var_dump($result);
            if ($result) {
                header('location: ' . ROOT_URL . '?url=WorkController/index');
            } else {
                echo 'them loi';
            }
        } else {
            echo 'ko submit';
        }
    }
}
