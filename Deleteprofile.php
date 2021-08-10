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
		if ($_POST['StaffID'] == 'None') 
		{
			echo"Select Again.";
			header('Location: AllStaff.php');
		}

		mysqli_query($con,"DELETE FROM staff WHERE StaffID = '$_POST[StaffID]'");
	
		echo "Deleted.";
		header('Location: AllStaff.php');
		mysqli_close($con);

	?>
<body>

</body>
</html>