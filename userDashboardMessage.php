<?php session_start();
if (!isset($_SESSION["username"])) {
    header("Location:blocked.php");
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
}
?>

<!DOCTYPE html>

<html lang="en">

<!-- HEAD TAG STARTS -->

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Dashboard | Tour&Travel</title>

    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/userDashboard.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>

</head>

<!-- HEAD TAG ENDS -->

<!-- BODY TAG STARTS -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourntravel";

// Creating a connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking if successfully connected to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<body>

    <div class="container-fluid">

        <div class="col-sm-12 userDashboard text-center">

            <?php include("common/headerDashboardTransparentLoggedIn.php"); ?>

            <div class="col-sm-12">

                <div class="heading">
                    My Dashboard
                </div>

            </div>

            <div class="col-sm-1"></div>

            <div class="col-sm-3 containerBoxLeft">

                <a href="userDashboardProfile.php">
                    <div class="col-sm-12 menuContainer bottomBorder">
                        <span class="fa fa-user-o"></span> My Profile
                    </div>
                </a>

                <div class="col-sm-12 menuContainer bottomBorder ">
                    <span class="fa fa-copy"></span> My Bookings
                </div>

                <a href="userDashboardETickets.php">
                    <div class="col-sm-12 menuContainer bottomBorder">
                        <span class="fa fa-clone"></span> My E-Tickets
                    </div>
                </a>

                <a href="userDashboardCancelTicket.php">
                    <div class="col-sm-12 menuContainer bottomBorder">
                        <span class="fa fa-close"></span> Cancel Ticket
                    </div>
                </a>
                <a href="userDashboardMessage.php">
                    <div class="col-sm-12 menuContainer  bottomBorder  active">
                        <span class="fa fa-bar-chart"></span> Messages
                    </div>
                </a>

                <a href="userDashboardAccountSettings.php">
                    <div class="col-sm-12 menuContainer noBottomBorder">
                        <span class="fa fa-bar-chart"></span> Account Stats
                    </div>
                </a>


            </div>

            <div class="col-sm-7 containerBoxRightHotel text-left">

                <div class="col-sm-12 ticketTableContainer pullABitLeft" id="hotelBookingsWrapper">
                    <div class="heading">Inbox</div>

                    <?php
                    $user = $_SESSION["username"];
                    //checking hotel booking query
                    $query = "SELECT * FROM `authoritymessage`WHERE username='$user' AND msgForm='Admin'";
                    $data = mysqli_query($conn, $query);
                    $row;
                    $row_nmbr = 0;
                    $i = 0;
                    if ($data) {
                        while ($row = mysqli_fetch_array($data)) {
                            $row_nmbr += 1;
                            if ($row['seen'] == 'not') {
                                $i++;
                            }
                        }
                    }
                    echo $i;
                    if ($data) {

                    ?>


                        <table class="table table-responsive" style="color: white;">


                            <tr>

                                <td class="tableElementTagsNoHover text-center"><?php echo "New Message" . $i; ?></td>
                                <td class="tableElementTagsNoHover text-center"><?php echo "all Message" .  $row_nmbr; ?></td>

                            </tr>
                        </table>

                    <?php

                    } else {
                        echo "<h4 >No Message</h4>";
                    }
                    ?>


                </div>

                <div class="col-sm-1"></div>

            </div>

            <div class="col-sm-12 spacer">a</div>
            <div class="col-sm-12 spacer">a</div>

        </div>

    </div> <!-- container-fluid -->

    <?php include("common/footer.php"); ?>

</body>


<!-- BODY TAG ENDS -->

</html>