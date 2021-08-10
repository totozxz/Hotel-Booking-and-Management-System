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

<!-- Page content -->
<div class="w3-content" style="max-width:1532px;">

  <div class="w3-container w3-margin-top" id="rooms">
    <h3>Rooms</h3>
    <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
  </div>
  <!-- Check In Check Out -->
  <div class="w3-row-padding">
    <div class="w3-col m3">
      <label><i class="fa fa-calendar-o"></i> Check In</label>
      <?php echo $_POST["checkIn"]; ?> 
    </div>
    <div class="w3-col m3">
      <label><i class="fa fa-calendar-o"></i> Check Out</label>
      <?php echo $_POST["checkOut"]; ?>
    </div>
  </div>
  
  <!-- php sql for gather information -->
  <?php
    setcookie("checkIn", $_POST["checkIn"], time()+30*24*60*60);
    setcookie("checkOut", $_POST["checkOut"], time()+30*24*60*60);
    setcookie("numberOfGuests", $_POST["numberOfGuests"], time()+30*24*60*60);
    setcookie("numberOfRoom", $_POST["numberOfRoom"], time()+30*24*60*60);
    setcookie("numberOfStd", "", time() - 3600);
    setcookie("numberOfDlx", "", time() - 3600);
    setcookie("numberOfFml", "", time() - 3600);
    $con=mysqli_connect("localhost","root","","hotel_db"); 
    // Check connection 
    if (mysqli_connect_errno()) { 
      echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    } 
    // escape variables for security
    $checkIn = mysqli_real_escape_string($con, $_POST['checkIn']); 
    $checkOut = mysqli_real_escape_string($con, $_POST['checkOut']); 
    $numberOfGuests = mysqli_real_escape_string($con, $_POST['numberOfGuests']); 
    $numberOfRoom = mysqli_real_escape_string($con, $_POST['numberOfRoom']);
    // find rows
    $sql="SELECT RoomType, COUNT(RoomID) as NumAvaRoom
      From room_list 
      Where RoomID Not In    (
                        Select RoomID
                        From rooms_book
                            Join booking
                                On rooms_book.BookingID = booking.BookingID
                        Where CheckIn <= $checkOut
                            And CheckOut >= $checkIn
                        )
      Group By RoomType"; 
    // fetch data
    $result = mysqli_query($con,$sql);
    $resultRow = mysqli_num_rows($result);
    if ($resultRow == 0){
      //Alert that no room Avaliable 
      echo "No Room Avaliable";
    }
    // prepare data
    // There is 3 type of rooms standard, deluxe, family
    $n = 0;
    $numArray = array();
    while ($n < $resultRow){
      $row  = mysqli_fetch_array($result);
      $RoomType = $row[0];
      $NumAva = $row[1];
      if ($RoomType == "Standard") 
      {
        $numArray[0] = $NumAva;
      }
      else if ($RoomType == "Deluxe")
      {
        $numArray[1] = $NumAva;
      }
      else if ($RoomType == "Family")
      {
        $numArray[2] = $NumAva;
      }
      //echo $RoomType,"  ","Number of Avaliable : ",$NumAva,"<br>";
      $n = $n + 1;
    }
    //check error
    if (!mysqli_query($con,$sql)) { 
      die('Error: ' . mysqli_error($con)); 
    }  
    $stdMaxPerson = 0;
    $dlxMaxPerson = 0;
    $fmlMaxPerson = 0;
    $stdPrice = 0;
    $dlxPrice = 0;
    $fmlPrice = 0;
    $sql = "SELECT RoomType, MaxPerson , RoomPrice
      From room_detail"; 
    $result = mysqli_query($con,$sql);
    $resultRow = mysqli_num_rows($result);
    for ($n = 0; $n< $resultRow; $n++){
      $row  = mysqli_fetch_array($result);
      $RoomType = $row[0];
      $MaxPerson = $row[1];
      $RoomPrice = $row[2];
      if ($RoomType == "Standard") 
      {
        $stdMaxPerson = $MaxPerson;
        $stdPrice = $RoomPrice;
      }
      else if ($RoomType == "Deluxe")
      {
        $dlxMaxPerson = $MaxPerson;
        $dlxPrice = $RoomPrice;
      }
      else if ($RoomType == "Family")
      {
        $fmlMaxPerson = $MaxPerson;
        $fmlPrice = $RoomPrice;
      }
    }
    if (!mysqli_query($con,$sql)) { 
      die('Error: ' . mysqli_error($con)); 
    } 

    mysqli_close($con);

    setcookie("stdPrice", $stdPrice, time()+24*60*60); 
    setcookie("dlxPrice", $dlxPrice, time()+24*60*60); 
    setcookie("fmlPrice", $fmlPrice, time()+24*60*60); 
  ?>
  <form action="customerinfo_new.php" method="post">
    <div class="w3-row-padding w3-padding-16">
      <!-- standard room -->
      <div class="w3-third w3-margin-bottom">
        <img src="stdroom.jpg" alt="Norway" style="width:100% ">
        <div class="w3-container w3-white">
          <h3>Standard Room</h3>
          <h6 class="w3-opacity"><?php echo $stdPrice," Bath" ?></h6>
          <p>Single bed</p>
          <p>15m<sup>2</sup></p>
          <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
          <input type="number" name="numberOfStd" min="0" max= "<?php echo $numArray[0] ?>" value="0">
        </div>
      </div>
      <!-- deluxe room -->
      <div class="w3-third w3-margin-bottom">
        <img src="dlxroom.jpg" alt="Norway" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Deluxe Room</h3>
          <h6 class="w3-opacity"><?php echo $dlxPrice," Bath" ?></h6>
          <p>Queen-size bed</p>
          <p>25m<sup>2</sup></p>
          <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
          <input type="number" name="numberOfDlx" min="0" max= "<?php echo $numArray[1] ?>" value="0">
        </div>
      </div>
      <!-- family room -->
      <div class="w3-third w3-margin-bottom">
        <img src="fmlroom.jpg" alt="Norway" style="width:100%">
        <div class="w3-container w3-white">
          <h3>Family Room</h3>
          <h6 class="w3-opacity"><?php echo $fmlPrice," Bath" ?></h6>
          <p>4-Single bed</p>
          <p>40m<sup>2</sup></p>
          <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
          <input type="number" name="numberOfFml" min="0" max= "<?php echo $numArray[2] ?>" value="0">
        </div>
      </div>
      <button class="w3-button w3-block w3-black w3-margin-bottom ">Choose Room</button>
    </div>
  </form>
</div>

</body>
</html>
