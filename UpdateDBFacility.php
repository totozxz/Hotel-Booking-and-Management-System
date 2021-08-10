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

		mysqli_query($con,"UPDATE facility_type SET FacilityID = '$_POST[FacilityID]', FacilityType = '$_POST[FacilityType]', 
		Price = '$_POST[Price]' 
		WHERE FacilityID = '$_POST[FacilityID]'");
		echo "RoomCleaning Updated.";
		header('Location: FacilityType.php');
		mysqli_close($con);

	?>
<body>
</body>
</html>