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
	<title>Update Room Price</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
		<link rel="stylesheet" href="nav.css">
		<link rel="stylesheet" href=" Template.css">
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
	<?php $result = mysqli_query($con,"SELECT * FROM room_detail");?>
	<form action="UpdateDBRoomDetail.php" method="post">
		<table width="300" border="1" class="container">
			<tr>
				<td><select name="RoomType">
					<?php while($row = mysqli_fetch_array($result)) : ?>
						<option value="<?=$row['RoomType']?>"><?php echo $row['RoomType'];?></option>
					<?php endwhile ?>
				</select></td>
				<td><input type="text" name="RoomPrice"></td>
			</tr>
		</table>
		<table class="container">
			<tr>
				<td><div align="center"><input type="submit" value="Save"></div></td>
			</tr>
		</table>
	</form>
	<?php mysqli_close($con); ?>
</body>
</html>