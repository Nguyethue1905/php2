

       <!-- Sidebar Start -->
       <?php
       include './component/sidebar.php';
       ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
           <?php
                include './component/navbar.php';
           ?>
            <!-- Navbar End -->

            <!-- content -->
            <?php
                $action = "home";
                if (isset($_GET['act']))
                    $action = $_GET['act'];
                switch ($action) {
                    case "home":
                        include './home.php';
                        break;
                    case "add":
                        include './addList.php';
                        break;
                    case "worklist":
                        include './workList.php';
                        break;
                    case "complete":
                        include './completedWork.php';
                        break;
                    case "unfinished":
                        include './unfinishedWork.php';
                        break;
                    case "staff":
                        include './listStaff.php';
                        break;
                    case "notification":
                        include './notification.php';
                        break;
                    }
            ?>

            <!-- content end -->

            <!-- Footer Start -->
            <?php
            include './component/footer.php';
            ?>
            <!-- Footer End -->
