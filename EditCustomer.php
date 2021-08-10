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
    		$.get('nav_customer.php',function(response)
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
			$result = mysqli_query($con,"SELECT * FROM customer WHERE Username = '$_SESSION[User]'");

				while($row = mysqli_fetch_array($result)) : ?>
					
					<form action="UpdateDBCustomer.php" method="post">
						 <table width="300" border="1" class="container">
                            <tr>
                                <td>Username    :</td>
                                <td><?php echo $row['Username']; ?></td>
                            </tr>
                            <tr>
                                <td>FirstName   :</td>
                                <td><input type="text" name="FirstName" id="FirstName" value="<?=$row['FirstName']?>"></td>
                            </tr>
                            <tr>
                                <td>LastName    :</td>
                                <td><input type="text" name="LastName" id="LastName" value="<?=$row['LastName']?>"></td>
                            </tr>
                            <tr>
                                <td>Email   :</td>
                                <td><input type="text" name="Email" id="Email" value="<?=$row['Email']?>">
                                <div id="email_warn" class="warning"></div></td>
                            </tr>
                            <tr>
                                <td>Phone   :</td>
                                <td><input type="tel" name="Phone" id="Phone" value="<?=$row['Phone']?>">
                                <div id="phone_warn" class="warning"></div></td>
                            </tr>
                            <tr>
                                <td>Password    :</td>
                                <td><input type="Password" name="Password" id="Password" value="<?=$row['Password']?>">
                                <div id="pass_warn" class="warning"></div></td>
                            </tr>
                            <tr>
                                <td>Re-Enter Password    :</td>
                                <td><input type="Password" name="Confirm_Password" id="Confirm_Password">
                                <div id="re_pass_warn" class="warning"></div></td>
                            </tr>
                        </table>
                        <table class ="container">
                            <tr><td><div align="center"><input type="submit" id="register" value= "Save"></div></td></tr>
                        </table>
                    </form>
						
            
				<?php endwhile ?>

		<?php mysqli_close($con); ?>
	</body>

	<script>  
//check the registation input
    $(document).ready(function(){
        $('#Username').blur(function(){
            var username = $(this).val();

            $.ajax({
            url:'check_regis.php',
            method:"POST",
            data:{Username:username},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#username_warn').html('<span class="warning">This username has been used</span>');
                    $('#register').attr("disabled", true);
                    }
                else
                    {
                    $('#username_warn').html('<span class="warning"></span>');
                    $('#register').attr("disabled", false);
                    }
                }
            })
   
     });
        $('#Email').blur(function(){
            var Email = $(this).val();

            $.ajax({
            url:'check_regis.php',
            method:"POST",
            data:{Email:Email},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#email_warn').html('<span class="warning">This E-mail has been used</span>');
                    $('#register').attr("disabled", true);
                    }
                else
                    {
                    $('#email_warn').html('<span class="warning"></span>');
                    $('#register').attr("disabled", false);
                    }
                }
            })
     });
        $('#Phone').blur(function(){
            var Phone = $(this).val();

            $.ajax({
            url:'check_regis.php',
            method:"POST",
            data:{Phone:Phone},
            success:function(data)
                {
                if(data != '0')
                    {
                    $('#phone_warn').html('<span class="warning">This phone no. has been used</span>');
                    $('#register').attr("disabled", true);
                    }
                else
                    {
                    $('#phone_warn').html('<span class="warning"></span>');
                    $('#register').attr("disabled", false);
                    }
                }
            })
     });
        $('#Password').keyup(function(){
            var Password = $(this).val();

            if(Password.length < 6)
                    {
                    $('#pass_warn').html('<span class="warning">Password must more than 6 characters</span>');
                    $('#register').attr("disabled", true);
                    }
                else
                    {
                    $('#pass_warn').html('<span class="warning"></span>');
                    $('#register').attr("disabled", false);
                    }
            });
        $("#Confirm_Password,#Password").blur(function(){

            if($(Confirm_Password).val() != $(Password).val())
                    {
                    $('#re_pass_warn').html('<span class="warning">Passwords don\'t match</span>');
                    $('#register').attr("disabled", true);
                    }
                else
                    {
                    $('#re_pass_warn').html('<span class="warning"></span>');
                    $('#register').attr("disabled", false);
                    }
            });
     })
</script>
</body>
</html>

