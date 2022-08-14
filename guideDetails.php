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
            Guide details

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
                    //  mysqli_close($conn);
                    ?>

                </table>

            </div>


            <!--/sticky-->
            <div class="container_fluid">




                <table border="0" width="500px" height="300px" align="center" style="font: bold; color:black">




                    <?php
                    require_once "admin/Database_conn.php";

                    $sql = "select * from guides where guideID='" . $_GET["guideid"] . "'";
                    $result = mysqli_query($conn, $sql);
                    $r = mysqli_num_rows($result);
                    //echo $r;
                    $n = 0;
                    $data = mysqli_fetch_array($result);
                    mysqli_close($conn);
                    ?>


                    <tr>
                        <td colspan="3"><span class="middletext">Guide Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[1]; ?></td>
                        <hr>
                    </tr>
                    <tr>
                        <td class="middletext">
                            <div width="200px" height="200px"> <?php echo $data[4]; ?> </div>
                        </td>


                    </tr>
                    <tr>
                        <br>
                        <td colspan="3" height="90px"><span class="middletext">Name:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $data[1]; ?>
                            <br />

                            <span class="middletext">Age:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $data[5]; ?>
                            <br />
                            <span class="middletext">Phone:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $data[7]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span class="middletext">Available:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <p><?php echo $data[8]; ?></p>
                        </td>
                    </tr>

                    <?php if ($data[8] == 'yes') {  ?>
                        <tr>
                            <td class="btn btn-outline-primary"><a href="hireGuide.php?guideID=<?php echo $data[0];   ?>"><input type="button" value="Hire" name="sbmt" /></a></td>
                        </tr>
                    <?php      } else { ?>
                        <tr>
                            <td class="btn btn-outline-primary"><input type="button" value="Not Available" name="sbmt" /></a></td>
                        </tr>
                    <?php       } ?>
                </table>
                </td>
                </tr>
                </table>
                </td>
                </tr>
                </table>


            </div>




        </div>

        <div style="clear:both"></div>

    </div> <!-- paymentWrapper -->

    <div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

    <?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>