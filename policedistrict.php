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
                    $r = mysqli_num_rows($result);
                    //echo $r;

                    while ($data = mysqli_fetch_array($result)) {

                        echo "<tr><td style=' padding:5px;'><b><a href='policedistrict.php?regid=$data[0]'>$data[1]</a></b></td></tr>";
                    }
                    //mysqli_close($conn);
                    ?>

                </table>

            </div>





            <!--/sticky-->
            <div class="container_fluid">
                <div class="heading" style="font-size: 30px;">District</div>
                <div class="col-md-8">

                    <br>


                    <?php
                    if (isset($_GET["regid"])) {
                        // require_once "admin/Database_conn.php";
                        $regid = $_GET["regid"];
                        $sql = "select * from district where regID=' $regid '";
                        $res = mysqli_query($conn, $sql);
                        //  $r = mysqli_num_rows($res);
                        //echo $r;

                        while ($row = mysqli_fetch_array($res)) {


                    ?>

                            <div border="0" width="100px" bordercolor="#FF6666">

                                <div>
                                    <div align="center" style="background-color:#60B0E6; font-size:20px; font-family:Lucida Calligraphy; color:#FFF"><?php echo $row['districtName']; ?> </div>
                                </div>

                                <div>
                                    <div align="center" style="background-color:#60B0E6; font-family:Lucida Calligraphy"><a href="policeinfo.php?districtid=<?php echo $row['districtID']; ?>">
                                            <font color="#FFFFFF">View Detail</font>
                                        </a></div>
                                </div>

                            </div>
                            <br>


                    <?php

                        }
                    }
                    //       mysqli_close($conn);

                    ?>





                </div>
            </div>


        </div>

        <div style="clear:both"></div>

    </div> <!-- paymentWrapper -->

    <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

    <?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>