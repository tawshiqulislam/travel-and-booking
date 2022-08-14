<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<!-- HEAD TAG STARTS -->

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>About Us | Tour&Travel</title>

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

    <?php

    if (!isset($_SESSION["username"])) {
        include("common/headerLoggedOut.php");
    } else {
        include("common/headerLoggedIn.php");
    }

    ?>

    <div class="spacer">a</div>

    <div class="col-sm-12 aboutUsWrapper">

        <div class="headingOne">



        </div>

        <div style="height:50px"></div>
        <div style="width:1000px; margin:auto">

            <div style="width:200px; float:left">

                <table cellpadding="0" cellspacing="0" width="1000px">
                    <tr>
                        <td style="font-family:Lucida Calligraphy; font-size:20px; color:#09F"><b>Region</b></td>
                    </tr>
                    <?php

                    require_once "admin/Database_conn.php";
                    $s = "select * from region";
                    $result = mysqli_query($conn, $s);
                    // $r = mysqli_num_rows($result);
                    //echo $r;

                    while ($data = mysqli_fetch_array($result)) {

                        echo "<tr><td style=' padding:5px;'><b><a href='district.php?regid=$data[0]'>$data[1]</a></b></td></tr>";
                    }
                    // mysqli_close($conn);
                    ?>

                </table>

            </div>


            <!--/sticky-->
            <div class="container_fluid">

                <div class="col-md-6">

                    <h2>Guide Hired Successfully</h2>

                </div>
            </div>


            <?php
            $guideID = $_GET['guideID'];
            $user = $_SESSION["username"];

            $sql = "UPDATE  guides set available = 'no' , hiring='yes', username='$user' where guideID =$guideID";
            $data = mysqli_query($conn, $sql);
            ?>




        </div>

        <div style="clear:both"></div>

    </div> <!-- paymentWrapper -->

    <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

    <?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>