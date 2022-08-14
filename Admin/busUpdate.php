<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$busID = "";
$operator = "";
$type = "";
$price = "";
$origin = "";
$destination = "";
$departure = "";
$arrival = "";
$seat = "";




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
    $data[0] = $_POST['busID'];
    $data[1] = $_POST['operator'];
    $data[2] = $_POST['type'];
    $data[3] = $_POST['origin'];
    $data[4] = $_POST['destination'];
    $data[5] = $_POST['departure'];
    $data[6] = $_POST['arrival'];
    $data[8] = $_POST['price'];
    $data[7] = $_POST['seat'];

    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM bus WHERE busID ='$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $busID =  $rows['busID'];
                $operator =  $rows['operator'];
                $type =  $rows['type'];
                $price =  $rows['fare'];
                $origin =  $rows['origin'];
                $destination =  $rows['destination'];
                $departure = $rows['departure'];
                $arrival =  $rows['arrival'];
                $seat =  $rows['seats'];
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
    $insert_query = "INSERT INTO `hotels`(`hotelName`, `city`, `locality`, `stars`,`rating`,`hotelDesc`,`checkIn`,`checkOut`,`price`,`roomsAvailable`,`wifi`,`swimmingPool`,`parking`,`restaurant`,`laundry`,`cafe`,`mainImage`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]','$info[15]','$info[16]','$info[17]')";
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
    $delete_query = "DELETE FROM `bus` WHERE busID = '$info[0]'";
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
    $update_query = "UPDATE `bus` SET operator='$info[1]',type='$info[2]',origin='$info[3]',destination='$info[4]',departure='$info[5]',arrival='$info[6]',fare='$info[7]',seats='$info[8]'";
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
    <title>Admin - Update Bus info</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
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
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">Steave</span></a>
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
                                <h4>Bus ID (Use to Search hotel's details)</h4>
                                <input type="number" name="busID" class="form-control" placeholder="Bus ID /Automatic Number Genrates" value="<?php echo ($busID); ?>">


                                <div class="form-group row">


                                    <div class="col-xs-6">
                                        <h4>Operator</h4>
                                        <select id="operator" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Operator" name="operator" value="<?php echo ($operator); ?>">
                                            <option value="Hanif Paribahan" data-tokens="Hanif Paribahan">Hanif Paribahan</option>
                                            <option value="Eagle Paribahan" data-tokens="Eagle Paribahan">Eagle Paribahan</option>
                                            <option value="Dhaka Express" data-tokens="Dhaka Express">Dhaka Express</option>
                                            <option value="Shyamoli Paribahan" data-tokens="Shyamoli Paribahan">Shyamoli Paribahan</option>
                                            <option value="Ena Poribahan" data-tokens="Ena Poribahan">Ena Poribahan</option>
                                            <option value="Shohag Paribahan" data-tokens="Shohag Paribahan">Shohag Paribahan</option>
                                            <option value="Saudia Paribahan" data-tokens="Saudia Paribahan">Saudia Paribahan</option>
                                            <option value="Keya Paribahan" data-tokens="Keya Paribahan">Keya Paribahan</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <h4>Type</h4>
                                        <select id="type" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select type" name="type" value="<?php echo ($type); ?>">
                                            <option value="Hanif Paribahan" data-tokens="Hanif Paribahan">Chair (Non AC)</option>
                                            <option value="Eagle Paribahan" data-tokens="Eagle Paribahan">Chair (AC)</option>
                                            <option value="Dhaka Express" data-tokens="Dhaka Express">Sleeper AC</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xs-6">
                                            <h4>Origin</h4>
                                            <select id="originBus" data-live-search="true" class="selectpicker form-control" placeholder="Enter origin" data-size="8" title="Select Origin" value="<?php echo ($origin); ?>" name="origin">

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
                                                <select id="destinationBus" data-live-search="true" class="selectpicker form-control" placeholder="Enter destination" data-size="8" title="Select Destination" name="destination" value="<?php echo ($destination); ?>">
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


                                            <div class="col-xs-6">
                                                <h4>Departure</h4>
                                                <input type="time" name="departure" class="form-control" placeholder="Enter origin time" value="<?php echo ($departure); ?>">
                                            </div>

                                            <div class="col-xs-6">
                                                <h4>Arrival </h4>
                                                <input type="time" name="arrival" class="form-control" placeholder="Enter destination time" value="<?php echo ($arrival); ?>">
                                            </div>

                                            <div class="col-xs-6">
                                                <h4>Price</h4>
                                                <input type="number" name="price" class="form-control" placeholder="Enter price" value="<?php echo ($price); ?>">
                                            </div>

                                            <div class="col-xs-6">
                                                <h4>Seat</h4>
                                                <input type="number" name="seat" class="form-control" placeholder="Enter no. of seat" value="<?php echo ($seat); ?>">
                                            </div>

                                            <div class=" row">
                                                <div class="col-md-4 ">
                                                    <input type="submit" class="btn btn-primary btn-block btn-lg" name="search" value="Search">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" class="btn btn-warning btn-block btn-lg" name="update" value="Update">
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input type="submit" class="btn btn-danger btn-block btn-lg" name="delete" value="Delete">
                                                </div>
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
                            <h1 class="text-danger text-center" style="font-weight:bold">BUS DETAILS</h1>
                            <hr>
                            <br>
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

                            $sql = "SELECT * FROM bus";
                            $result = $conn->query($sql);

                            echo "<div class='col-xs-6'>
                <table class='table text-nowrap  table-striped table-bordered table-hover py-5' style='width:100%; text:white; text-align: center;'>
                <tr class='text-centre text-white'style='font-size:20px; background:gray;'>
                <th>Bus ID</th>
                <th>Operator</th>
                <th>Type</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Arrival</th>
               
                <th>Seats</th>
                <th>Fare</th>
                <th>Available seat</th>
                
                </tr>
                </div>";

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $row['busID'] . "</td>";
                                    echo "<td>" . $row['operator'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>";
                                    echo "<td>" . $row['origin'] . "</td>";
                                    echo "<td>" . $row['destination'] . "</td>";
                                    echo "<td>" . $row['departure'] . "</td>";
                                    echo "<td>" . $row['arrival'] . "</td>";
                                    echo "<td>" . $row['seats'] . "</td>";
                                    echo "<td>" . $row['fare'] . "</td>";
                                    echo "<td>" . $row['seatsAvailable'] . "</td>";


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