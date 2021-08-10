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
	<title>CustomerDetail</title>
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
	<?php
		$result = mysqli_query($con,"SELECT * FROM customer " );
		?>
		<table class="container">
		<tr>
			<th width="90"><div align="center">Username</div></th>
			<th width="90"><div align="center">FirstName</div></th>
			<th width="90"><div align="center">LastName</div></th>
			<th width="90"><div align="center">Email</div></th>
			<th width="90"><div align="center">Phone</div></th>
		</tr>
		<?php while($row = mysqli_fetch_array($result)) :?>
			<tr>
				<td><div align="center"><?php echo $row['Username']; ?></div></td>
				<td><div align="center"><?php echo $row['FirstName']; ?></div></td>
				<td><div align="center"><?php echo $row['LastName']; ?></div></td>
				<td><div align="center"><?php echo $row['Email']; ?></div></td>
				<td><div align="center"><?php echo $row['Phone']; ?></div></td>
			</tr>
		<?php endwhile ?>
		</table>

	<?php mysqli_close($con);?>
</body>
</html>