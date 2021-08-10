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
	<title>RoomCleaning</title>
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
<body>
	<?php if ($_SESSION["Position"] == 'Manager') :?>
		<form action="Editprofile.php" method="Post">
			<table width="599" border="1" class ="container">
				<tr>
					<th>
					<td><select name="StaffID">
					<option value ="None">----</option>
					<?php 
					
					$result = mysqli_query($con,"SELECT * FROM staff");
					while($row = mysqli_fetch_array($result)) :?>
						
						<option value ="<?=$row['StaffID']?>"><?php echo $row['StaffID']; ?></option>
					<?php endwhile ?>
					</select>
					<input type="submit" value="Edit"></th></td>
		</form>
		<form action="Deleteprofile.php" method="Post">
					
					<td><select name="StaffID">
					<option value ="None">----</option>
					<?php 
					
					$result = mysqli_query($con,"SELECT * FROM staff");
					while($row = mysqli_fetch_array($result)) :?>
						
						<option value ="<?=$row['StaffID']?>"><?php echo $row['StaffID']; ?></option>
					<?php endwhile ?>
					</select>
					<input type="submit" value="Delete"></td>
				</tr>
		</form>
	</table>
	<?php endif ?>
	<table>
		<tr><td></td></tr>
	</table>
	<?php
		$result = mysqli_query($con,"SELECT * FROM staff ");
		?>
		<table class="container">
		<tr>
			<th width="90"><div align="center">StaffID</div></th>
			<th width="90"><div align="center">FirstName</div></th>
			<th width="90"><div align="center">LastName</div></th>
			<th width="90"><div align="center">Position</div>
			<th width="90"><div align="center">Gender</div>
			<th width="90"><div align="center">Phone</div>
			<th width="90"><div align="center">Email</div>
			<th width="90"><div align="center">Address</div>
			<th width="90"><div align="center">Citizen</div>
			<th width="90"><div align="center">Account</div>
		</tr>
		<?php while($row = mysqli_fetch_array($result)):?>

			<tr>
				<td><div align="center"><?php echo $row['StaffID']; ?></div></td>
				<td><div align="center"><?php echo $row['FirstName']; ?></div></td>
				<td><div align="center"><?php echo $row['LastName']; ?></div></td>
				<td><div align="center"><?php echo $row['Position']; ?></div></td>
				<td><div align="center"><?php echo $row['Gender']; ?></div></td>
				<td><div align="center"><?php echo $row['Phone']; ?></div></td>
				<td><div align="center"><?php echo $row['Email']; ?></div></td>
				<td><div align="center"><?php echo $row['Address']; ?></div></td>
				<td><div align="center"><?php echo $row['CitizenID']; ?></div></td>
				<td><div align="center"><?php echo $row['Account']; ?></div></td>
			</tr>	
		<?php endwhile ?>
		</table>
			
		<?php mysqli_close($con);
	?>
</body>
</html>