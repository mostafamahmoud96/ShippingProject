<?php
session_start();
require_once "connection.php";
// require_once "cookies.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.php";
    ?>
</head>

<body>
    <div id="app">
        <!-- sidebar start -->
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <li class="sidebar-title">Menu</li>

                            <!-- <img src="logo.png" alt="Logo"  style="width:250px;height:auto;"> -->
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- <li class="sidebar-title">Menu</li> -->
                        <li class="sidebar-item">
                            <a href="<?php echo '?sub=items&title=list';?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Shipped Items</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo '?sub=trans&title=list';?>" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Transportation Events</span>
                            </a>

                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo '?sub=retails&title=list';?>" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Retails Centers</span>
                            </a>

                        </li>
                        <li class="sidebar-item">
                            <a href="logout.php" class='sidebar-link' tite="Logout"><i class="bi bi-x bi-middle"></i><span>Logout</span></a>
                        </li>


                </div>
            </div>


            <div id="main" name="main">

                <div class="page-content" id="page-content">
                    <section class="row">
                        <div class="col-12" id="page-content">


                            <?php
                     
                            include "$_GET[title].php";
                            // include "list.php";


                            ?>

                    </section>
                </div>
            </div>
        </div>
        <footer>
            <!-- <div class="footer clearfix mb-0  text-muted" style="margin-bottom: 0%;">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div> -->
        </footer>
    </div>
    <!-- /var/www/html/quizSystem/dashboardTemplate/dist/assets -->
    </div>
    <script src="dashboardTemplate/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dashboardTemplate/dist/assets/js/bootstrap.bundle.min.js"></script>

    <script src="dashboardTemplate/dist/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="dashboardTemplate/dist/assets/js/pages/dashboard.js"></script>

    <script src="dashboardTemplate/dist/assets/js/main.js"></script>

</body>

</html>