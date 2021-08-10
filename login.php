<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style/login.css">
    <script type="text/javascript" src="script/login.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    
<?php session_start();
?>
<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
    </ul>
    <div class="tab-content">
        <div id="login" style="display: block;">
            <h1>Welcome Back!</h1>
            <form action="check_login.php" method="post">
                <div class="field-wrap">
                    <label>
                        Username<span class="req">*</span>
                    </label>
                    <input type="text" required="" autocomplete="on" name="Username">
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" required="" autocomplete="off" name="Password">
                    <?php 
                        if (isset($_SESSION["login_status"]) && $_SESSION["login_status"] == false) 
                            { echo"<div class = 'text-danger'>Wrong Username or Password, please try again.</div>";}
                        else {$_SESSION["login_status"] = true;
                        }
                    ?>
                </div>
                <button class="button button-block" type="submit">Log In</button> 

            </form>
        </div>
        <div id="signup" style="display: none;">
            <h1>Sign Up for Free</h1>
            <form action="check_register.php" method="post">
                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            First Name<span class="req">*</span>
                        </label>
                        <input type="" required="" autocomplete="on" name="Fname">
                    </div>
                    <div class="field-wrap">
                        <label>
                            Last Name<span class="req">*</span>
                        </label>
                        <input type="text" required="" autocomplete="on" name="Lname">
                    </div>
                </div>
                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" required="" autocomplete="on" name="Email" id="Email">
                </div>
                <div id="email_warn" class="warning"></div>
                <div class="field-wrap">
                    <label>
                        Phone<span class="req">*</span>
                    </label>
                    <input type="tel" required="" autocomplete="on" name="Phone" id="Phone">
                </div>
                <div id="phone_warn" class="warning"></div>
                <div class="field-wrap">
                    <label>
                        Username<span class="req">*</span>
                    </label>
                    <input type="text" required="" autocomplete="on" name="Username" id="Username">
                </div>
                <div id="username_warn" class="warning"></div>
                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" required="" autocomplete="off" name="Password" id="Password">
                </div>
                <div id="pass_warn" class="warning"></div>
                <div class="field-wrap">
                    <label>
                        Re-Enter Password<span class="req">*</span>
                    </label>
                    <input type="password" required="" autocomplete="off" name="Confirm_Password" id="Confirm_Password">
                </div>
                <div id="re_pass_warn" class="warning"></div>
                <button type="submit" class="button button-block" id="register">Get Started</button>
            </form>
        </div>

    </div>
</div>







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