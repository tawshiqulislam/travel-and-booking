<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$buslID = "";
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
    $search_query = "SELECT * FROM hotels WHERE hotelID = '$info[0]'";
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
    $insert_query = "INSERT INTO `bus`(`operator`, `type`, `origin`,`destination`, `departure`,`arrival`,`seats`,`fare`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]')";
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
if (isset($_POST['deletehotel'])) {
    $bookingid = $_POST['bookingID'];
    $username = $_POST['username'];
    $date = date('d-m-y h:i:s');
    $msg = "We are Sorry. Your hotel Booikng had canceld By Tour And Travel Authority for any reason";
    $seen = "not";
    $msgFrom = "Admin";
    $delete_query = "DELETE FROM `hotelbookings` WHERE bookingID = ' $bookingid '";
    $msg_query = "INSERT INTO `authoritymessage`(`username`, `message`, `seen`,`msgFrom` ,`dateTime`) VALUES ('$username', '$msg', '$seen', '$msgFrom' , '$date');";
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
    $msg_result = mysqli_query($conn, $msg_query);
    if ($msg_result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo ("Data updated");
        } else {
            echo ("Data not updated");
        }
    }
}
if (isset($_POST['deletetrain'])) {
    $bookingid = $_POST['bookingID'];
    $username = $_POST['username'];
    $date = date('d-m-y h:i:s');
    $msg = "Sorry... Your hotel train had canceld By Tour And Travel Authority for any reason";
    $seen = "not";
    $msgFrom = "Admin";
    $delete_query = "DELETE FROM `hotelbookings` WHERE bookingID = ' $bookingid '";
    $msg_query = "INSERT INTO `authoritymessage`(`username`, `message`, `seen`,`msgFrom` ,`dateTime`) VALUES ('$username', '$msg', '$seen', '$msgFrom' , '$date');";
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
    $msg_result = mysqli_query($conn, $msg_query);
    if ($msg_result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo ("Data updated");
        } else {
            echo ("Data not updated");
        }
    }
}
if (isset($_POST['deleteflight'])) {
    $bookingid = $_POST['bookingID'];
    $username = $_POST['username'];
    $date = date('d-m-y h:i:s');
    $msg = "Sorry... Your hotel Flight had canceld By Tour And Travel Authority for any reason";
    $seen = "not";
    $msgFrom = "Admin";
    $delete_query = "DELETE FROM `hotelbookings` WHERE bookingID = ' $bookingid '";
    $msg_query = "INSERT INTO (`username`, `message`, `seen`,`msgFrom` ,`dateTime`) VALUES ('$username', '$msg', '$seen', '$msgFrom' , '$date');";
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
    $msg_result = mysqli_query($conn, $msg_query);
    if ($msg_result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo ("Data updated");
        } else {
            echo ("Data not updated");
        }
    }
}

//edit
if (isset($_POST['accepthotel'])) {
    $bookingid = $_POST['bookingID'];
    $username = $_POST['username'];
    $date = date('d-m-y h:i:s');
    $msg = "Congratulation... Your hotel Booikng Confirmed By Tour And Travel Authority";
    $seen = "not";
    $msgFrom = "Admin";
    $query1 = "UPDATE `hotelbookings` SET status='accepted' where bookingID = $bookingid";
    $query2 = "INSERT INTO `authoritymessage`(`username`, `message`, `seen`,`msgFrom` ,`dateTime`) VALUES ('$username', '$msg', '$seen', '$msgFrom' , '$date');";

    try {
        //$update_result = mysqli_query($conn, $update_query);
        $result = mysqli_query($conn, $query1);

        if ($result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("Data updated");
            } else {
                echo ("Data not updated");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in updating" . $ex->getMessage());
    }

    //$update_result = mysqli_query($conn, $update_query);
    $result2 = mysqli_query($conn, $query2);

    if ($result2) {
        if (mysqli_affected_rows($conn) > 0) {
            echo ("Data updated");
        } else {
            echo ("Data not updated");
        }
    }
}

if (isset($_POST['accepttrain'])) {
    $bookingid = $_POST['bookingID'];
    $username = $_POST['username'];
    $date = date('d-m-y h:i:s');
    $msg = "Congratulation... Your train Booikng Confirmed By Tour And Travel Authority";
    $seen = "not";
    $msgFrom = "Admin";
    $update_query = "UPDATE `trainbookings` SET status='accepted' where bookingID= $bookingid ";
    $msg_query = "INSERT INTO `authoritymessage`(`username`, `message`, `seen`,`msgFrom` ,`dateTime`) VALUES ('$username', '$msg', '$seen', '$msgFrom' , '$date');";
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
    $msg_result = mysqli_query($conn, $msg_query);
    if ($msg_result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo ("Data updated");
        } else {
            echo ("Data not updated");
        }
    }
}

