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
    <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
    </style>
    <script type='text/javascript'>
        $.get('nav_customer.php',function(response){ 
            $('#nav-placeholder').html(response);
        });
    </script>
</head>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div id="nav-placeholder" class ="sticky-top"></div>
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
    <img class="w3-image" src="hotel.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
    <div class="w3-display-left w3-padding w3-col l6 m8">
      <div class="w3-container" style ="background-color: coral">
        <h2><i class="fa fa-bed w3-margin-right"></i>The Continental</h2>
      </div>
      <div class="w3-container w3-white w3-padding-16">
        <form action="booking.php" method = 'post'>
          <div class="w3-row-padding" style="margin:0 -16px;">
            <div class="w3-half w3-margin-bottom">
              <label><i class="fa fa-calendar-o"></i> Check In</label>
              <input class="w3-input w3-border" type="date" name="checkIn" min ="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="w3-half">
              <label><i class="fa fa-calendar-o"></i> Check Out</label>
              <input class="w3-input w3-border" type="date" name="checkOut" min ="<?php echo date('Y-m-d', time()+86400) ?>" value="<?php echo date('Y-m-d', time()+86400) ?>" required>
            </div>
          </div>
          <div class="w3-row-padding" style="margin:8px -16px;">
            <div class="w3-half w3-margin-bottom">
              <label><i class="fa fa-male"></i> Number of Guest</label>
              <input class="w3-input w3-border" type="number" value="1" name="numberOfGuests" min="1" value='1' required>
            </div>
            <div class="w3-half">
              <label><i class="fa fa-room"></i> Number of Room</label>
              <input class="w3-input w3-border" type="number" value="1" name="numberOfRoom" min="1" value='1' required>
            </div>
          </div>
          <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
        </form>
      </div>
    </div>
</header>
</body>
</html>
