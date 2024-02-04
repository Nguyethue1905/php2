<?php

namespace  Core;

class Home
{
    public function index(): string
    {
        return <<<FORM
        <form action="upload" method="post" enctype="multipart/form-data">
            <input type="file" name="receipt"  class="form-control"/>
            <button type="submit" name="submit" class="btn btn-primary py-1 w-20 mb-1">Upload</button>
        </form>
        FORM;
    }

    function upload()
    {
        //var_dump($_FILES);
        // $filePath = 'STORAGE_PATH'.'/'. $_FILES['receipt']['name'];
        // move_uploaded_file(
        //     $_FILES['receipt']['tmp_name'],
        //     $filePath
        // );
        // var_dump(pathinfo($filePath));
        // //đ

        // / Set the default timezone to use.
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        if (isset($_POST['submit'])) {
            echo '<pre>';

            $old_name = $_FILES['receipt']['name'];
            echo $old_name . '<br>';

            $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);

            $new_name = date('YmdHis') . '.' . $file_extension;
            echo $new_name . '<br>';

            move_uploaded_file($_FILES['receipt']['tmp_name'], 'STORAGE_PATH/' . $new_name);
          
        }
    }
}
