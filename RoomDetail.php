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
	<title>RoomDetail</title>
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
		if ($_SESSION['Position'] == 'Manager') : ?>
			<table class="container">
			<th><div align="center">
			<form action="EditRoomPrice.php" >	
				<input type="submit" value="Update Price">
			</form>
			</th></div></table> 
			
		<?php endif ?>
		<table>
			<tr><td></td></tr>
		</table>
		<?php
		$result = mysqli_query($con,"SELECT * FROM room_detail");
		?>
		<table class="container">
		<tr>
			<th width="90"><div align="center">RoomType</div></th>
			<th width="90"><div align="center">MaxPerson</div></th>
			<th width="90"><div align="center">RoomPrice</div></th>
		</tr>
		<?php while($row = mysqli_fetch_array($result)) : ?>

			<tr>
				<td><div align="center"><?php echo $row['RoomType']; ?></div></td>
				<td><div align="center"><?php echo $row['MaxPerson']; ?></div></td>
				<td><div align="center"><?php echo $row['RoomPrice']; ?></div></td>
			</tr>

		<?php endwhile ?>
		</table>		
	<?php mysqli_close($con); ?>
</body>
</html>