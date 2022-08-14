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
    <title>Train Search</title>

    <link href="css/main.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<!-- HEAD TAG ENDS -->

<!-- BODY TAG STARTS -->

<body>

    <?php include("common/headerLoggedIn.php"); ?>

    <?php

    $origin = $_POST["origin"];
    $destination = $_POST["destination"];

    $date = $_POST["date"];
    $class = $_POST["type"];

    // $departure = $_POST["departure"];
    // $arrival = $_POST["arrival"];
    // $seats = $_POST["seats"];
    // $price = $_POST["fare"];



    ?>

    <div class="spacer">a</div>

    <div class="searchBus">

        <div class="query">

            Bus from <?php echo $origin; ?> to <?php echo $destination; ?>

        </div>


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

        $sql = "SELECT * FROM bus WHERE origin='$origin' AND destination='$destination'";
        $rowcount = mysqli_num_rows(mysqli_query($conn, $sql));

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        ?>
            <div class="noOfBus">
                <?php echo $rowcount . " Bus found."; ?>
            </div>

            <div class="listItemMenuContainer">

                <div class="col-sm-2 text-center">

                    <div class="headings">

                        Bus No.

                    </div>

                </div>

                <div class="col-sm-4 text-center">

                    <div class="headings">

                        Operator Name

                    </div>

                </div>

                <div class="col-sm-2 text-center">

                    <div class="headings">

                        Departs

                    </div>

                </div>

                <div class="col-sm-2 text-center">

                    <div class="headings">

                        Arrives

                    </div>

                </div>

                <div class="col-sm-2 text-center">

                    <div class="headings">

                        Availability

                    </div>

                </div>

            </div> <!-- listItemMenuContainer -->

            <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

    </div> <!-- search Trains -->

    <?php
            while ($row = $result->fetch_assoc()) {

    ?>

        <div class="searchBus">

            <div class="listItem">

                <!-- TRAIN INFO STARTS -->

                <form action="booking.php" method="POST">

                    <div class="col-sm-2 text-center heightAdjustBusSearch">

                        <div class="values operators">

                            <?php echo $row["busID"]; ?>

                        </div>

                        <div class="departsSubscript">

                            Return #<?php echo $row["busID"]; ?>

                        </div>

                    </div>

                    <!-- TRAIN INFO ENDS -->


                    <!-- DEPARTS STARTS -->

                    <div class="col-sm-4 text-center">

                        <div class="values departs">

                            <?php echo $row["operator"]; ?>

                        </div>

                        <!-- <div class="departsSubscript">

                            <?php echo $class . " tickets starting at "; ?><span style="font-family: sans-serif;">BDT</span><?php echo $row[$priceClass] . "/person"; ?>

                        </div> -->

                    </div>

                    <!-- DEPARTS ENDS -->


                    <!-- DESTINATION STARTS -->

                    <div class="col-sm-2 text-center">

                        <div class="values arrives">

                            <?php echo $row["origin"]; ?>

                        </div>
                        <!-- 
                        <div class="arrivesSubscript">

                            Platform # <?php echo $row["originPlatform"]; ?>

                        </div> -->

                    </div>

                    <!-- DESTINATION ENDS -->


                    <!-- FARE STARTS -->

                    <div class="col-sm-2 text-center">

                        <div class="values arrives">

                            <?php echo $row["destination"]; ?>

                        </div>

                        <!-- <div class="arrivesSubscript">

                            Platform #<?php echo $row["destination"]; ?>

                        </div> -->

                    </div>

                    <!-- FARE ENDS -->

                    <!-- SEATS AVAILABLE STARTS -->

                    <?php

                    $busID = $row["busID"];

                    //checking availability of tickets query
                    $getSeatsAvailableSQL = "SELECT $seats FROM `bus` WHERE busID='$busID'";
                    $getSeatsAvailableQuery = $conn->query($getSeatsAvailableSQL);
                    $SeatsAvailableGet = $getSeatsAvailableQuery->fetch_array(MYSQLI_NUM);

                    $seatsAvailable = $SeatsAvailableGet[0];

                    ?>

                    <!-- allowing only those trains to be booked which have enough seats -->

                    <?php if ($seatsAvailable >= (int)$adults + (int)$children) : ?>

                        <div class="col-sm-2 text-center" style="border-right: none;">

                            <div class="values availabilityGreen">

                                <?php echo $row[$seat]; ?>

                            </div>

                            <div class="availabilitySubscript">

                                <input type="submit" class="availabilityBookingButton" value="Book Now">
                                <input type="hidden" name="trainIdPass" value="<?php echo $busID; ?>" />

                            </div>

                        </div>

                    <?php else :  ?>

                        <div class="col-sm-2 text-center" style="border-right: none;">

                            <div class="values availabilityRed">

                                Unavailable

                            </div>

                            <div class="unavailabilitySubscript">

                                Sold Out

                            </div>

                        </div>

                    <?php endif; ?>

                    <!-- SEATS AVAILABLE ENDS -->

                    <!-- Passing the $_POST values to the next page using hidden text boxes  -->

                    <input type="hidden" name="dateHidden" value="<?php echo $operator; ?>">
                    <input type="hidden" name="dayHidden" value="<?php echo $class; ?>">
                    <input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
                    <input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">

                    <input type="hidden" name="modeHidden" value="<?php echo "bus"; ?>">

                </form>

            </div> <!-- listItem 1 -->

        </div>

    <?php

            }
        } else {

    ?>

    <div class="searchFlights">

        <div class="noFlights">

            No Bus found.

        </div>

    </div>

<?php

        }

?>

<?php $conn->close(); //closing the connection to the database 
?>

<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

<?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>