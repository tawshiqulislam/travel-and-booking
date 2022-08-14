<?php session_start();
if (!isset($_SESSION["username"])) {
	header("Location:blockedBooking.php");
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];
}
?>

<!DOCTYPE html>

<html lang="en">

<!-- HEAD TAG STARTS -->

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Trains</title>

	<link href="css/main.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-select.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/moment-with-locales.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript">
		$(function() {

			$('#datetimepicker3').datetimepicker({
				format: 'L',
				locale: 'en-gb',
				useCurrent: false,
				minDate: moment()
			});

			$('#datetimepicker3').on('dp.change', function(e) {
				console.log(e.date.format('dddd'));
				$('#dayTrain').val(e.date.format('dddd'));
			});
		});
	</script>

</head>

<!-- HEAD TAG ENDS -->

<!-- BODY TAG STARTS -->

<body>

	<div class="container-fluid">

		<div class="trains col-sm-12">

			<!-- HEADER SECTION STARTS -->

			<div class="col-sm-12">

				<div class="header">

					<?php include("common/headerTransparentLoggedIn.php"); ?>

					<div class="col-sm-12">

						<div class="menu text-center">

							<ul>
								<a href="hotels.php">
									<li>Hotels</li>
								</a>
								<a href="flights.php">
									<li>Flights</li>
								</a>
								<li class="selected">Trains</li></a>
								<a href="bus.php">
									<li>Bus</li>
								</a>
							</ul>

						</div>

					</div>

				</div> <!-- header -->

			</div> <!-- col-sm-12 -->

			<!-- HEADER SECTION ENDS -->



			<!-- TRAIN SEARCH SECTION STARTS -->

			<div class="col-sm-12">

				<div class="search">

					<div class="content">

						<form action="trainSearch.php" method="POST">

							<div class="col-sm-6">
								<div class="form-group">
									<label for="originTrain">Origin:<p> </p></label>

									<select id="originTrain" data-live-search="true" class="selectpicker form-control" data-size="8" title="Select Origin Station" name="origin" required>

										<optgroup label="Chattogram Division">
											<option value="Chattogram" data-tokens="Chattogram">Chattogram District</option>
											<option value="Brahmanbaria" data-tokens="Brahmanbaria">Brahmanbaria District</option>
											<option value="Cumilla" data-tokens="Cumilla">Cumilla District</option>
											<option value="Feni" data-tokens="Feni">Feni District</option>
											<option value="Noakhali" data-tokens="Noakhali">Noakhali District</option>

										<optgroup label="Dhaka Division">
											<option value="Dhaka" data-tokens="Dhaka">Dhaka District</option>
											<option value="Faridpur" data-tokens="Faridpur">Faridpur District</option>
											<option value="Gazipur" data-tokens="Gazipur">Gazipur District</option>
											<option value="Gopalganj" data-tokens="Gopalganj">Gopalganj District</option>
											<option value="Kishoreganj" data-tokens="Kishoreganj">Kishoreganj District</option>
											<option value="Narayanganj" data-tokens="Narayanganj">Narayanganj District</option>
											<option value="Rajbari" data-tokens="Rajbari">Rajbari District</option>
											<option value="Tangail" data-tokens="Tangail">Tangail District</option>

										<optgroup label="Khulna Division">
											<option value="Chuadanga" data-tokens="Chuadanga">Chuadanga District</option>
											<option value="Jashore" data-tokens="Jashore">Jashore District</option>
											<option value="Jhenaidah" data-tokens="Jhenaidah">Jhenaidah District</option>
											<option value="Kushtia" data-tokens="Kushtia">Kushtia District</option>

										<optgroup label="Mymensingh Division">
											<option value="Mymensingh" data-tokens="Mymensingh">Mymensingh District</option>
											<option value="Jamalpur" data-tokens="Jamalpur">Jamalpur District</option>
											<option value="Netrokona" data-tokens="Netrokona">Netrokona District</option>

										<optgroup label="Rajshahi Division">
											<option value="Rajshahi" data-tokens="Rajshahi">Rajshahi District</option>
											<option value="Bogra" data-tokens="Bogra">Bogra District</option>
											<option value="Chapai Nawabganj" data-tokens="Chapai Nawabganj">Chapai Nawabganj District</option>
											<option value="Joypurhat" data-tokens="Joypurhat">Joypurhat District</option>
											<option value="Naogaon" data-tokens="Naogaon">Naogaon District</option>
											<option value="Natore" data-tokens="Natore">Natore District</option>
											<option value="Pabna" data-tokens="Pabna">Pabna District</option>
											<option value="Sirajganj" data-tokens="Sirajganj">Sirajganj District</option>

										<optgroup label="Rangpur Division">
											<option value="Rangpur" data-tokens="Rangpur">Rangpur District</option>
											<option value="Gaibandha" data-tokens="Gaibandha">Gaibandha District</option>
											<option value="Dinajpur" data-tokens="Dinajpur">Dinajpur District</option>
											<option value="Kurigram" data-tokens="Kurigram">Kurigram District</option>
											<option value="Lalmonirhat" data-tokens="Lalmonirhat">Lalmonirhat District</option>
											<option value="Nilphamari" data-tokens="Nilphamari">Nilphamari District</option>
											<option value="Panchagarh" data-tokens="Panchagarh">Panchagarh District</option>
											<option value="Thakurgaon" data-tokens="Thakurgaon">Thakurgaon District</option>

										<optgroup label="Sylhet Division">
											<option value="Sylhet" data-tokens="Sylhet">Sylhet District</option>
											<option value="Habiganj" data-tokens="Habiganj">Habiganj District</option>
											<option value="Moulvibazar" data-tokens="Moulvibazar">Moulvibazar District</option>
											<option value="Sunamganj" data-tokens="Sunamganj">Sunamganj District</option>

									</select>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="destinationTrain">Destination:<p> </p></label>

									<select id="destinationTrain" data-live-search="true" class="selectpicker form-control" data-size="8" title="Select Destination Station" name="destination" required>
										<optgroup label="Chattogram Division">
											<option value="Chattogram" data-tokens="Chattogram">Chattogram District</option>
											<option value="Brahmanbaria" data-tokens="Brahmanbaria">Brahmanbaria District</option>
											<option value="Cumilla" data-tokens="Cumilla">Cumilla District</option>
											<option value="Feni" data-tokens="Feni">Feni District</option>
											<option value="Noakhali" data-tokens="Noakhali">Noakhali District</option>

										<optgroup label="Dhaka Division">
											<option value="Dhaka" data-tokens="Dhaka">Dhaka District</option>
											<option value="Faridpur" data-tokens="Faridpur">Faridpur District</option>
											<option value="Gazipur" data-tokens="Gazipur">Gazipur District</option>
											<option value="Gopalganj" data-tokens="Gopalganj">Gopalganj District</option>
											<option value="Kishoreganj" data-tokens="Kishoreganj">Kishoreganj District</option>
											<option value="Narayanganj" data-tokens="Narayanganj">Narayanganj District</option>
											<option value="Rajbari" data-tokens="Rajbari">Rajbari District</option>
											<option value="Tangail" data-tokens="Tangail">Tangail District</option>

										<optgroup label="Khulna Division">
											<option value="Chuadanga" data-tokens="Chuadanga">Chuadanga District</option>
											<option value="Jashore" data-tokens="Jashore">Jashore District</option>
											<option value="Jhenaidah" data-tokens="Jhenaidah">Jhenaidah District</option>
											<option value="Kushtia" data-tokens="Kushtia">Kushtia District</option>

										<optgroup label="Mymensingh Division">
											<option value="Mymensingh" data-tokens="Mymensingh">Mymensingh District</option>
											<option value="Jamalpur" data-tokens="Jamalpur">Jamalpur District</option>
											<option value="Netrokona" data-tokens="Netrokona">Netrokona District</option>

										<optgroup label="Rajshahi Division">
											<option value="Rajshahi" data-tokens="Rajshahi">Rajshahi District</option>
											<option value="Bogra" data-tokens="Bogra">Bogra District</option>
											<option value="Chapai Nawabganj" data-tokens="Chapai Nawabganj">Chapai Nawabganj District</option>
											<option value="Joypurhat" data-tokens="Joypurhat">Joypurhat District</option>
											<option value="Naogaon" data-tokens="Naogaon">Naogaon District</option>
											<option value="Natore" data-tokens="Natore">Natore District</option>
											<option value="Pabna" data-tokens="Pabna">Pabna District</option>
											<option value="Sirajganj" data-tokens="Sirajganj">Sirajganj District</option>

										<optgroup label="Rangpur Division">
											<option value="Rangpur" data-tokens="Rangpur">Rangpur District</option>
											<option value="Gaibandha" data-tokens="Gaibandha">Gaibandha District</option>
											<option value="Dinajpur" data-tokens="Dinajpur">Dinajpur District</option>
											<option value="Kurigram" data-tokens="Kurigram">Kurigram District</option>
											<option value="Lalmonirhat" data-tokens="Lalmonirhat">Lalmonirhat District</option>
											<option value="Nilphamari" data-tokens="Nilphamari">Nilphamari District</option>
											<option value="Panchagarh" data-tokens="Panchagarh">Panchagarh District</option>
											<option value="Thakurgaon" data-tokens="Thakurgaon">Thakurgaon District</option>

										<optgroup label="Sylhet Division">
											<option value="Sylhet" data-tokens="Sylhet">Sylhet District</option>
											<option value="Habiganj" data-tokens="Habiganj">Habiganj District</option>
											<option value="Moulvibazar" data-tokens="Moulvibazar">Moulvibazar District</option>
											<option value="Sunamganj" data-tokens="Sunamganj">Sunamganj District</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label for="datetime3">Select Date:<p> </p></label>
									<div class="input-group date" id="datetimepicker3">
										<input id="datetime3" type="text" class="inputDate form-control" placeholder="Select Date" name="date" required />
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-3">

								<label for="class">Select Class: <p> </p></label>
								<div class="form-group">
									<select id="class" class="selectpicker form-control" data-size="5" title="Select Class" name="class" required>
										<option value="1AC" data-subtext="NON AC">First Class Chair</option>
										<option value="2AC" data-subtext="NON AC">Shovan Chair</option>
										<option value="3AC" data-subtext="NON AC">Shovan</option>
										<option value="SL" data-subtext="Sleeper">AC Class Berth</option>
										<option value="CC" data-subtext="Chair">AC Chair</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">

								<label for="adults">No. of adults:<p> </p></label>
								<div class="form-group">
									<select id="adults" class="selectpicker form-control" data-size="5" title="Aged 18 and above" name="adults" required>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">

								<label for="children">No. of children:<p> </p></label>
								<div class="form-group">
									<select id="children" class="selectpicker form-control" data-size="5" title="Aged upto 17" name="children" required>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>
							</div>

							<input type="hidden" name="day" value="null" id="dayTrain" />

							<div class="col-sm-12 text-center">

								<input type="submit" class="button" name="searchTrains" value="Search Trains">

							</div>

						</form>

					</div> <!-- content -->

				</div> <!-- search -->

			</div>

			<!-- TRAIN SEARCH SECTION ENDS -->

		</div> <!-- trains -->


		<div class="footer col-sm-12">
		</div>




	</div> <!-- container-fluid -->

	<?php include("common/footer.php"); ?>

</body>

<!-- BODY TAG ENDS -->

</html>