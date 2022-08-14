<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$hotelID = "";
$hotelName = "";
$city = "";
$locality = "";
$stars = "";
$rating = "";
$hotelDesc = "";
$checkIn = "";
$checkOut = "";
$price = "";
$roomsAvailable = "";
$wifi = "";
$swimmingPool = "";
$parking = "";
$restaurant = "";
$laundry = "";
$cafe = "";
$mainImage = "";

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

    $data[0] = $_POST['hotelID'];
    $data[1] = $_POST['hotelName'];
    $data[2] = $_POST['city'];
    $data[3] = $_POST['locality'];
    $data[4] = $_POST['stars'];
    $data[5] = $_POST['rating'];
    $data[6] = $_POST['hotelDesc'];
    $data[7] = $_POST['checkIn'];
    $data[8] = $_POST['checkOut'];
    $data[9] = $_POST['price'];
    $data[10] = $_POST['roomsAvailable'];
    $data[11] = $_POST['wifi'];
    $data[12] = $_POST['swimmingPool'];
    $data[13] = $_POST['parking'];
    $data[14] = $_POST['restaurant'];
    $data[15] = $_POST['laundry'];
    $data[16] = $_POST['cafe'];
    $data[17] = $_POST['mainImage'];
    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM hotels WHERE hotelID ='$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $hotelID = $rows['hotelID'];
                $hotelName = $rows['hotelName'];
                $city = $rows['city'];
                $locality = $rows['locality'];
                $stars = $rows['stars'];
                $rating = $rows['rating'];
                $hotelDesc = $rows['hotelDesc'];
                $checkIn = $rows['checkIn'];
                $checkOut = $rows['checkOut'];
                $price = $rows['price'];
                $roomsAvailable = $rows['roomsAvailable'];
                $wifi = $rows['wifi'];
                $swimmingPool = $rows['swimmingPool'];
                $parking = $rows['parking'];
                $restaurant = $rows['restaurant'];
                $laundry = $rows['laundry'];
                $cafe = $rows['cafe'];
                $mainImage = $rows['mainImage'];
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
    $delete_query = "DELETE FROM `hotels` WHERE hotelID = '$info[0]'";
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
    $update_query = "UPDATE `hotels` SET hotelName='$info[1]',city='$info[2]',locality='$info[3]',stars='$info[4]',rating='$info[5]',hotelDesc='$info[6]',checkIn='$info[7]',checkOut='$info[8]',price='$info[9]',roomsAvailable='$info[10]',wifi='$info[11]',swimmingPool='$info[12]',parking='$info[13]',restaurant='$info[14]',laundry='$info[15]',cafe='$info[16]',mainImage='$info[17]' WHERE hotelID = '$info[0]'";
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
    <title> Admin - Hotel Update</title>

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
                        <h4 class="page-title">Update hotel info</h4>
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
                                <h4>Hotel ID (Use to Search hotel's details)</h4>
                                <input type="number" name="hotelID" class="form-control" placeholder="Hotel ID /Automatic Number Genrates" value="<?php echo ($hotelID); ?>">

                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <h4>Hotel Name</h4>
                                        <input type="text" name="hotelName" class="form-control" placeholder="Enter hotel name" value="<?php echo ($hotelName); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>City</h4>
                                        <select id="city" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select City" name="city" value="<?php echo ($city); ?>">
                                            <option value="Chattogram" data-tokens="Chattogram">Chattogram</option>
                                            <option value="Coxs Bazar" data-tokens="Coxs Bazar">Cox's Bazar</option>
                                            <option value="Dhaka" data-tokens="Dhaka">Dhaka</option>
                                            <option value="Sylhet" data-tokens="Sylhet">Sylhet</option>
                                            <option value="Khulna" data-tokens="Khulna">Khulna</option>
                                            <option value="Mymensingh" data-tokens="Mymensingh">Mymensingh</option>
                                            <option value="Brishal" data-tokens="Brishal">Brishal</option>
                                            <option value="Rajshahi" data-tokens="Rajshahi">Rajshahi</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Locality</h4>
                                        <input type="text" name="locality" class="form-control" placeholder="Enter locality" value="<?php echo ($locality); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Stars</h4>
                                        <input type="int" name="stars" class="form-control" placeholder="Enter no. of stars" value="<?php echo ($stars); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Rating</h4>
                                        <input type="text" class="form-control" name="rating" placeholder="Give rating" value="<?php echo ($rating); ?>">
                                    </div>


                                    <div class="col-xs-6">
                                        <h4>Description</h4>
                                        <input type="text" name="hotelDesc" class="form-control" placeholder="Enter description" value="<?php echo ($hotelDesc); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Check In</h4>
                                        <input type="time" name="checkIn" class="form-control" placeholder="Enter checkin time" value="<?php echo ($checkIn); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Check Out</h4>
                                        <input type="time" name="checkOut" class="form-control" placeholder="Enter checkOut time" value="<?php echo ($checkOut); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Price</h4>
                                        <input type="number" name="price" class="form-control" placeholder="Enter price" value="<?php echo ($price); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Rooms Available</h4>
                                        <input type="number" name="roomsAvailable" class="form-control" placeholder="Enter no. of available rooms" value="<?php echo ($roomsAvailable); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Wifi</h4>
                                        <input type="text" name="wifi" class="form-control" placeholder="Enter yes or no" value="<?php echo ($wifi); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Swimming Pool</h4>
                                        <input type="text" name="swimmingPool" class="form-control" placeholder="Enter yes or no" value="<?php echo ($swimmingPool); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Parking</h4>
                                        <input type="text" name="parking" class="form-control" placeholder="Enter yes or no" value="<?php echo ($parking); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Restaurant</h4>
                                        <input type="text" name="restaurant" class="form-control" placeholder="Enter yes or no" value="<?php echo ($restaurant); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Laundry</h4>
                                        <input type="text" name="laundry" class="form-control" placeholder="Enter yes or no" value="<?php echo ($laundry); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Cafe</h4>
                                        <input type="text" name="cafe" class="form-control" placeholder="Enter yes or no" value="<?php echo ($cafe); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Image</h4>
                                        <input type="text" name="mainImage" class="form-control" placeholder="Enter link of image" value="<?php echo ($mainImage); ?>">
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
                            <h1 class="text-danger text-center" style="font-weight:bold">Hotel's Data Update | Delete </h1>
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


                            $sql = "SELECT hotelID,hotelName,city,locality,stars,rating,hotelDesc,checkIn,checkOut,price,roomsAvailable,wifi,swimmingPool,parking,restaurant,laundry,cafe,mainImage FROM hotels";

                            $result = $conn->query($sql);

                            echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%;  text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>
<th>Hotel ID</th>
<th>Hotel Name</th>
<th>City</th>
<th>Locality</th>
<th>Stars</th>
<th>Rating</th>
<th>Description</th>
<th>Check In</th>
<th>Check Out</th>
<th>Price</th>
<th>Rooms available</th>
<th>Wifi</th>
<th>Swimming Pool</th>
<th>Parking</th>
<th>Restaurant</th>
<th>Laundry</th>
<th>Cafe</th>
<th>Image</th>


</tr>
</div>";

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";

                                    echo "<td>" . $row['hotelID'] . "</td>";
                                    echo "<td>" . $row['hotelName'] . "</td>";
                                    echo "<td>" . $row['city'] . "</td>";
                                    echo "<td>" . $row['locality'] . "</td>";
                                    echo "<td>" . $row['stars'] . "</td>";
                                    echo "<td>" . $row['rating'] . "</td>";
                                    echo "<td>" . $row['hotelDesc'] . "</td>";
                                    echo "<td>" . $row['checkIn'] . "</td>";
                                    echo "<td>" . $row['checkOut'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['roomsAvailable'] . "</td>";
                                    echo "<td>" . $row['wifi'] . "</td>";
                                    echo "<td>" . $row['swimmingPool'] . "</td>";
                                    echo "<td>" . $row['parking'] . "</td>";
                                    echo "<td>" . $row['restaurant'] . "</td>";
                                    echo "<td>" . $row['laundry'] . "</td>";
                                    echo "<td>" . $row['cafe'] . "</td>";
                                    echo "<td>" . $row['mainImage'] . "</td>";


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