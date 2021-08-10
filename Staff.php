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
</head>
<style>
		input[type = submit] 
		{
    	padding-left: 0;
    	padding-right: 0;
    	height: 75%;
    	width: 75%;
		}
</style>
	<?php
		$ID = $_SESSION['User'];
		
		$result = mysqli_query($con,"SELECT * FROM Staff WHERE staffID = '$ID'");

	
		while($row = mysqli_fetch_array($result)) 
		{
			$staffID = $row['StaffID'];
			$Password = $row['Password'];
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$Position = $row['Position'];
			$Gender = $row['Gender'];
			$Phone = $row['Phone'];
			$Email = $row['Email'];
			$Address = $row['Address'];
			$Citizen = $row['CitizenID'];
			$Account = $row['Account'];
			$Salary = $row['Salary'];
		}	
	?>
	<body>
		<table class="container">
			<th><td><div align="center"><b>Staff Profile</b></div></td></th>
		</table>
		<table width="300" border="1" class="container">
			<tr><td>ID 			: </td><td><?php echo $staffID; ?></td></tr>
			<tr><td>FirstName 	: </td><td><?php echo $FirstName; ?></td></tr>
			<tr><td>LastName 	: </td><td><?php echo $LastName; ?></td></tr>
			<tr><td>Gender 		: </td><td><?php echo $Gender; ?></td></tr>
			<tr><td>Position 	: </td><td><?php echo $Position; ?></td></tr>
			<tr><td>Phone 		: </td><td><?php echo $Phone; ?></td></tr>
			<tr><td>Address 	: </td><td><?php echo $Address; ?></td></tr>
			<tr><td>Salary	 	: </td><td><?php echo $Salary; ?></td></tr>
		</table>
		<table class="container">
			<tr><td><div align="center">
			<form action="Editprofile.php" method="post">
				<input type="hidden" name="ID" value="<?=$staffID?>">
				<input type = "submit" value ="EditProfile">
			</form>
			</div></td></tr>
		</table>	
	</body>
</html>