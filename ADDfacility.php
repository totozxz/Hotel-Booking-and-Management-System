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
		<title>Add Facility</title>
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
		if (isset($_GET['FacilityID']) && isset($_GET['FacilityType']) && isset($_GET['Price'])) 
		{
			$FacilityID = mysqli_real_escape_string($con, $_GET['FacilityID']);
			$FacilityType = mysqli_real_escape_string($con, $_GET['FacilityType']);
			$Price = mysqli_real_escape_string($con, $_GET['Price']);

			$sql = "INSERT INTO facility_type (FacilityID,FacilityType,Price) VALUEs ('$FacilityID','$FacilityType','$Price')";

			if(!mysqli_query($con,$sql))
			{
				die('Error:'.mysqli_error($con));
			}
			echo "Added.";
			header('Location: FacilityType.php');
		mysqli_close($con);
		}
	?>
	<body>
		<?php
			$GenID = mysqli_query($con,"SELECT * FROM facility_type ORDER BY FacilityID DESC LIMIT 1");
			$GotID = mysqli_fetch_array($GenID);
			$BuID = preg_split('/[a-z](?=\\d)|\\d(?=[a-z])/i',$GotID['FacilityID']);
			$num = $BuID[1] + 1;
			if($num < 10)
			{
				$num = "0$num";
			}
			$FacilityID = "F"."$num";
		?>
		<form action="ADDfacility.php" method="get">
			<table width="300" border="1" class="container">
				<tr><td>FacilityID : </td><td><?php echo $FacilityID; ?><input type="hidden" name="FacilityID" value="<?=$FacilityID?>"></td></tr>
				<tr><td>FacilityType : </td><td><input type="text" name="FacilityType"></td></tr>
				<tr><td>Price : </td><td><input type="text" name="Price"></td></tr>
			</table>
				
			<table class="container">
				<tr><td><div align="center"><input type="submit" value="Add"></div></td></tr>
			</table>	
		</form>
	</body>
</html>