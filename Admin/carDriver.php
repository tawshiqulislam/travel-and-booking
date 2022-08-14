<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$carID = "";
$carType = "";
$carModel = "";
$carNo = "";
$driverName = "";
$driverPhone = "";

$driverRating = "";
$available = "Yes";



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (MySQLi_Sql_Exception $ex) {
    echo ("Connection Error");
}
//get data from the form
function getData()
{
    $data = array();

    $data[1] = $_POST['carType'];
    $data[2] = $_POST['carModel'];
    $data[3] = $_POST['carNo'];
    $data[4] = $_POST['driverName'];
    $data[5] = $_POST['driverphone'];
    $data[6] = $_POST['driverRating'];
    $data[7] = $_POST['available'];
    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM flights WHERE flight_no = '$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $flight_no = $rows['flight_no'];
                $origin = $rows['origin'];
                $destination = $rows['destinattion'];
                $distance = $rows['distance'];
                $fare = $rows['fare'];
                $class = $rows['class'];
                $seats_available = $rows['seats_available'];
                $departs = $rows['departs'];
                $arrives = $rows['arrives'];
                $operator = $rows['operator'];
                $origin_code = $rows['origin_code'];
                $destination_code = $rows['destination_code'];
                $refundable = $rows['refundable'];
                $noOfBookings = $rows['noOfBookings'];
                $date = $rows['date'];
            }
        } else {
            echo ("No data are available");
        }
    } else {
        echo ("Result error");
    }
}
//insert
if (isset($_POST['insert'])) {
    $info = getData();
    $insert_query = "INSERT INTO `cardriver`(`carType`, `carModel`, `carNo`,`driverName`,`driverPhone`,`driverRating`,`available`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]')";
    try {
        $insert_result = mysqli_query($conn, $insert_query);
        if ($insert_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data inserted successfully");
            } else {
                echo ("Data not inserted");
            }
        }
    } catch (Exception $ex) {
        echo ("error inserted" . $ex->getMessage());
    }
}
//delete
if (isset($_POST['delete'])) {
    $info = getData();
    $delete_query = "DELETE FROM `flights` WHERE flight_no = '$info[0]'";
    try {
        $delete_result = mysqli_query($conn, $delete_query);
        if ($delete_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data deleted");
            } else {
                echo ("Data not deleted");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in deleting" . $ex->getMessage());
    }
}
//edit
if (isset($_POST['update'])) {
    $info = getData();
    $update_query = "UPDATE `flights` SET origin='$info[1]',destination='$info[2]',distance='$info[3]',fare='$info[4]',class='$info[5]',seats_available='$info[6]',departs='$info[7]',arrives='$info[8]',operator='$info[9]',origin_code='$info[10]',destination_code='$info[11]',refundable='$info[12]',noOfBookings='$info[13]',date='$info[14]' WHERE flight_no = '$info[0]'";
    try {
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data updated");
            } else {
                echo ("Data not updated");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in updating" . $ex->getMessage());
    }
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
    <title>Admin - Driver</title>

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
                    <a class="navbar-brand" href="dashboard.php">
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
                        <h4 class="page-title">Car Driver</h4>
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


            <div class="container-fluid">
                <div class="col-lg-8 col-xlg-9 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="">
                                <h4>Cab driver Number (Use to Search Cab Driver's details)</h4>
                                <input type="number" name="cabID" class="form-control" placeholder="Cab No. /Automatic Number Genrates" value="<?php echo ($cabID); ?>" disabled>
                                <div class="col-xs-6">
                                    <h4>Car</h4>
                                    <select id="carType" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select car type" value="<?php echo ($carType); ?>" name="carType" required>
                                        <option value="Privet Car" data-tokens="Privet Car">Privet Car</option>
                                        <option value="Micro Bus" data-tokens="Micro Bus">Micro Bus</option>
                                        <option value="Mini Bus" data-tokens="Mini Bus">Mini Bus</option>
                                        <option value="Zeep" data-tokens="Zeep">Zeep</option>
                                        <option value="Big Bus" data-tokens="Big Bus">Big Bus</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <h4>Car Model</h4>
                                    <select id="carModel" placeholder="Enter car model" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination Code" value="<?php echo ($carModel); ?>" name="carModel" required>
                                        <option value="Toyota noah" data-tokens="Toyota noah">Toyota noah</option>
                                        <option value="Honda" data-tokens="Honda">Honda</option>
                                        <option value="Nissan X Trail" data-tokens="Nissan X Trail">Nissan X Trail</option>
                                        <option value="ISUZU" data-tokens="ISUZU">ISUZU</option>
                                        <option value="SCANIA" data-tokens="SCANIA">SCANIA</option>
                                        <option value="HYUNDAI" data-tokens="CXB Coxs Bazar">HYUNDAI</option>
                                    </select>
                                </div>

                                <div class="col-xs-6">
                                    <h4>carNo</h4>
                                    <input type="text" id="carModel" placeholder="Enter car model" name="distance" class="form-control" value="<?php echo ($distance); ?>" required>
                                </div>
                                <div class="col-xs-6">
                                    <h4>driverName</h4>
                                    <input type="time" class="form-control" name="time" placeholder="Time" value="<?php echo ($time); ?>" required>
                                </div>

                                <div class="col-xs-6">
                                    <h4>driverPhone</h4>
                                    <input type="number" name="fare" class="form-control" placeholder="Enter fare" value="<?php echo ($fare); ?>" required>
                                </div>







                                <div>
                                    <input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">

                                    <br>
                                    <br>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">

                    <div class="white-box">

                        <div class="table-responsive">
                            <h1 class="table text-danger text-center">FLIGHTS INFORMATION</h1>
                            <hr>

                            <br>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "tourntravel";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM cabDriver";
                            $result = $conn->query($sql);

                            echo "<div class='col-xs-6'>
                                                <table class=' text-nowrap  table table-hover py-5' >
                                                <tr class='text-centre text-white'style='font-size:18px; background:gray;'>
                                                <th>carID</th>
                                                <th>Car type</th>
                                                <th>Car Model</th>
                                                <th>Car No</th>
                                                <th>Driver Name</th>
                                                <th>Driver Phone</th>
                                          
                                                <th>Driver Rating</th>
                                                <th>Available</th>
                                           
                                               

                                                                </tr>
                                                                </div>";

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $row['carID'] . "</td>";
                                    echo "<td>" . $row['carType'] . "</td>";
                                    echo "<td>" . $row['carModel'] . "</td>";
                                    echo "<td>" . $row['carNo'] . "</td>";
                                    echo "<td>" . $row['driverName'] . "</td>";

                                    echo "<td>" . $row['driverPhone'] . "</td>";
                                    echo "<td>" . $row['driverRating'] . "</td>";

                                    echo "<td>" . $row['Available'] . "</td>";

                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                            ?>
                        </div>


                    </div>
                    <!-- ============================================================== -->
                    <!-- End Page wrapper  -->
                    <!-- ============================================================== -->


                </div>
            </div>



            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
        </div>
    </div>

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