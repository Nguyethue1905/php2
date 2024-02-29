<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PassWord</title>
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

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>OTP</h3>
                        </div>
                        <?php 
                              if(isset($_SESSION['error'])){
                                echo "<p style='color:red;'>".$_SESSION['error']."</p>";
                                unset( $_SESSION['error'] );
                              }
                            ?>
                        <form method="post" action="<?= ROOT_URL ?>?url=ForgotController/updatePass">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="code">
                                <label for="floatingInput">Code</label></label>
                            </div>
                            <p>Send Email</p>
                            <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">ReSet Password</button>
                            <p class="text-center mb-0">New Pass</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../public/lib/chart/chart.min.js"></script>
    <script src="../../../../public/lib/easing/easing.min.js"></script>
    <script src="../../../../public/lib/waypoints/waypoints.min.js"></script>
    <script src="../../../../public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../../../public/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../../../public/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../../../public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../../../public/js/main.js"></script>
</body>

</html>