<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$cabID = "";
$origin = "";
$destination = "";
$distance = "";
$fare = "";
$time = "";

$departs = "";
$arrives = "";

$originCode = "";
$destinationCode = "";

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
    $data[0] = $_POST['cabID'];
    $data[1] = $_POST['origin'];
    $data[2] = $_POST['destination'];
    $data[3] = $_POST['distance'];
    $data[4] = $_POST['time'];
    $data[5] = $_POST['originCode'];
    $data[6] = $_POST['destinationCode'];
    $data[7] = $_POST['fare'];
    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM cabs WHERE cabID = '$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $cabID = $rows['cabID'];
                $origin = $rows['origin'];
                $destination = $rows['destination'];
                $distance = $rows['distance'];
                $time = $rows['time'];
                $originCode = $rows['originCode'];
                $destinationCode = $rows['destinationCode'];
                $fare = $rows['fare'];
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
    $insert_query = "INSERT INTO `cabs`(`origin`, `destination`, `distance`,`time`,`originCode`,`destinationCode`,`fare`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[6]')";
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
    $delete_query = "DELETE FROM `cabs` WHERE cabID = '$info[0]'";
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
    $update_query = "UPDATE `cabs` SET origin='$info[1]',destination='$info[2]',distance='$info[3]',time='$info[4]',originCode='$info[5]',destinationCode='$info[6]',fare='$info[7]' WHERE cabID = '$info[0]'";
    try {
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("<center>Data updated</center>");
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
                                <h4>Cab Number (Use to Search cab's details)</h4>
                                <input type="number" name="cabID" class="form-control" placeholder="Cab No. /Automatic Number Genrates" value="<?php echo ($cabID); ?>">

                                <div class="col-xs-6">
                                    <h4>Origin</h4>
                                    <select id="originCab" data-live-search="true" class="selectpicker form-control" placeholder="Enter origin" data-size="8" title="Select Origin" value="<?php echo ($origin); ?>" name="origin">

                                        <optgroup label="Chattogram Division">
                                            <option value="Chattogram" data-tokens="Chattogram">Chattogram District</option>
                                            <option value="Brahmanbaria" data-tokens="Brahmanbaria">Brahmanbaria District</option>
                                            <option value="Cumilla" data-tokens="Cumilla">Cumilla District</option>
                                            <option value="Feni" data-tokens="Feni">Feni District</option>
                                            <option value="Noakhali" data-tokens="Noakhali">Noakhali District</option>

                                        <optgroup label="Dhaka Division">
                                            <option value="Dhaka" data-tokens="Dhaka">Dhaka District</option>
                                            <option value="Faridpur" data-tokens="Faridpur">Faridpur District</option>
                                            <option value="Gazipur" data-tokens="Gazipur">Gazipur District</option>
                                            <option value="Gopalganj" data-tokens="Gopalganj">Gopalganj District</option>
                                            <option value="Kishoreganj" data-tokens="Kishoreganj">Kishoreganj District</option>
                                            <option value="Narayanganj" data-tokens="Narayanganj">Narayanganj District</option>
                                            <option value="Rajbari" data-tokens="Rajbari">Rajbari District</option>
                                            <option value="Tangail" data-tokens="Tangail">Tangail District</option>

                                        <optgroup label="Khulna Division">
                                            <option value="Chuadanga" data-tokens="Chuadanga">Chuadanga District</option>
                                            <option value="Jashore" data-tokens="Jashore">Jashore District</option>
                                            <option value="Jhenaidah" data-tokens="Jhenaidah">Jhenaidah District</option>
                                            <option value="Kushtia" data-tokens="Kushtia">Kushtia District</option>

                                        <optgroup label="Mymensingh Division">
                                            <option value="Mymensingh" data-tokens="Mymensingh">Mymensingh District</option>
                                            <option value="Jamalpur" data-tokens="Jamalpur">Jamalpur District</option>
                                            <option value="Netrokona" data-tokens="Netrokona">Netrokona District</option>

                                        <optgroup label="Rajshahi Division">
                                            <option value="Rajshahi" data-tokens="Rajshahi">Rajshahi District</option>
                                            <option value="Bogra" data-tokens="Bogra">Bogra District</option>
                                            <option value="Chapai Nawabganj" data-tokens="Chapai Nawabganj">Chapai Nawabganj District</option>
                                            <option value="Joypurhat" data-tokens="Joypurhat">Joypurhat District</option>
                                            <option value="Naogaon" data-tokens="Naogaon">Naogaon District</option>
                                            <option value="Natore" data-tokens="Natore">Natore District</option>
                                            <option value="Pabna" data-tokens="Pabna">Pabna District</option>
                                            <option value="Sirajganj" data-tokens="Sirajganj">Sirajganj District</option>

                                        <optgroup label="Rangpur Division">
                                            <option value="Rangpur" data-tokens="Rangpur">Rangpur District</option>
                                            <option value="Gaibandha" data-tokens="Gaibandha">Gaibandha District</option>
                                            <option value="Dinajpur" data-tokens="Dinajpur">Dinajpur District</option>
                                            <option value="Kurigram" data-tokens="Kurigram">Kurigram District</option>
                                            <option value="Lalmonirhat" data-tokens="Lalmonirhat">Lalmonirhat District</option>
                                            <option value="Nilphamari" data-tokens="Nilphamari">Nilphamari District</option>
                                            <option value="Panchagarh" data-tokens="Panchagarh">Panchagarh District</option>
                                            <option value="Thakurgaon" data-tokens="Thakurgaon">Thakurgaon District</option>

                                        <optgroup label="Sylhet Division">
                                            <option value="Sylhet" data-tokens="Sylhet">Sylhet District</option>
                                            <option value="Habiganj" data-tokens="Habiganj">Habiganj District</option>
                                            <option value="Moulvibazar" data-tokens="Moulvibazar">Moulvibazar District</option>
                                            <option value="Sunamganj" data-tokens="Sunamganj">Sunamganj District</option>
                                    </select>
                                </div>


                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <h4>Destination</h4>
                                        <select id="destinationcab" data-live-search="true" class="selectpicker form-control" placeholder="Enter destination" data-size="8" title="Select Destination" name="destination" value="<?php echo ($destination); ?>">
                                            <optgroup label="Chattogram Division">
                                                <option value="Chattogram" data-tokens="Chattogram">Chattogram District</option>
                                                <option value="Brahmanbaria" data-tokens="Brahmanbaria">Brahmanbaria District</option>
                                                <option value="Cumilla" data-tokens="Cumilla">Cumilla District</option>
                                                <option value="Feni" data-tokens="Feni">Feni District</option>
                                                <option value="Noakhali" data-tokens="Noakhali">Noakhali District</option>

                                            <optgroup label="Dhaka Division">
                                                <option value="Dhaka" data-tokens="Dhaka">Dhaka District</option>
                                                <option value="Faridpur" data-tokens="Faridpur">Faridpur District</option>
                                                <option value="Gazipur" data-tokens="Gazipur">Gazipur District</option>
                                                <option value="Gopalganj" data-tokens="Gopalganj">Gopalganj District</option>
                                                <option value="Kishoreganj" data-tokens="Kishoreganj">Kishoreganj District</option>
                                                <option value="Narayanganj" data-tokens="Narayanganj">Narayanganj District</option>
                                                <option value="Rajbari" data-tokens="Rajbari">Rajbari District</option>
                                                <option value="Tangail" data-tokens="Tangail">Tangail District</option>

                                            <optgroup label="Khulna Division">
                                                <option value="Chuadanga" data-tokens="Chuadanga">Chuadanga District</option>
                                                <option value="Jashore" data-tokens="Jashore">Jashore District</option>
                                                <option value="Jhenaidah" data-tokens="Jhenaidah">Jhenaidah District</option>
                                                <option value="Kushtia" data-tokens="Kushtia">Kushtia District</option>

                                            <optgroup label="Mymensingh Division">
                                                <option value="Mymensingh" data-tokens="Mymensingh">Mymensingh District</option>
                                                <option value="Jamalpur" data-tokens="Jamalpur">Jamalpur District</option>
                                                <option value="Netrokona" data-tokens="Netrokona">Netrokona District</option>

                                            <optgroup label="Rajshahi Division">
                                                <option value="Rajshahi" data-tokens="Rajshahi">Rajshahi District</option>
                                                <option value="Bogra" data-tokens="Bogra">Bogra District</option>
                                                <option value="Chapai Nawabganj" data-tokens="Chapai Nawabganj">Chapai Nawabganj District</option>
                                                <option value="Joypurhat" data-tokens="Joypurhat">Joypurhat District</option>
                                                <option value="Naogaon" data-tokens="Naogaon">Naogaon District</option>
                                                <option value="Natore" data-tokens="Natore">Natore District</option>
                                                <option value="Pabna" data-tokens="Pabna">Pabna District</option>
                                                <option value="Sirajganj" data-tokens="Sirajganj">Sirajganj District</option>

                                            <optgroup label="Rangpur Division">
                                                <option value="Rangpur" data-tokens="Rangpur">Rangpur District</option>
                                                <option value="Gaibandha" data-tokens="Gaibandha">Gaibandha District</option>
                                                <option value="Dinajpur" data-tokens="Dinajpur">Dinajpur District</option>
                                                <option value="Kurigram" data-tokens="Kurigram">Kurigram District</option>
                                                <option value="Lalmonirhat" data-tokens="Lalmonirhat">Lalmonirhat District</option>
                                                <option value="Nilphamari" data-tokens="Nilphamari">Nilphamari District</option>
                                                <option value="Panchagarh" data-tokens="Panchagarh">Panchagarh District</option>
                                                <option value="Thakurgaon" data-tokens="Thakurgaon">Thakurgaon District</option>

                                            <optgroup label="Sylhet Division">
                                                <option value="Sylhet" data-tokens="Sylhet">Sylhet District</option>
                                                <option value="Habiganj" data-tokens="Habiganj">Habiganj District</option>
                                                <option value="Moulvibazar" data-tokens="Moulvibazar">Moulvibazar District</option>
                                                <option value="Sunamganj" data-tokens="Sunamganj">Sunamganj District</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <h4>Distance</h4>
                                    <input type="number" name="distance" class="form-control" placeholder="Enter distance" value="<?php echo ($distance); ?>">
                                </div>
                                <div class="col-xs-6">
                                    <h4>Time</h4>
                                    <input type="time" class="form-control" name="time" placeholder="Time" value="<?php echo ($time); ?>">
                                </div>

                                <div class="col-xs-6">
                                    <h4>Fare</h4>
                                    <input type="number" name="fare" class="form-control" placeholder="Enter fare" value="<?php echo ($fare); ?>">
                                </div>





                                <div class="col-xs-6">
                                    <h4>Origin Code</h4>
                                    <select id="origin" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin Code" value="<?php echo ($originCode); ?>" name="originCode">
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
                                    <select id="destination" placeholder="Enter destination" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination Code" value="<?php echo ($destinationCode); ?>" name="destinationCode">
                                        <option value="DAC" data-tokens="DAC Dhaka">Dhaka (DAC)</option>
                                        <option value="JSR" data-tokens="JSR Jashore">Jashore (JSR)</option>
                                        <option value="BZL" data-tokens="BZL Barishal">Barishal (BZL)</option>
                                        <option value="CGP" data-tokens="CGP Chattogram">Chattogram (CGP)</option>
                                        <option value="ZYL" data-tokens="ZYL Sylhet">Sylhet (ZYL)</option>
                                        <option value="CXB" data-tokens="CXB Coxs Bazar">Cox's Bazar (CXB)</option>
                                    </select>
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

                            $sql = "SELECT * FROM cabs";
                            $result = $conn->query($sql);

                            echo "<div class='col-xs-6'>
                                                <table class=' text-nowrap  table table-hover py-5' >
                                                <tr class='text-centre text-white'style='font-size:18px; background:gray;'>
                                                <th>Cab No.</th>
                                                <th>Origin</th>
                                                <th>Destination</th>
                                                <th>Distance</th>
                                                <th>Time</th>
                                          
                                                <th>Origin code</th>
                                                <th>Destination code</th>
                                           
                                                <th>Fare</th>
                                                <th>Action</th>

                                                                </tr>
                                                                </div>";

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $row['cabID'] . "</td>";
                                    echo "<td>" . $row['origin'] . "</td>";
                                    echo "<td>" . $row['destination'] . "</td>";
                                    echo "<td>" . $row['distance'] . "</td>";
                                    echo "<td>" . $row['time'] . "</td>";

                                    echo "<td>" . $row['originCode'] . "</td>";
                                    echo "<td>" . $row['destinationCode'] . "</td>";

                                    echo "<td>" . $row['fare'] . "</td>";
                            ?>
                                    <td>
                                        <div class="btn btn-primary"><a href="">Delete</a></div>
                                    </td>
                            <?php

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
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->

                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->

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