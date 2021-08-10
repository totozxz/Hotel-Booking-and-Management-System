<?php
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
<!DOCTYPE html>
<html>
<head>
	<title>Save</title>
</head>
	<?php

		mysqli_query($con,"UPDATE room_cleaning SET StaffID = '$_POST[StaffID]', BookingID = '$_POST[BookingID]', 
		Status = '$_POST[Status]', Significance = '$_POST[Significance]' 
		WHERE RoomID = '$_POST[RoomID]'");
		echo "RoomCleaning Updated.";
		header('Location: RoomCleaning.php');
		mysqli_close($con);
	

	?>
<body>
</body>
</html>