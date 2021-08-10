<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<title>The Continental</title>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="nav.css">
    <script type="text/javascript" src="nav.js" defer></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' 
    integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'> 
    <!------ Include the above in your HEAD tag ---------->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <style>
    body {font-family: "Raleway", Arial, Helvetica, sans-serif}
    </style>
    <script type='text/javascript'>
    $.get('nav_customer.php',function(response){ 
        $('#nav-placeholder').html(response);
    });
    </script>
</head>
<body class="w3-light-grey">
<?php ob_start(); ?>
<!-- Navigation Bar -->
<div id="nav-placeholder" class ="sticky-top"></div>
<!-- Booked Room info -->
<form action="billing_new.php" method="post">
    <div class="w3-row-padding w3-padding-16 mx-4"> <!-- white padding  -->
        <!-- standard room -->
        <?php
        if ($_POST["numberOfStd"] > 0) {
            setcookie("numberOfStd", $_POST["numberOfStd"], time()+24*60*60); 
            for ($x = 1; $x <= $_POST['numberOfStd'] ; $x++) {
                //block of room info
                echo    "<div class='w3-third w3-margin-bottom p-2'>
                            <img src='stdroom.jpg' alt='Norway' style='width:100%'>
                            <div class='w3-container w3-white'>
                                <h3>Standard Room No.$x</h3>
                                <h6 class='w3-opacity'>", $_COOKIE['stdPrice']," Bath </h6>
                                <input type='checkbox' name='parking$x' value='Y' checked> Car parking slot(included in a room rate)<br>
                                <input type='checkbox' name='bf$x' value='Y'> Breakfast Buffet (+100 bath)<br>
                                <input type='checkbox' name='exbed$x' value='Y'> Extra Bed (+200 bath)<br>
                                <input type='checkbox' name='car$x' value='Y' > Car Rental Service (+300 bath)<br>
                                Special request:<input type='text' name='request$x'>
                            </div>
                        </div>"; //end block  
            }// end for 
        }?>
        <!-- deluxe room -->
        <?php
        if ($_POST["numberOfDlx"] > 0) {
            setcookie("numberOfDlx", $_POST["numberOfDlx"], time()+24*60*60);
            for ($x = 1; $x <= $_POST['numberOfDlx'] ; $x++) {
                //block of room info
                echo    "<div class='w3-third w3-margin-bottom p-2'>
                            <img src='dlxroom.jpg' alt='Norway' style='width:100%'>
                            <div class='w3-container w3-white'>
                                <h3>Deluxe Room</h3>
                                <h6 class='w3-opacity'>", $_COOKIE['dlxPrice']," Bath </h6>
                                <input type='checkbox' name='parkingdlx$x' value='Y' checked> Car parking slot(included in a room rate)<br>
                                <input type='checkbox' name='bfdlx$x' value='Y'> Breakfast Buffet (+100 bath)<br> 
                                <input type='checkbox' name='exbeddlx$x' value='Y'> Extra Bed (+200 bath)<br>
                                <input type='checkbox' name='cardlx$x' value='Y' > Car Rental Service (+300 bath)<br>
                                Special request: <input type='text' name='requestdlx$x'>
                            </div>
                        </div>"; //end block  
            }// end for
        }?> 
        <!-- family room -->
        <?php
        if ($_POST["numberOfFml"] > 0) {
            setcookie("numberOfFml", $_POST["numberOfFml"], time()+24*60*60);
            for ($x = 1; $x <= $_POST['numberOfFml'] ; $x++)  {
                //block of room info
                echo    "<div class='w3-third w3-margin-bottom p-2'>
                            <img src='fmlroom.jpg' alt='Norway' style='width:100%'>
                            <div class='w3-container w3-white'>
                                <h3>Family Room</h3>
                                <h6 class='w3-opacity'>", $_COOKIE['fmlPrice']," Bath </h6>
                                <input type='checkbox' name='parkingfml$x' value='Y' checked> Car parking slot(included in a room rate)<br>
                                <input type='checkbox' name='bffml$x' value='Y'> Breakfast Buffet (+100 bath)<br> 
                                <input type='checkbox' name='exbedfml$x' value='Y'> Extra Bed (+200 bath)<br>
                                <input type='checkbox' name='carfml$x' value='Y' > Car Rental Service (+300 bath)<br>
                                Special request: <input type='text' name='requestfml$x'>
                            </div>
                        </div>"; //end block  
            }// end for
        }?>
    </div><!-- end white padding  -->
    <!-- form customer information -->
    <div class='form-group mx-4'>
        <div class='col-sm-5'>
            <label for='firstname'> First Name</label>
            <div class='input-group'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-user'></i></span>
                </div>
                <input type='text' class='form-control' name='firstname' placeholder='Your name..' required=''>
            </div> <!-- input-group.// -->

            <label for='lastname'>Last Name</label>
            <div class='input-group'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-user'></i></span>
                </div>
                <input type='text' class='form-control' name='lastname' placeholder='Your last name..' required=''>
            </div> <!-- input-group.// -->

            <label for='cardNumber'>Phone number</label>
            <div class='input-group'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-phone'></i></span>
                </div>
                <input type='text' class='form-control' name='phone' placeholder='08X-XXX-XXXX'>
            </div> <!-- input-group.// -->

            <label for='email'>Email Address</label>
            <div class='input-group'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-user'></i></span>
                </div>
                <input type='email' class='form-control' name='email' placeholder='lotus_suite@hotelmail.com' required=''>
            </div> <!-- input-group.// --> 
            <?php if (isset($_SESSION['user'])) : ?>
            <label for='coupon'>Discount Coupon</label>
            <div class='input-group'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-credit-card'></i></span>
                </div>
                <input type='text' class='form-control' id='Code' name='coupon' placeholder='xxxxxx_xx' >
                <span class='warning'></span>
                <div id='code_not_exist' class='warning'>
                </div>
            </div> <!-- input-group.// -->
            <?php endif; ?>
        </div> <!-- column size.// -->
    </div> <!-- form-group.// -->
    <div class='col-sm-5 mx-4 mb-4'>
    <button class='subscribe btn btn-primary btn-block' type='submit' id= submit> Confirm  </button> 
    </div>
</form>
</body>
</html>    
    
<script>  
//check the registation input
  $(document).ready(function(){
    $('#Code').blur(function(){
    var Code = $(this).val();
      $.ajax({
      url:'check_code.php',
      method:'POST',
      data:{Code:Code},
      success:function(data)
          {
          if(data == '0')
              {
              $('#code_not_exist').html("<span class='warning'>This code doesn\'t exist</span>");
              }
          else
              {
              $('#code_not_exist').html("<span class='warning'>This code is valid</span>");
              }
          }
        });
     })
  });
</script>