if (isset($_POST['acceptflight'])) {
    $bookingid = $_POST['bookingID'];
    $username = $_POST['username'];
    $date = date('d-m-y h:i:s');
    $msg = "Congratulation... Your flight Booikng Confirmed By Tour And Travel Authority";
    $seen = "not";
    $msgFrom = "Admin";
    $update_query = "UPDATE `flightbookings` SET status='accepted'";
    $msg_query = "INSERT INTO `authoritymessage`(`username`, `message`, `seen`,`msgFrom` ,`dateTime`) VALUES ('$username', '$msg', '$seen', '$msgFrom' , '$date');";
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
    $msg_result = mysqli_query($conn, $msg_query);
    if ($msg_result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo ("Data updated");
        } else {
            echo ("Data not updated");
        }
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
    <title>Admin - Bus</title>

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
                        <h4 class="page-title">Booking Status</h4>
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

                <div class="row">

                    <div class="white-box">

                        <div class="table-responsive">
                            <h1 class="text-danger text-center" style="font-weight:bold">Hotel Booking Status</h1>
                            <hr>

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

                            $sql = "SELECT * FROM hotelbookings where status= 'pending'";


                            $rowcount = mysqli_num_rows(mysqli_query($conn, $sql));

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) { ?>
                                <div>
                                    <?php echo $rowcount . " Hotel Booking Pending:"; ?>
                                </div>

                                <?php

                                echo "<div class='col-xs-6'>
                                <table class='table table-striped table-bordered table-hover py-5' style='width:100%; text:white; text-align: center;'>
                                <tr class='text-centre text-white'style='font-size:20px; background:gray;'>
                                <th>bookinglID</th>
                                <th>Useename</th>
                                <th>Status</th>
                                <th>Action</th>
                        
                    

                                </tr>
                               ";

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row['bookingID'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        $bookingID = $row['bookingID'];
                                        $username =  $row['username'];
                                ?>
                                        <td>
                                            <form method="POST" action="">
                                                <input type="hidden" class="btn btn-success btn-block btn-lg" name="bookingID" value="<?php echo $bookingID; ?>">
                                                <input type="hidden" class="btn btn-success btn-block btn-lg" name="username" value="<?php echo $username; ?>">
                                                <input type="submit" class="btn btn-success btn-block btn-lg" name="accepthotel" value="Accept">
                                                <input type="submit" class="btn btn-success btn-block btn-lg" name="deletehotel" placeholder="" value="delete">
                                                <form action="">

                                                </form>
                                        <td>
                                <?php
                                        echo "</tr> </div>";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                            } else {
                                echo "<center><div> <h4> No Pending Hotel Bookings</h4></div></center>";
                            }
                            echo "<table>
                            ";
                                ?>


                        </div>
                    </div>
                </div>
            </div>

            </br>
            </br>
            </br>


            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">

                <div class="row">

                    <div class="white-box">

                        <div class="table-responsive">
                            <h1 class="text-danger text-center" style="font-weight:bold">Traing Booking Status</h1>
                            <hr>

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

                            $sql = "SELECT * FROM trainbookings where status= 'pending'";


                            $rowcount = mysqli_num_rows(mysqli_query($conn, $sql));

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) { ?>
                                <div>
                                    <h4><?php echo $rowcount . "Train Booking Pending:"; ?><h4>
                                </div>

                                <?php

                                echo "<div class='col-xs-6'>
                    <table class='table table-striped table-bordered table-hover py-5' style='width:100%; text:white; text-align: center;'>
                    <tr class='text-centre text-white'style='font-size:20px; background:gray;'>
                    <th>bookinglID</th>
                    <th>Useename</th>
                    <th>Status</th>
                    <th>Action</th>
               
        

                    </tr>
                    </div>";

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row['bookingID'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        $bookingID = $row['bookingID'];
                                        $username = $row['username'];
                                ?>
                                        <td>
                                            <form method="POST" action="">
                                                <input type="hidden" class="btn btn-success btn-block btn-lg" name="bookingID" value="<?php echo $bookingID; ?>">
                                                <input type="hidden" class="btn btn-success btn-block btn-lg" name="username" value="<?php echo $username; ?>">
                                                <input type="submit" class="btn btn-success btn-block btn-lg" name="accepttrain" value="Accept">
                                                <input type="submit" class="btn btn-success btn-block btn-lg" name="deletetrain" placeholder="" value="delete">
                                                <form action="">

                                                </form>
                                        <td>
                                <?php

                                        echo "</tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                            } else {
                                echo "<center><div> <h4> No Pending train Bookings</h4></div></center>";
                            }
                            echo "<table> <div>";
                                ?>

                        </div>
                    </div>
                </div>
            </div>

            </br>
            </br>
            </br>


            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">

                <div class="row">

                    <div class="white-box">

                        <div class="table-responsive">
                            <h1 class="text-danger text-center" style="font-weight:bold">Flight Booking Status</h1>
                            <hr>

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

                            $sql = "SELECT * FROM flightbookings where status= 'pending'";


                            $rowcount = mysqli_num_rows(mysqli_query($conn, $sql));

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) { ?>
                                <div>
                                    <h4><?php echo $rowcount . " flight Booking Pending:"; ?></h4>
                                </div>

                                <?php

                                echo "<div class='col-xs-6'>
                    <table class='table table-striped table-bordered table-hover py-5' style='width:100%; text:white; text-align: center;'>
                    <tr class='text-centre text-white'style='font-size:20px; background:gray;'>
                    <th>bookinglID</th>
                    <th>Useename</th>
                    <th>Status</th>
                    <th>Action</th>
               
        

                    </tr>
                    </div>";

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row['bookingID'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";

                                        $bookingID = $row['bookingID'];
                                ?>
                                        <td>
                                            <form method="POST" action="">
                                                <input type="hidden" class="btn btn-success btn-block btn-lg" name="bookingID" value="<?php echo $bookingID; ?>">
                                                <input type="hidden" class="btn btn-success btn-block btn-lg" name="username" value="<?php echo $username; ?>">
                                                <input type="submit" class="btn btn-success btn-block btn-lg" name="acceptflight" value="Accept">
                                                <input type="submit" class="btn btn-success btn-block btn-lg" name="deleteflight" placeholder="" value="delete">
                                                <form action="">

                                                </form>
                                        <td>
                                <?php
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                            } else {
                                echo "<center><div> <h4> No Pending Flight Bookings</h4></div></center>";
                            }
                                ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->



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