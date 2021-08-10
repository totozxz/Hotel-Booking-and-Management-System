<?php
	// Start the session
	session_start();
	$Host = "localhost";
	$username = "root";
	$pass = "";
	$myDB = "hotel_db";
	$con = mysqli_connect($Host,$username,$pass,$myDB);
	// Check connection
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
<html>
	
	<head>
		<title>Staff Information</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
		<link rel="stylesheet" href="nav.css">
		<link rel="stylesheet" href="Template.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script type='text/javascript'>
    		$.get('nav_staff.php',function(response)
    		{ 
        		$('#nav-placeholder').html(response);
    		});
		</script>
	</head>
	<div id="nav-placeholder" class ="sticky-top"></div>
	<style>
		input[type = submit] 
		{
    	padding-left: 0;
    	padding-right: 0;
    	height: 75%;
    	width: 75%;
		}
	</style>

	<body>
		

		
		<table class="container">
		<th><h1><div align="center"> Data that User can access.</div></h1></th>
		<tr><td><div align="center"><form action="RoomList.php" class="button">
			<input type = "submit" value = "Room List">
		</form></td></div></tr>
		
		<tr><td><div align="center"><form action="BookingList.php" class="button">
			<input type = "submit" value = "Booking List">
		</form></td></div></tr>

		<?php if ($_SESSION['Position'] != 'Maid') : ?>		
		<tr><td><div align="center"><form action="Customer.php" class="button">
			<input type = "submit" value = "Customer List">
		</form></div></td></tr>
		<?php endif ?>

		<tr><td><div align="center"><form action="RoomFacility.php" class="button">
			<input type = "submit" value = "RoomFacility List">
		</form></div></td></tr>

		<tr><td><div align="center"><form action="RoomRequest.php" class="button">
			<input type = "submit" value = "RoomRequest List"</button">
		</form></div></td></tr>

		<tr><td><div align="center"><form action="RoomDetail.php" class="button">
			<input type = "submit" value = "RoomDetail">
		</form></div></td></tr>


		<?php if ($_SESSION['Position'] != 'Maid') : ?>	
				<tr><td><div align="center"><form action="FacilityType.php" class="button">
					<input type = "submit" value ="FacilityType">
				</form></div></td></tr>
				<tr><td><div align="center"><form action="DiscountCode.php" class="button">
					<input type = "submit" value ="DiscountCode">
				</form></div></td></tr>
		<?php endif ?>
		
	</body>
	<? mysqli_close($con); ?>
</html>