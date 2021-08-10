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
	<title>Update Profile</title>
</head>
	<?php
		
		mysqli_query($con,"UPDATE staff SET StaffID = '$_POST[StaffID]', FirstName = '$_POST[FirstName]', LastName = '$_POST[LastName]', Password = '$_POST[Password]', Position = '$_POST[Position]', Gender = '$_POST[Gender]', Phone = '$_POST[Phone]',Email = '$_POST[Email]', Address = '$_POST[Address]', CitizenID = '$_POST[CitizenID]', Account = '$_POST[Account]', Salary = '$_POST[Salary]' WHERE StaffID = '$_POST[StaffID]'");
		
		echo "Profile Updated.";
		header('Location: AllStaff.php');
		mysqli_close($con);

	?>
<body>

</body>
</html>