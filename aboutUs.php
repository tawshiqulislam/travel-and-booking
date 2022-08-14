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

			About Us

		</div>

		<div class="para">
			<!--dummy description---->
			Tours & Travels is one of the most popular Tour & Travel Agency in Bangladesh which has been providing tourism service with a good reputation at the same place. The skills & Honesty of Tours in the travels services is unrivaled.

			Tours the skilled & trustworthy organization , Package Tours , Air Tickets , Hotel Booking in various places around our country.

			A group of talented tourism graduate in Tours have made a team to engaged and better service & always ready to serve .
		</div>

	</div> <!-- paymentWrapper -->

	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->

	<?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>