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
			if(isset($_POST['StaffID']))
			{
				$ID = $_POST['StaffID'];
			}
			else
			{
				$ID = $_SESSION['User'];
			}
			
			$result = mysqli_query($con,"SELECT * FROM staff WHERE staffID = '$ID'");

				while($row = mysqli_fetch_array($result)) : ?>
			
					<form action="UpdateDBStaff.php" method="post">
						<table width="300" border="1" class="container">
							<tr>
								<td>StaffID 	: </td>
								<td><?php echo $ID;?><input type="hidden" name="StaffID" value="<?=$ID;?>"></td>
							</tr>
							<tr>
								<td>FirstName 	: </td>
								<td><input type="text" name="FirstName" value="<?=$row['FirstName'];?>"></td>
							</tr>
							<tr>
								<td>LastName 	: </td>
								<td><input type="text" name="LastName" value="<?=$row['LastName'];?>"></td>
							</tr>
							<tr>
								<td>Position	: </td>
								<td><?php echo $row['Position'];?><input type="hidden" name="Position" value="<?=$row['Position'];?>"></td>
							</tr>
							<tr>
								<td>Gender		: </td>
								<td><?php echo $row['Gender'];?><input type="hidden" name="Gender" value="<?=$row['Gender'];?>"></td>	
							</tr>
							<tr>
								<td>Phone		: </td>
								<td><input type="tel" name="Phone" id="Phone" value="<?=$row['Phone'];?>">
								<div id="phone_warn" class="warning"></div></td>
							</tr>
							<tr>
								<td>Email		: </td>
								<td><input type="text" name="Email" id="Email" value="<?=$row['Email'];?>">
								<div id="Email_warn" class="warning"></div</td>
							</tr>
							<tr>
								<td>Address 	: </td>
								<td><input type="text" name="Address" value="<?=$row['Address'];?>"></td>
							</tr>
							<tr>
								<td>CitizenID	: </td>
								<td><?php echo $row['CitizenID'];?><input type="hidden" name="CitizenID" value="<?=$row['CitizenID'];?>"></td></td>	
							</tr>
							<tr>
								<td>Account		: </td>
								<td><input type="text" name="Account" id="Account" value="<?=$row['Account'];?>">
									<div id="account_warn" class="warning"></div></td>
							</tr>
							<?php if ($_SESSION['Position'] == 'Manager' && $row['Position'] != 'Manager') :?>
								<tr>
									<td>Salary		: </td>
									<td><input type="text" name="Salary" value="<?=$row['Salary'];?>"></td>
								</tr>
							<?php endif ?>
							<?php if ($_SESSION['Position'] == 'Maid' || $_SESSION['Position'] == 'Staff' || ($_SESSION['Position'] == 'Manager' && $row['Position'] == 'Manager')) :?></td>
								<tr>
									<td>Salary		: </td>
									<td><?php echo $row['Salary'];?><input type="hidden" name="Salary" value="<?=$row['Salary'];?>"></td>
								</tr>
							<?php endif ?>
							<?php if($_SESSION['Position'] != 'Manager' || $row['Position'] == 'Manager') : ?>
							<tr>
								<td>Password	: </td>
								<td><input type="Password" name="Password" id="Password" value="<?=$row['Password'];?>">
								<div id="pass_warn" class="warning"></div></td>
							</tr>
							<tr>
								<td>Confirm Password	: </td>
								<td><input type="Password" id="Confirm_Password" name="Confirm_Password">
								<div id="re_pass_warn" class="warning"></div></td>
							</tr>
							<?php endif ?>
						</table>
						<table class ="container">
							<tr><td><div align="center"><input type="submit" id="update" value= "Save"></div></td></tr>
						</table>
					</form>
				<?php endwhile ?>
		<?php mysqli_close($con); ?>
	</body>
	<script>  
//check the registation input
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