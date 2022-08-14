<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";
$UserID = "";
$FullName = "";
$EMail = "";
$Phone = "";
$Username = "";
$Password = "";
$AddressLine1 = "";
$AddressLine2 = "";
$City = "";
$State = "";
$Date = "";

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

    $data[0] = $_POST['UserID'];
    $data[1] = $_POST['FullName'];
    $data[2] = $_POST['EMail'];
    $data[3] = $_POST['Phone'];
    $data[4] = $_POST['Username'];
    $data[5] = $_POST['Password'];
    $data[6] = $_POST['AddressLine1'];
    $data[7] = $_POST['AddressLine2'];
    $data[8] = $_POST['City'];
    $data[9] = $_POST['State'];
    $data[10] = $_POST['Date'];
    return $data;
}
//search
if (isset($_POST['search'])) {
    $info = getData();
    $search_query = "SELECT * FROM users WHERE UserID ='$info[0]'";
    $search_result = mysqli_query($conn, $search_query);
    if ($search_result) {
        if (mysqli_num_rows($search_result)) {
            while ($rows = mysqli_fetch_array($search_result)) {
                $UserID = $rows['UserID'];
                $FullName = $rows['FullName'];
                $EMail = $rows['EMail'];
                $Phone = $rows['Phone'];
                $Username = $rows['Username'];
                $Password = $rows['Password'];
                $AddressLine1 = $rows['AddressLine1'];
                $AddressLine2 = $rows['AddressLine2'];
                $City = $rows['City'];
                $State = $rows['State'];
                $Date = $rows['Date'];
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
    $insert_query = "INSERT INTO `users`(`FullName`, `EMail`, `Phone`, `Username`,`Password`,`AddressLine1`,`AddressLine2`,`City`,`State`,`Date`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]')";
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
    $delete_query = "DELETE FROM `users` WHERE UserID = '$info[0]'";
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
    $update_query = "UPDATE `users` SET FullName='$info[1]',EMail='$info[2]',Phone='$info[3]',Username='$info[4]',Password='$info[5]',AddressLine1='$info[6]',AddressLine2='$info[7]',City='$info[8]',State='$info[9]',Date='$info[10]' WHERE UserID = '$info[0]'";
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
    <title>Tour & Travel</title>
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
                        <h4 class="page-title">Update User</h4>
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




            <div class="container-fluid">
                <div class="col-lg-8 col-xlg-9 col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <form method="post" action="">
                                <h4>UserID (Use to Search users data)</h4>
                                <input type="number" name="UserID" class="form-control" placeholder="UserID No. /Automatic Number Genrates" value="<?php echo ($UserID); ?>">

                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <h4>FullName</h4>
                                        <input type="text" name="FullName" class="form-control" placeholder="Enter FullName" value="<?php echo ($FullName); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Username</h4>
                                        <input type="text" name="Username" class="form-control" placeholder="Enter Username" value="<?php echo ($Username); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Email</h4>
                                        <input type="email" name="EMail" class="form-control" placeholder="Enter Email" value="<?php echo ($EMail); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Phone (10-digit)</h4>
                                        <input type="tel" pattern="^\d{10}$" class="form-control" name="Phone" placeholder="10 digit Phone number" value="<?php echo ($Phone); ?>">
                                    </div>


                                    <div class="col-xs-6">
                                        <h4>Password</h1>
                                            <input type="password" name="Password" class="form-control" placeholder="Ente password" value="<?php echo ($Password); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Address Line1</h4>
                                        <input type="text" name="AddressLine1" class="form-control" placeholder="Enter Address Line1" value="<?php echo ($AddressLine1); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Address Line2</h4>
                                        <input type="text" name="AddressLine2" class="form-control" placeholder="Enter Address Line2" value="<?php echo ($AddressLine2); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>City</h4>
                                        <input type="text" name="City" class="form-control" placeholder="Enter city" value="<?php echo ($City); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>State</h4>
                                        <input type="text" name="State" class="form-control" placeholder="Enter State" value="<?php echo ($State); ?>">
                                    </div>

                                    <div class="col-xs-6">
                                        <h4>Date</h4>
                                        <input type="date" name="Date" class="form-control" placeholder="Enter date" value="<?php echo ($Date); ?>">
                                    </div>
                                </div>
                                <br>

                                <hr>

                                <div class="form-group ">
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
                            <h1 class="text-danger text-center" style="font-weight:bold">Users Data Update | Delete </h1>
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


                            $sql = "SELECT UserID,FullName,EMail,Phone,Username,Password,AddressLine1,AddressLine2,City,State,Date FROM users";
                            $result = $conn->query($sql);

                            $result = $conn->query($sql);

                            echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:100%;  text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:gray;'>

<th>UserID</th>
<th>FullName</th>
<th>EMail</th>
<th>Phone</th>
<th>Username</th>
<th>Password</th>
<th>AddressLine1</th>
<th>AddressLine2</th>
<th>City</th>
<th>State</th>
<th>Date</th>


</tr>
</div>";

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $row['UserID'] . "</td>";
                                    echo "<td>" . $row['FullName'] . "</td>";
                                    echo "<td>" . $row['EMail'] . "</td>";
                                    echo "<td>" . $row['Phone'] . "</td>";
                                    echo "<td>" . $row['Username'] . "</td>";
                                    echo "<td>" . $row['Password'] . "</td>";
                                    echo "<td>" . $row['AddressLine1'] . "</td>";
                                    echo "<td>" . $row['AddressLine2'] . "</td>";
                                    echo "<td>" . $row['City'] . "</td>";
                                    echo "<td>" . $row['State'] . "</td>";
                                    echo "<td>" . $row['Date'] . "</td>";

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
        </div>
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