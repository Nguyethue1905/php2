<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <style>
        .border-danger {
            border-color: red !important;
        }
    </style>


    <div class="container-fluid pt-4 px-4">
    <section style="background-color: #eee;">
        <div class="row g-4 p-5">
         
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div id="elementMessage" class="alert alert-success mb-3 position-fixed top-0 end-0 mt-3" style="z-index: 9999;">
             
               <span class="glyphicon glyphicon-ok"></span> <strong>Thông báo!</strong>
                <hr class="message-inner-separator">
                <p>
                    ' . $_SESSION['success'] . '</p>
            </div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<div id="elementMessage" class="alert alert-danger mb-3 position-fixed top-0 end-0 mt-3" style="z-index: 9999;"">
               
                <span class="glyphicon glyphicon-hand-right"></span> <strong>Cảnh báo</strong>
                <hr class="message-inner-separator">
                <p>
                    ' . $_SESSION['error'] . '</p>
            </div>';
                    unset($_SESSION['error']);
                }
                //        var_dump($dataId);


                ?>
                <script>
                    setTimeout(function() {
                        var element = document.getElementById("elementMessage");
                        var opacity = 1; // bắt đầu với opacity là 1
                        var timer = setInterval(function() {
                            if (opacity <= 0.1) {
                                clearInterval(timer);
                                element.style.display = 'none';
                            }
                            element.style.opacity = opacity;
                            opacity -= opacity * 0.1;
                        }, 50);
                    }, 3000);
                </script>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <?php 
                            $userID = $data['userID'];
                            ?>
                            <form method="post" action="<?= ROOT_URL ?>?url=ProfileContronller/uploadIMGStaff/<?=$userID?>" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <img src="../../../public/img/<?= $data['avatar'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 100px; height:100px;">
                                    <h5 class="my-3"><?= $data['nameUser'] ?></h5>
                                    <p class="text-muted mb-4"><?= $data['phone'] ?? 'Add phone' ?></p>
                                    <input type="file" name="avatar" class="form-control w-50 border-0 justify-content-center centered">
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="submit" class="btn btn-outline-primary ms-1" name="submit">IMG</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="post" action="<?= ROOT_URL ?>?url=ProfileContronller/editInforStaff/<?= $data['userID'] ?>">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Name User</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0" name="nameUser" value="<?= $data['nameUser'] ?>"  style="width: 100%;">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0 disabled" name="email" value="<?= $data['email'] ?>"  style="width: 100%;">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Password</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0 disabled" type="password" name="password" value="<?= $data['password'] ?>"  style="width: 100%;">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0" name="phone" value="<?= $data['phone'] ?>"  style="width: 100%;">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Position</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0" type="text" name="position" value="<?= $data['position'] ?>" style="width: 100%;">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Company</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0" name="nameCompany" value="<?= $data['nameCompany'] ?>"  style="width: 100%;" >
                                        </div>
                                    </div>
                                    <hr>
                                   
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Status</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="text-muted mb-0 border-0" type="text" name="" value="<?= $data['status'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary" name="change">Sửa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
       
    </div>
    </section>
</div>
<!-- Recent Sales End -->