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
	<title>RoomList</title>
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
<?php if ($_SESSION['Position'] == 'Manager') :?>
	<form action="AddDiscount.php">
		
		<table width="210" border="1" class="container">
				<tr>
					<th>
					<td>
						<div align="center"><input type="submit" value="Add"></div>
					</td>
				
	</form>
	<form action="DeleteDiscount.php" method="post">
					<td>
						<select name="Code">
							<option value="None">----</option>
							<?php $result = mysqli_query($con,"SELECT * FROM discount_code");
							while($row = mysqli_fetch_array($result)): ?>
								<option value="<?=$row['Code']?>"><?php echo $row['Code'];?></option>
							<?php endwhile ?>
						</select>
	
						<input type="submit" value="Delete">
					</td></th>

				</tr>
		</table>
	</form>
	<?php endif ?>
	<table><tr><td></td></tr></table>
<body>
	<?php
		$result = mysqli_query($con,"SELECT * FROM discount_code");
		?>
		<table class="container">
		<tr>
			<thead>
			<th><h1><div align="center">Code</div></h1></th>
			<th><h1><div align="center">ExpDate</div></h1></th>
			</thead>
		</tr>
		<?php while($row = mysqli_fetch_array($result)) :?>
			<tr>
				<thead><tbody>
				<td><div align="center"><?php echo $row['Code']; ?></div></td>
				<td><div align="center"><?php echo $row['ExpDate']; ?></div></td>
				</tbody></thead>
			</tr>	
		<?php endwhile ?>
		</table>
				
		<?php mysqli_close($con);
	?>
</body>
</html>