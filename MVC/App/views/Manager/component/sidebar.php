<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../../public/css/style.css" rel="stylesheet">
    <link href="../../../public/css/child.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
    
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="./../../../../App/views/Manager/index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../../../public/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Nguyệt Huế</h6>
                        <span>Manager</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="./../../../../App/views/Manager/index.php?act=home" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="./../../../../App/views/Manager/index.php?act=notification" class="nav-link dropdown-toggle"><i class="fa fa-laptop me-2"></i>Notification</a>
                    <a href="./../../../../App/views/Manager/index.php?act=worklist" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Work List</a>
                    <a href="./../../../../App/views/Manager/index.php?act=staff" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Staff List </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Settings</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="./../../../../App/views/Manager/signin.php" class="dropdown-item">Sign In</a>
                            <a href="./../../../../App/views/Manager/signup.php" class="dropdown-item">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->