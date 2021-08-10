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
	<title>Booking</title>
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
	
	<form action="Booking.php" method="get">
		
		<table class = "container">
				<tr>
					<th>BookingID
					<input type="text" name="BookingID">
					<input type="submit" value="Search"></th>
			
			
		
	</form>
	<?php if ($_SESSION['Position'] == 'Manager') :?>
	<form action="DeleteBooking.php" method="post">
			<th><td>Cancel BookingID
			<select name="BookingID">
				<?php
				$result = mysqli_query($con,"SELECT * FROM booking WHERE Cancel like 'Y'");
				while($row = mysqli_fetch_array($result)) :
				?>
					<option value="<?=$row['BookingID'];?>"><?php echo $row['BookingID']; ?></option>
				<?php endwhile?>
			</select>
			<input type="submit" value="Delete"></td></th>
		</tr>
		</table>
	</form>
	<?php endif ?>

	<table>
		<tr><td></td></tr>
	</table>
	<?php

		if(isset($_GET['BookingID'])) 
		{
			$result = mysqli_query($con,"SELECT * FROM booking WHERE BookingID like '$_GET[BookingID]%'");
			?>
			<table class="container">
			<tr>
				<th width="50"><div align="center">BookingID</div></th>
				<th width="100"><div align="center">GuestName</div></th>
				<th width="50"><div align="center">TotalGuest</div></th>
				<th width="50"><div align="center">TotalCar</div></th>
				<th width="140"><div align="center">BookTimestamp</div></th>
				<th width="90"><div align="center">Username</div></th>
				<th width="90"><div align="center">CheckIn</div></th>
				<th width="90"><div align="center">CheckOut</div></th>
				<th width="90"><div align="center">Cancel</div></th>
				<th width="90"><div align="center">Subtotal</div></th>
				<th width="90"><div align="center">TotalPrice</div></th>
				<th width="120"><div align="center">PaymentMethod</div></th>
				<th width="120"><div align="center">CreditCardNo</div></th>
			</tr>
			<?php while($row = mysqli_fetch_array($result)): ?>

				<tr>
					<td><div align="center"><?php echo $row['BookingID']; ?></div></td>
					<td><div align="center"><?php echo $row['GuestName']; ?></div></td>
					<td><div align="center"><?php echo $row['TotalGuest']; ?></div></td>
					<td><div align="center"><?php echo $row['TotalCar']; ?></div></td>
					<td><div align="center"><?php echo $row['BookTimestamp']; ?></div></td>
					<td><div align="center"><?php echo $row['Username']; ?></div></td>
					<td><div align="center"><?php echo $row['CheckIn']; ?></div></td>
					<td><div align="center"><?php echo $row['CheckOut']; ?></div></td>
					<td><div align="center"><?php echo $row['Cancel']; ?></div></td>
					<td><div align="center"><?php echo $row['Subtotal']; ?></div></td>
					<td><div align="center"><?php echo $row['TotalPrice']; ?></div></td>
					<td><div align="center"><?php echo $row['PaymentMethod']; ?></div></td>
					<td><div align="center"><?php echo $row['CreditCardNo']; ?></div></td>
				</tr>	
			<?php endwhile ?>
			</table>
			<?php
			
		}
		else
		{
			$result = mysqli_query($con,"SELECT * FROM booking");
			?>
			<table class="container">
			<tr>
				<th width="50"><div align="center">BookingID</div></th>
				<th width="100"><div align="center">GuestName</div></th>
				<th width="50"><div align="center">TotalGuest</div></th>
				<th width="50"><div align="center">TotalCar</div></th>
				<th width="140"><div align="center">BookTimestamp</div></th>
				<th width="90"><div align="center">Username</div></th>
				<th width="90"><div align="center">CheckIn</div></th>
				<th width="90"><div align="center">CheckOut</div></th>
				<th width="90"><div align="center">Cancel</div></th>
				<th width="90"><div align="center">Subtotal</div></th>
				<th width="90"><div align="center">TotalPrice</div></th>
				<th width="120"><div align="center">PaymentMethod</div></th>
				<th width="120"><div align="center">CreditCardNo</div></th>
			</tr>
			<?php while($row = mysqli_fetch_array($result)): ?>

				<tr>
					<td><div align="center"><?php echo $row['BookingID']; ?></div></td>
					<td><div align="center"><?php echo $row['GuestName']; ?></div></td>
					<td><div align="center"><?php echo $row['TotalGuest']; ?></div></td>
					<td><div align="center"><?php echo $row['TotalCar']; ?></div></td>
					<td><div align="center"><?php echo $row['BookTimestamp']; ?></div></td>
					<td><div align="center"><?php echo $row['Username']; ?></div></td>
					<td><div align="center"><?php echo $row['CheckIn']; ?></div></td>
					<td><div align="center"><?php echo $row['CheckOut']; ?></div></td>
					<td><div align="center"><?php echo $row['Cancel']; ?></div></td>
					<td><div align="center"><?php echo $row['Subtotal']; ?></div></td>
					<td><div align="center"><?php echo $row['TotalPrice']; ?></div></td>
					<td><div align="center"><?php echo $row['PaymentMethod']; ?></div></td>
					<td><div align="center"><?php echo $row['CreditCardNo']; ?></div></td>
				</tr>	
			<?php endwhile ?>
			</table>
			<?php
		}		
		mysqli_close($con);
	?>
</body>
</html>