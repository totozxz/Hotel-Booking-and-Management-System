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
		if ($_POST['Code'] == 'None') 
		{
			echo "Select Again.";
			header('Location: DiscountCode.php');
		}

		mysqli_query($con,"DELETE FROM discount_code WHERE Code = '$_POST[Code]'");
	
		echo "Deleted.";
		header('Location: DiscountCode.php');
		mysqli_close($con);
	?>
<body>

</body>
</html>