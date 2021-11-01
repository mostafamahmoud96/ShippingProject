<?php

session_start();

require_once "connection.php";

if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    header('Location: /shippingProject/login.php');
    exit;
} elseif (!isset($_SESSION['login'])) {
    header('Location: /ShippingProject/login.php');
    exit;
}

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
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- <li class="sidebar-title">Menu</li> -->
                        <li class="sidebar-item">
                            <a href="<?php echo '?sub=items&title=list'; ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Shipped Items</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo '?sub=trans&title=list'; ?>" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Transportation Events</span>
                            </a>

                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo '?sub=retails&title=list'; ?>" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Retails Centers</span>
                            </a>

                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo '?title=list&sub=track'; ?>" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Track Shipped items</span>
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

                            if (isset($_GET['title'])) {

                                include "$_GET[title].php";
                            } else {

                                $item_query = "SELECT (id) FROM  shipped_items";
                                $item_result = mysqli_query($conn, $item_query);
                                $trans_query = "SELECT (id) FROM transportation_events";
                                $trans_result = mysqli_query($conn, $trans_query);
                                $retail_query = "SELECT (id) FROM retail_center";
                                $retail_result = mysqli_query($conn, $retail_query);
                                $track_query = "SELECT DISTINCT (id) FROM item_transportation";
                                $track_result = mysqli_query($conn, $track_query);
                            ?>
                                <nav class="navbar navbar-expand navbar-light ">
                                    <div class="container-fluid">
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                                <li class="nav-item dropdown me-1">
                                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-envelope bi-sub fs-4 text-gray-600"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <h6 class="dropdown-header">Mail</h6>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown me-3">
                                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <h6 class="dropdown-header">Notifications</h6>
                                                        </li>
                                                        <li><a class="dropdown-item">No notification available</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="user-menu d-flex">
                                                        <div class="user-name text-end me-3">
                                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                                        </div>
                                                        <div class="user-img d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img src="assets/images/faces/1.jpg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <h6 class="dropdown-header">Hello, John!</h6>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                                            Profile</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                                            Settings</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                                            Wallet</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                <h1 style='text-align:center' class="p-5 m-5">
                                    Welcome To UPS Shipping System

                                </h1>
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldShow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Shipped Items</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo mysqli_num_rows($item_result); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Retail Centers</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo mysqli_num_rows($retail_result); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldAdd-User"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Transportation Events</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo mysqli_num_rows($trans_result); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon red">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Shipping Orders</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo mysqli_num_rows($track_result); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                    </section>
                </div>
            </div>
        </div>
        <footer>
          
        </footer>
    </div>
    </div>
    <script src="dashboardTemplate/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dashboardTemplate/dist/assets/js/bootstrap.bundle.min.js"></script>

    <script src="dashboardTemplate/dist/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="dashboardTemplate/dist/assets/js/pages/dashboard.js"></script>
    <script src="dashboardTemplate/dist/assets/js/main.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>