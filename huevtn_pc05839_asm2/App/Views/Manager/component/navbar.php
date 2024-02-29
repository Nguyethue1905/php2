<!-- Content Start -->
<?php

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

?>

<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex m-2 p-0" action="<?=ROOT_URL?>?url=WorkController/SearchWork" style="height:40px;" method="post">
            <input class="form-control border-0 " type="search" placeholder="Search" name="key">
            <!-- <button type="submit" name="submit" class='btn btn-outline-primary '>O</button> -->
        </form>
        <form action="<?=ROOT_URL?>?url=WorkController/create" method="post" style="margin-left: 20%;">
            <button type="submit" class="btn btn-success rounded-pill m-20" >New Job</button>
        </form>
        <div class="navbar-nav align-items-center ms-auto">
                <a href="<?= ROOT_URL ?>?url=HomeController/homePage" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notificatin</span>
                </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="../../../public/img/<?=$user['avatar']?? 'avatar.jfif'?>" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?=$user['nameUser']?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="<?=ROOT_URL?>?url=ProfileContronller/index" class="dropdown-item">My Profile</a>
                    <a href="<?=ROOT_URL?>?url=LoginController/logout" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->