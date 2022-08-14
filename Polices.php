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

            Find a Tourist Police.

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

                        echo "<tr><td style=' padding:5px;'><b><a href='policedistrict.php?regid=$data[0]'>$data[1]</a></b></td></tr>";
                    }
                    mysqli_close($conn);
                    ?>

                </table>

            </div>


            <!--/sticky-->
            <div class="container_fluid">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="heading">Search By Area</div>
                            <form method="post" action="policeinfo.php">


                                <div class="form-group row">
                                    <tr>
                                        <td>
                                            <div class="col-xs-8">
                                                <h4>Select District</h4>
                                                <select class="form-control" name="district" required />
                                                <option value="">Select</option>

                                                <?php
                                                require_once "admin/Database_conn.php";
                                                $sql = "select * from district";
                                                $result = mysqli_query($conn, $sql);
                                                $r = mysqli_num_rows($result);
                                                //echo $r;
                                                $n = 0;
                                                while ($data = mysqli_fetch_array($result)) {
                                                    $n++;
                                                    echo "<option value=$data[0]>$data[1]</option>";
                                                }
                                                echo $n;
                                                ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php echo $n;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="col-xs-8" style="padding-top: 20px;">
                                                <input type="submit" class="col-md-3 btn btn-success btn-block " name="submit" value="Search">
                                            </div>
                                        </td>
                                    </tr>
                                    <br>

                                </div>
                            </form>
                        </div>
                    </div>
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