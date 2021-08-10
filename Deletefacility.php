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
	<title></title>
</head>
	<?php
		if ($_POST['FacilityID'] == 'None') 
		{
			echo"Select Again.";
			header('Location: FacilityType.php');
		}

		mysqli_query($con,"DELETE FROM facility_type WHERE FacilityID = '$_POST[FacilityID]'");
	
		echo "Deleted.";
		header('Location: FacilityType.php');
		mysqli_close($con);

	?>
<body>

</body>
</html>