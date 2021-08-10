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
		<title>Add Discount</title>
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
	<?php
		if (isset($_GET['Code']) && isset($_GET['Code']) && isset($_GET['Date'])) 
		{
			$Code = mysqli_real_escape_string($con, $_GET['Code']);
			$Date = mysqli_real_escape_string($con, $_GET['Date']);

			$sql = "INSERT INTO discount_code (Code,ExpDate) VALUEs ('$Code','$Date')";

			if(!mysqli_query($con,$sql))
			{
				die('Error:'.mysqli_error($con));
			}
			echo "Added.";
			header('Location: DiscountCode.php');
		mysqli_close($con);
		}
	?>
	<body>
		<form action="AddDiscount.php" method="get">
			<table width="300" border="1" class="container">
				<tr><td>Code : </td><td><input type="text" name="Code"></td></tr>
				<tr><td>ExpDate : </td><td><input type="date" name="Date" min="<?=date('Y-m-d');?>"></td></tr>
			</table>
				
			<table width="300" border="1" class="container">
				<tr><td><div align="center"><input type="submit" value="Add"></div></td></tr>
			</table>	
		</form>
	</body>
</html>