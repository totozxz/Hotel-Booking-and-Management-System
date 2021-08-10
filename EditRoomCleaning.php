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
		<?php
			if ($_POST['RoomID'] == 'None') 
			{
				echo"Select Again.";
				header('Location: RoomCleaning.php');
			}
			$result = mysqli_query($con,"SELECT * FROM room_cleaning WHERE RoomID = '$_POST[RoomID]'");

			while($row = mysqli_fetch_array($result)) :?>
				<form action="UpdateDBRoomCleaning.php" method="post">
					<table width="300" border="1" class="container">
					<tr>
						<td>RoomID 			: </td><td><?php echo $row['RoomID']; ?><input type="hidden" name="RoomID" value="<?=$row['RoomID'];?>"></td>
					</tr>
					<?php if ($_SESSION['Position'] == 'Manager') : ?><br>
						<tr>
							<td>StaffID			: </td><td><input type="text" name="StaffID" value ="<?=$row['StaffID'];?>"></td>
						</tr>
						<tr>
							<td>Booking ID 		: </td><td><input type="text" name="BookingID" value="<?=$row['BookingID'];?>"></td>
						</tr>
					<?php endif ?>
					<?php if ($_SESSION['Position'] == 'Maid') : ?>
						<tr>
							<td>StaffID			: </td><td><?php echo $row['StaffID'];?><input type="hidden" name="StaffID" value ="<?=$row['StaffID'];?>"></td>
						</tr>
						<tr>
							<td>Booking ID 		: </td><td><?php echo $row['BookingID'];?><input type="hidden" name="BookingID" value="<?=$row['BookingID'];?>"></td>
						</tr>
					<?php endif ?>
					<tr>
						<td>Status			: </td><td><select name="Status">
										<option value="OC">OC</option>
										<option value="OD">OD</option>
										<option value="VC">VC</option>
										<option value="VD">VD</option>
										<option value="AC">AC</option>
										<option value="AD">AD</option>
									 </select></td>
					</tr>
					<tr>
						<td>Significance	: </td><td><select name="Significance">
										<option value="4">Most Significant</option>
										<option value="3">Significant</option>
										<option value="2">Common</option>
									 </select></td>
					</tr>
				</table>
				<table class="container">
					<tr>
						<td><div align="center"><input type="submit" value ="Save"></div></td>
					</tr>
				</table>
				</form>
				
			<?php endwhile ?>
			<?php
			mysqli_close($con);
		?>
	
	</body>
</html>