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



    <div class="spacer">a</div>

    <div class="searchBus">

        <div class="query">

            Bus from <?php echo "Chittagong"; ?> to <?php echo "Dhaka"; ?>

        </div>


        <div class="noOfBus">
            <?php echo 1 . " Bus found."; ?>
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


    <div class="searchBus">

        <div class="listItem">

            <!-- TRAIN INFO STARTS -->

            <form action="booking.php" method="POST">

                <div class="col-sm-2 text-center heightAdjustBusSearch">

                    <div class="values operators">

                        <?php echo "2"; ?>

                    </div>

                    <div class="departsSubscript">

                        Return #<?php echo "5"; ?>

                    </div>

                </div>

                <!-- TRAIN INFO ENDS -->


                <!-- DEPARTS STARTS -->

                <div class="col-sm-4 text-center">

                    <div class="values departs">

                        <?php echo "Hanif Paribahan"; ?>

                    </div>

                    <!-- <div class="departsSubscript">

                            <?php echo " tickets starting at "; ?><span style="font-family: sans-serif;">BDT</span><?php echo "500" . "/person"; ?>

                        </div> -->

                </div>

                <!-- DEPARTS ENDS -->


                <!-- DESTINATION STARTS -->

                <div class="col-sm-2 text-center">

                    <div class="values arrives">

                        <?php echo "Chittagong" ?>

                    </div>
                    <!-- 
                        <div class="arrivesSubscript">

                            Platform # <?php echo "CTG"; ?>

                        </div> -->

                </div>

                <!-- DESTINATION ENDS -->


                <!-- FARE STARTS -->

                <div class="col-sm-2 text-center">

                    <div class="values arrives">

                        <?php echo "Dhaka" ?>

                    </div>

                    <!-- <div class="arrivesSubscript">

                            Platform #<?php echo $row["destination"]; ?>

                        </div> -->

                </div>

                <!-- FARE ENDS -->

                <!-- SEATS AVAILABLE STARTS -->



                <!-- allowing only those trains to be booked which have enough seats -->



                <div class="col-sm-2 text-center" style="border-right: none;">

                    <div class="values availabilityGreen">



                    </div>

                    <div class="availabilitySubscript">

                        <input type="submit" class="availabilityBookingButton" value="Book Now">
                        <input type="hidden" name="trainIdPass" value="<?php echo "2"; ?>" />

                    </div>

                </div>


                <!-- SEATS AVAILABLE ENDS -->

                <!-- Passing the $_POST values to the next page using hidden text boxes  -->
                <!-- 
                    <input type="hidden" name="dateHidden" value="<?php echo $operator; ?>">
                    <input type="hidden" name="dayHidden" value="<?php echo $class; ?>">
                    <input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
                    <input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">

                    <input type="hidden" name="modeHidden" value="<?php echo "bus"; ?>"> -->

            </form>

        </div> <!-- listItem 1 -->

    </div>








    <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

    <?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>