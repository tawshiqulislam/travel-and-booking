<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";




mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
    echo ("Connection Error");
}
//get data from the form


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $region = $_POST["region"];
    $district = $_POST["district"];
    $age = $_POST["age"];
    $map = $_POST["map"];
    $phone = $_POST["phone"];
    $nidNo = $_POST["nidNo"];
    $sql = "INSERT INTO `guides`(`name`, `region`, `district`, `map`, `age`, `nidNo`, `phone`, `available`) VALUES ( '$name',' $region ' ,'$district','$map','$age','$nidNo','$phone','yes')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "<script>alert('Record Save');</script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin - Guide</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/travel icon.jpg" style="width:50px; height:50px" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/travel text.jpg" style="height:40px" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">Admin</span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php require_once 'navbar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Guides</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="adminLogout.php" class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Log Out</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="row col-md-6" style="display: flex;">
                <div class="col-md-4 ">
                    <a href="#busdata">
                        <div class=" btn-primary btn-block btn-lg">Guide Data</div>
                    </a>
                </div>
                <div class="  col-md-4">
                    <a href="#bokingdata">
                        <div class="  btn-primary btn-block btn-lg">Guide Hired</div>
                    </a>
                </div>
            </div>





            <div class="container-fluid">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="">
                                <h4>Guide ID (Use to Search guide's detail)</h4>
                                <input type="number" name="guideID" class="form-control" placeholder="Guide ID /Automatic Number Genrates" value="" disabled>

                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <h4>Name</h4>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name " required>
                                    </div>


                                    <div class="col-xs-6">
                                        <h4>Select region</h4>
                                        <div><select class="form-control" name="region" required />
                                            <option value="">Select</option>

                                            <?php
                                            require_once "Database_conn.php";
                                            $s = "select * from region";
                                            $result = mysqli_query($conn, $s);
                                            $r = mysqli_num_rows($result);
                                            //echo $r;

                                            while ($data = mysqli_fetch_array($result)) {
                                                if (isset($_POST["show"]) && $data[0] == $_POST["region"]) {
                                                    echo "<option value=$data[0] selected='selected'>$data[1]</option>";
                                                } else {
                                                    echo "<option value=$data[0]>$data[1]</option>";
                                                }
                                            }



                                            ?>
                                            </select>
                                            <input type="submit" value="Show" name="show" formnovalidate />
                                        </div>

                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Select District</h4>
                                        <div><select class="form-control" name="district" required />
                                            <option value="">Select</option>


                                            <?php

                                            $s = "select * from district";
                                            $result = mysqli_query($conn, $s);
                                            $r = mysqli_num_rows($result);
                                            //echo $r;

                                            while ($data = mysqli_fetch_array($result)) {
                                                if (isset($_POST["show"])) {
                                                    if ($data[2] == $_POST["region"]) {
                                                        echo "<option value=$data[0] >$data[1]</option>";
                                                    } else {
                                                        //	echo "<option value=$data[0]>$data[1]</option>";
                                                    }
                                                }
                                            }



                                            ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-xs-6">
                                        <h4>Age</h4>
                                        <input type="number" name="age" class="form-control" placeholder="Enter Age " value="" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Phone No </h4>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone No" value="" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>NID No</h4>
                                        <input type="text" name="nidNo" class="form-control" placeholder="Enter NID Number" value="" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Embed Map</h4>
                                        <input type="text" name="map" class="form-control" placeholder="Enter embeded map" value="" required>
                                    </div>


                                    <div>
                                        <input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Add">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>