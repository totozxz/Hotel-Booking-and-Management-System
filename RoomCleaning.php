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
</head>

<body>
	<form action="RoomCleaning.php" method="get">
		
		<table width="599" border="1" class = "container">
				<tr>
					<th>RoomID
					<input type="text" name="roomId">
					<input type="submit" value="Search"></th>
			
		
	</form>
	<?php if ($_SESSION["Position"] == 'Manager' || $_SESSION["Position"] == 'Maid') :?>
		<form action="EditRoomCleaning.php" method="Post">
					<th>
					<td><select name="RoomID">
					<option value ="None">----</option>
					<?php 
					if ($_SESSION["Position"] == 'Maid')
					{
						$result = mysqli_query($con,"SELECT * FROM room_cleaning WHERE StaffID = '$_SESSION[ID]'");
					}
					else
					{
						$result = mysqli_query($con,"SELECT * FROM room_cleaning");
					}
					while($row = mysqli_fetch_array($result)) :?>
						
						<option value ="<?=$row['RoomID']?>"><?php echo $row['RoomID']; ?></option>
					<?php endwhile ?>
					</select> 
					<input type="submit" value="Edit"></td>
					</form>
		<?php if ($_SESSION["Position"] == 'Manager') :?>
			<form action="DeleteRoomCleaning.php" method="Post">
				<td><select name="RoomID">
				<option value ="None">----</option>
				<?php 
					$result = mysqli_query($con,"SELECT * FROM room_cleaning");
					while($row = mysqli_fetch_array($result)) :?>
						
						<option value ="<?=$row['RoomID']?>"><?php echo $row['RoomID']; ?></option>
				<?php endwhile ?>
				</select> 
				<input type="submit" value="Delete"></td></th>
			</tr>
		
		
		</form>
		<?php endif ?>
		</table>
	<?php endif ?>
	<table>
		<tr><td></td></tr>
	</table>
	<?php
		if (isset($_GET['roomId'])) 
		{
			$result = mysqli_query($con,"SELECT * FROM room_cleaning WHERE RoomID like '$_GET[roomId]%'");
			?>
			<table class = "container">
			<tr>
				<th width="90"><div align="center">RoomID</div></th>
				<th width="90"><div align="center">StaffID</div></th>
				<th width="90"><div align="center">BookingID</div></th>
				<th width="90"><div align="center">Status</div></th>
				<th width="90"><div align="center">Significance</div>
			</tr>
			<?php while($row = mysqli_fetch_array($result)) :?>
				<tr>
					<td><div align="center"><?php echo $row['RoomID']; ?></div></td>
					<td><div align="center"><?php echo $row['StaffID']; ?></div></td>
					<td><div align="center"><?php echo $row['BookingID']; ?></div></td>
					<td><div align="center"><?php echo $row['Status']; ?></div></td>
					<td><div align="center"><?php echo $row['Significance']; ?></div></td>
				</tr>	
			<?php endwhile ?>
			<?php echo "</table>";
			
		}

		else 
		{
			$result = mysqli_query($con,"SELECT * FROM room_cleaning");
			?>
			<table class = "container">
			<tr>
				<th width="90"><div align="center">RoomID</div></th>
				<th width="90"><div align="center">StaffID</div></th>
				<th width="90"><div align="center">BookingID</div></th>
				<th width="90"><div align="center">Status</div></th>
				<th width="90"><div align="center">Significance</div>
			</tr>
			<?php while($row = mysqli_fetch_array($result)) :?>
				<tr>
					<td><div align="center"><?php echo $row['RoomID']; ?></div></td>
					<td><div align="center"><?php echo $row['StaffID']; ?></div></td>
					<td><div align="center"><?php echo $row['BookingID']; ?></div></td>
					<td><div align="center"><?php echo $row['Status']; ?></div></td>
					<td><div align="center"><?php echo $row['Significance']; ?></div></td>
				</tr>	
			<?php endwhile ?>
			<?php echo "</table>";		
		}
		mysqli_close($con);
	?>
</body>
</html>