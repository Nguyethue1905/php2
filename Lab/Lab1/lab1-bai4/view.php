<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
        position: relative;
        width: 80%;
        margin: 10%;
        
    }
 
</style>
<body>
    <h1>Bảng danh sách nhân viên</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Nhân viên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
               global $user;
               foreach($user as $row){
                $i = $count++;
            ?>
            <tr>
                <th scope="row"><?=$i?></th>
                <td><?=$row['nameStaff']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['gander']?></td>
                <td><?=$row['position']?></td>
                <td><button>Sửa</button></td>
                <td><button>Xóa</button></td>
            </tr>
            <?php
             }
            ?>
        </tbody>
    </table>
</body>

</html>