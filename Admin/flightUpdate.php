<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$flight_no = "";
$origin = "";
$destination = "";
$distance = "";
$fare = "";
$class = "";
$seats_available = "";
$departs = "";
$arrives = "";
$operator = "";
$origin_code = "";
$destination_code = "";
$refundable = "";
$noOfBookings = "";
$date = "";

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

    $data[0] = $_POST['flight_no'];
    $data[1] = $_POST['origin'];
    $data[2] = $_POST['destination'];
    $data[3] = $_POST['distance'];
    $data[4] = $_POST['fare'];
    $data[5] = $_POST['class'];
    $data[6] = $_POST['seats_available'];
    $data[7] = $_POST['departs'];
    $data[8] = $_POST['arrives'];
    $data[9] = $_POST['operator'];
    $data[10] = $_POST['origin_code'];
    $data[11] = $_POST['destination_code'];
    $data[12] = $_POST['refundable'];
    $data[13] = $_POST['noOfBookings'];
    $data[14] = $_POST['date'];
    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM flights WHERE flight_no ='$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $flight_no = $rows['flight_no'];
                $origin = $rows['origin'];
                $destination = $rows['destination'];
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
    $insert_query = "INSERT INTO `flights`(`origin`, `destination`, `distance`, `fare`,`class`,`seats_available`,`departs`,`arrives`,`operator`,`origin_code`,`destination_code`,`refundable`,`noOfBookings`,`date`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]')";
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
    <title>Admin - Update flights</title>

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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="" target="_blank" class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Log Out</a>
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
                                <h4>Flight Number (Use to Search flight's details)</h4>
                                <input type="number" name="flight_no" class="form-control" placeholder="Flight No. /Automatic Number Genrates" value="<?php echo ($flight_no); ?>">

                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <h4>Origin</h4>
                                        <select id="origin" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin" value="<?php echo ($origin); ?>" name="origin" required>
                                            <option value="Dhaka" data-subtext="DAC" data-tokens="DAC Dhaka">Hazrat Shahjalal International Airport, Dhaka</option>
                                            <option value="Jashore" data-subtext="JSR" data-tokens="JSR Jashore">Jashore Airport, Jashore</option>
                                            <option value="Barishal" data-subtext="BZL" data-tokens="BZL Barishal">Barishal Airport, Barishal</option>
                                            <option value="Chattogram" data-subtext="CGP" data-tokens="CGP Chattogram">Shar Amanat International Airport, Chattogram</option>
                                            <option value="Sylhet" data-subtext="ZYL" data-tokens="ZYL Sylhet">Osmani International Airport, Sylhet</option>
                                            <option value="Coxs Bazar" data-subtext="CXB" data-tokens="CXB Coxs Bazar">Cox's Bazar Airport, Cox's Bazar</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Destination</h4>
                                        <select id="destination" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination" value="<?php echo ($destination); ?>" name="destination" required>
                                            <option value="Dhaka" data-subtext="DAC" data-tokens="DAC Dhaka">Hazrat Shahjalal International Airport, Dhaka</option>
                                            <option value="Jashore" data-subtext="JSR" data-tokens="JSR Jashore">Jashore Airport, Jashore</option>
                                            <option value="Barishal" data-subtext="BZL" data-tokens="BZL Barishal">Barishal Airport, Barishal</option>
                                            <option value="Chattogram" data-subtext="CGP" data-tokens="CGP Chattogram">Shar Amanat International Airport, Chattogram</option>
                                            <option value="Sylhet" data-subtext="ZYL" data-tokens="ZYL Sylhet">Osmani International Airport, Sylhet</option>
                                            <option value="Coxs Bazar" data-subtext="CXB" data-tokens="CXB Coxs Bazar">Cox's Bazar Airport, Cox's Bazar</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Distance</h4>
                                        <input type="number" name="distance" class="form-control" placeholder="Enter distance" value="<?php echo ($distance); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Fare</h4>
                                        <input type="number" name="fare" class="form-control" placeholder="Enter fare" value="<?php echo ($fare); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Class</h4>
                                        <input type="text" class="form-control" name="class" placeholder="Business or Economy" value="<?php echo ($class); ?>">
                                    </div>


                                    <div class="col-xs-6">
                                        <h4>Seats Available</h4>
                                        <input type="number" name="seats_available" class="form-control" placeholder="Enter number of seats available" value="<?php echo ($seats_available); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Departs from</h4>
                                        <input type="time" name="departs" class="form-control" placeholder="Enter departure" value="<?php echo ($departs); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Arrival at</h4>
                                        <input type="time" name="arrives" class="form-control" placeholder="Enter arrival" value="<?php echo ($arrives); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Operator</h4>
                                        <input type="text" name="operator" class="form-control" placeholder="Enter operator name" value="<?php echo ($operator); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Refundable</h4>
                                        <input type="text" name="refundable" class="form-control" placeholder="Refundable or non-refundable" value="<?php echo ($refundable); ?>">
                                    </div>


                                    <div class="col-xs-6">
                                        <h4>Origin Code</h4>
                                        <select id="origin" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin Code" value="<?php echo ($origin_code); ?>" name="origin_code" required>
                                            <option value="DAC" data-tokens="DAC Dhaka">Dhaka (DAC)</option>
                                            <option value="JSR" data-tokens="JSR Jashore">Jashore (JSR)</option>
                                            <option value="BZL" data-tokens="BZL Barishal">Barishal (BZL)</option>
                                            <option value="CGP" data-tokens="CGP Chattogram">Chattogram (CGP)</option>
                                            <option value="ZYL" data-tokens="ZYL Sylhet">Sylhet (ZYL)</option>
                                            <option value="CXB" data-tokens="CXB Coxs Bazar">Cox's Bazar (CXB)</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Destination Code</h4>
                                        <select id="destination" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination Code" value="<?php echo ($destination_code); ?>" name="destination_code" required>
                                            <option value="DAC" data-tokens="DAC Dhaka">Dhaka (DAC)</option>
                                            <option value="JSR" data-tokens="JSR Jashore">Jashore (JSR)</option>
                                            <option value="BZL" data-tokens="BZL Barishal">Barishal (BZL)</option>
                                            <option value="CGP" data-tokens="CGP Chattogram">Chattogram (CGP)</option>
                                            <option value="ZYL" data-tokens="ZYL Sylhet">Sylhet (ZYL)</option>
                                            <option value="CXB" data-tokens="CXB Coxs Bazar">Cox's Bazar (CXB)</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Number of Bookings</h4>
                                        <input type="number" name="noOfBookings" class="form-control" placeholder="Enter number of bookings" value="<?php echo ($noOfBookings); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Departure Date</h4>
                                        <input type="date" name="date" placeholder="Enter Departure Date" class="form-control" value="<?php echo ($date); ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <hr />
                                    <div class="col-xs-4">
                                        <input type="submit" class="btn btn-primary btn-block btn-lg" name="search" value="Search">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="submit" class="btn btn-warning btn-block btn-lg" name="update" value="Update">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="submit" class="btn btn-danger btn-block btn-lg" name="delete" value="Delete">
                                    </div>
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
                            <h1 class="text-danger text-center" style="font-weight:bold">Flight's Data Update | Delete </h1>
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


                            $sql = "SELECT flight_no,origin,destination,distance,fare,class,seats_available,departs,arrives,operator,origin_code,destination_code,refundable,noOfBookings,date FROM flights";
                            $result = $conn->query($sql);

                            echo "<div class='col-xs-6'>
                                    <table class='table table-striped table-bordered table-hover py-5' style='width:100%; text:white; text-align: center;'>
                                    <tr class='text-centre text-white'style='font-size:20px; background:gray;'>
                                    <th>Flight No.</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Distance</th>
                                    <th>Fare</th>
                                    <th>Class</th>
                                    <th>Seats_Available</th>
                                    <th>Departure Date</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Operator</th>
                                    <th>Origin code</th>
                                    <th>Destination code</th>
                                    <th>Refundable</th>
                                    <th>No. of bookings</th>


                                    </tr>
                                    </div>";

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $row['flight_no'] . "</td>";
                                    echo "<td>" . $row['origin'] . "</td>";
                                    echo "<td>" . $row['destination'] . "</td>";
                                    echo "<td>" . $row['distance'] . "</td>";
                                    echo "<td>" . $row['fare'] . "</td>";
                                    echo "<td>" . $row['class'] . "</td>";
                                    echo "<td>" . $row['seats_available'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['departs'] . "</td>";
                                    echo "<td>" . $row['arrives'] . "</td>";
                                    echo "<td>" . $row['operator'] . "</td>";
                                    echo "<td>" . $row['origin_code'] . "</td>";
                                    echo "<td>" . $row['destination_code'] . "</td>";
                                    echo "<td>" . $row['refundable'] . "</td>";
                                    echo "<td>" . $row['noOfBookings'] . "</td>";

                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>

                </div>
            </div>



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