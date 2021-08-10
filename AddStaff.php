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
		<title>Edit Profile</title>
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

			if (isset($_GET['Password']) && isset($_GET['FirstName']) && isset($_GET['LastName']) && isset($_GET['Position']) && isset($_GET['Gender']) && isset($_GET['Phone']) && isset($_GET['Email']) && isset($_GET['Address']) && isset($_GET['CitizenID']) && isset($_GET['Account']) && isset($_GET['Salary'])) 
			{
				$Password = mysqli_real_escape_string($con, $_GET['Password']);
				$FirstName = mysqli_real_escape_string($con, $_GET['FirstName']);
				$LastName = mysqli_real_escape_string($con, $_GET['LastName']);
				$Position = mysqli_real_escape_string($con, $_GET['Position']);
				$Gender = mysqli_real_escape_string($con, $_GET['Gender']);
				$Phone = mysqli_real_escape_string($con, $_GET['Phone']);
				$Email = mysqli_real_escape_string($con, $_GET['Email']);
				$Address = mysqli_real_escape_string($con, $_GET['Address']);
				$CitizenID = mysqli_real_escape_string($con, $_GET['CitizenID']);
				$Account = mysqli_real_escape_string($con, $_GET['Account']);
				$Salary = mysqli_real_escape_string($con, $_GET['Salary']);

				$GenID = mysqli_query($con,"SELECT * FROM staff WHERE Position = '$_GET[Position]' ORDER BY StaffID DESC LIMIT 1");
				$GotID = mysqli_fetch_array($GenID);
				$BuID = preg_split('/[a-z](?=\\d)|\\d(?=[a-z])/i',$GotID['StaffID']);
				
				if($_GET['Position'] == 'Manager')
				{
					$key = "MN";
				}
				if($_GET['Position'] == 'Maid')
				{
					$key = "MD";
				}
				if($_GET['Position'] == 'Staff')
				{
					$key = "ST";
				}

				$Knum = $BuID[1] + 1;
				if($Knum < 10)
				{
					$num = "0{$Knum}";
				}

				$ID = $key.$num;
				$StaffID = mysqli_real_escape_string($con, $ID);

				$sql = "INSERT INTO staff (StaffID,Position,FirstName,LastName,Gender,Phone,Email,Address,CitizenID,Salary,Account,Password) VALUES ('$StaffID','$Position','$FirstName','$LastName','$Gender','$Phone','$Email','$Address','$CitizenID','$Salary','$Account','$Password')";

				if(!mysqli_query($con,$sql))
				{
					die('Error:'.mysqli_error($con));
				}
				echo "Added.";
				header('Location: AllStaff.php');
				mysqli_close($con);
			}
		?>

		<form action="AddStaff.php" method="get">
			<table width="300" border="1" class="container">
				<tr>
					<td>Password	: </td>
					<td><input type="text" id="Password" name="Password">
					<div id="pass_warn" class="warning"></div></td>
				</tr>					
				<tr>
					<td>FirstName 	: </td>
					<td><input type="text" name="FirstName"></td>
				</tr>
				<tr>
					<td>LastName 	: </td>
					<td><input type="text" name="LastName"></td>
				</tr>		
				<tr>
					<td>Position	: </td>
					<td><input type="radio" name="Position" value="Manager" checked>Manager<br>
					<input type="radio" name="Position" value="Staff" checked>Staff<br>
					<input type="radio" name="Position" value="Maid" checked>Maid<br></td>
				</tr>
				<tr>
					<td>Gender		: </td>
					<td><input type="radio" name="Gender" value="M" checked>Male<br>
					<input type="radio" name="Gender" value="F" checked>Female</td>		
				</tr>
							
				<tr>
					<td>Phone		: </td>
					<td><input type="tel" id="Phone" name="Phone">
						<div id="phone_warn" class="warning"></div></td>
				</tr>
				<tr>
					<td>Email		: </td>
					<td><input type="text" id="Email" name="Email">
					<div id="Email_warn" class="warning"></div></td>
				</tr>
				<tr>
					<td>Address 	: </td>
					<td><input type="text" name="Address"></td>
				</tr>
				<tr>
					<td>CitizenID	: </td>
					<td><input type="text" id="CitizenID" name="CitizenID">
						<div id="citizenID_warn" class="warning"></div></td>	
				</tr>
				<tr>
					<td>Account		: </td>
					<td><input type="text" id="Account" name="Account">
					<div id="account_warn" class="warning"></div></td>
				</tr>		
				<tr>
					<td>Salary		: </td>
					<td><input type="text" name="Salary"></td>
				</tr>			
			</table>

			<table class="container">
				<td><div align="center"><input type="submit" value ="ADD"></div></td>
			</table>
		</form>
	</body>
	<script>
	$(document).ready(function(){
        $('#StaffID').blur(function(){
            var staffID = $(this).val();

            $.ajax({
            url:'check_staff.php',
            method:"POST",
            data:{StaffID:staffID},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#staffID_warn').html('<span class="warning">This staffID has been used</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#staffID_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
                }
            })
   
     });
        $('#Email').blur(function(){
            var Email = $(this).val();

            $.ajax({
            url:'check_staff.php',
            method:"POST",
            data:{Email:Email},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#email_warn').html('<span class="warning">This E-mail has been used</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#email_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
                }
            })
     });
        $('#Phone').blur(function(){
            var Phone = $(this).val();

            $.ajax({
            url:'check_staff.php',
            method:"POST",
            data:{Phone:Phone},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#phone_warn').html('<span class="warning">This phone no. has been used</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#phone_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
                }
            })
        });
           $('#CitizenID').blur(function(){
            var CitizenID = $(this).val();

            $.ajax({
            url:'check_staff.php',
            method:"POST",
            data:{CitizenID:CitizenID},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#citizenID_warn').html('<span class="warning">This citizen no. has been used</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#citizenID_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
                }
            })
          });
           $('#Account').blur(function(){
            var Account = $(this).val();

            $.ajax({
            url:'check_staff.php',
            method:"POST",
            data:{Account:Account},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#account_warn').html('<span class="warning">This account no. has been used</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#account_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
                }
            })
     });
        $('#Password').keyup(function(){
            var Password = $(this).val();

            if(Password.length < 6)
                    {
                    $('#pass_warn').html('<span class="warning">Password must more than 6 characters</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#pass_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
            });
        $("#Confirm_Password,#Password").blur(function(){

            if($(Confirm_Password).val() != $(Password).val())
                    {
                    $('#re_pass_warn').html('<span class="warning">Passwords don\'t match</span>');
                    $('#update').attr("disabled", true);
                    }
                else
                    {
                    $('#re_pass_warn').html('<span class="warning"></span>');
                    $('#update').attr("disabled", false);
                    }
            });
     })
</script>
</html>