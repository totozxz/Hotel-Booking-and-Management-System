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
<!DOCTYPE html>
<html>
<head>
	<title>Save</title>
</head>
	<?php

		mysqli_query($con,"UPDATE customer SET FirstName = '$_POST[FirstName]',LastName = '$_POST[LastName]',Email = '$_POST[Email]',Phone = '$_POST[Phone]',Password = '$_POST[Password]' WHERE Username = '$_SESSION[User]'");
		echo "Customer Updated.";
		header('Location: Gallery.php');
		mysqli_close($con);

	?>
<body>
</body>
</html>