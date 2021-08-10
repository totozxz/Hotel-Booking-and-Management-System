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
<center>
<!-- php to database -->
<?php $con=mysqli_connect("localhost","root","","hotel_db"); 
  // Check connection 
  if (mysqli_connect_errno()) { 
      echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
      } 
  // escape variables for security
  if (isset($_POST['cardNumber']))
  {
      $cardNumber = mysqli_real_escape_string($con, $_POST['cardNumber']); 
      $paymentMethod = mysqli_real_escape_string($con, "Credit card"); 
  }
  if (isset($_POST['paymentMethod']))
  {
      $paymentMethod = mysqli_real_escape_string($con, $_POST['paymentMethod']); 
      $cardNumber = mysqli_real_escape_string($con, "0"); 
  }
  // update database into booking table
  $guestname = $_COOKIE["firstname"];
  $numberOfGuests = $_COOKIE["numberOfGuests"];
  $checkIn = $_COOKIE["checkIn"];
  $checkOut = $_COOKIE["checkOut"];
  $totalCar = $_COOKIE["totalCar"];
  $subTotal = $_COOKIE["subTotal"];
  $totalPrice = $_COOKIE["totalPrice"];
  $cancel = "N";
  $username = NULL;
  if (isset( $_SESSION["user"])){
    $username = $_SESSION["user"];
    $sql="INSERT INTO booking (BookingID,GuestName, TotalGuest,TotalCar, BookTimestamp, Username, CheckIn, CheckOut, 
    Cancel, Subtotal, TotalPrice, PaymentMethod,CreditCardNo) 
    VALUES (NULL,'$guestname','$numberOfGuests','$totalCar',CURRENT_TIME(), '$username' ,'$checkIn','$checkOut',
    '$cancel','$subTotal','$totalPrice','$paymentMethod','$cardNumber')"; 
  }
  if($username == NULL)
  {
    $sql="INSERT INTO booking (BookingID,GuestName, TotalGuest,TotalCar, BookTimestamp, Username, CheckIn, CheckOut, 
    Cancel, Subtotal, TotalPrice, PaymentMethod,CreditCardNo) 
    VALUES (NULL,'$guestname','$numberOfGuests','$totalCar',CURRENT_TIME(), NULL ,'$checkIn','$checkOut',
    '$cancel','$subTotal','$totalPrice','$paymentMethod','$cardNumber')"; 
  }

  $result = mysqli_query($con,$sql) or die(mysqli_error($con));
  $sql = "SELECT BookingID 
  FROM booking
  WHERE GuestName = '$guestname'AND
        TotalGuest =  '$numberOfGuests'AND
        TotalCar = '$totalCar'AND
        CheckIn = '$checkIn'AND
        CheckOut = '$checkOut'AND
        Cancel= '$cancel'AND
        Subtotal ='$subTotal'AND
        TotalPrice ='$totalPrice'AND
        PaymentMethod = '$paymentMethod' ";
  $result = mysqli_query($con,$sql)  or die(mysqli_error($con));
  $row  = mysqli_fetch_array($result);
  $bookingID = $row[0];
  //info variables
  $RoomID = 0;
  // update database into rooms_book table
  if (isset($_COOKIE["numberOfStd"]) and  $_COOKIE["numberOfStd"] > 0 ) 
  {
    
    $numberOfStd = $_COOKIE["numberOfStd"];
    $sql="SELECT RoomID
    From room_list 
    Where RoomType = 'Standard' AND
          RoomID Not In    (
                          Select RoomID
                          From rooms_book
                              Join booking
                                  On rooms_book.BookingID = booking.BookingID
                          Where CheckIn <= '$checkOut'
                              And  checkOut >= '$checkIn'
                          )
    LIMIT $numberOfStd "; 
    $resultID = mysqli_query($con,$sql)  or die(mysqli_error($con));
    $x=1;
    while($row=mysqli_fetch_row($resultID)){  
      $sql="INSERT INTO rooms_book (BookingID, RoomID, GuestName) 
      VALUES ('$bookingID', '$row[0]', '$guestname') "; 
      $result = mysqli_query($con,$sql)or die(mysqli_error($con));

      if (isset($_COOKIE["request$x"]))
      {
        $request = $_COOKIE["request$x"];
        $sql="UPDATE rooms_book 
        SET SpecialRequest = '$request'
        WHERE BookingID = '$bookingID' AND
              RoomID = '$row[0]' ";
        $result = mysqli_query($con,$sql);
      }

      if (isset($_COOKIE["bf$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F01') ";
        $result = mysqli_query($con,$sql);

      }

      if (isset($_COOKIE["exbed$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F02') ";
        $result = mysqli_query($con,$sql);

      }

      if (isset($_COOKIE["car$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F03') ";
        $result = mysqli_query($con,$sql);
      }
      $x++;
      
    }
    
  }
  if (isset($_COOKIE["numberOfDlx"]) and  $_COOKIE["numberOfDlx"] > 0 ) 
  {
    
    $numberOfDlx = $_COOKIE["numberOfDlx"];
    $sql="SELECT RoomID
    From room_list 
    Where RoomType = 'Deluxe' AND
          RoomID Not In    (
                          Select RoomID
                          From rooms_book
                              Join booking
                                  On rooms_book.BookingID = booking.BookingID
                          Where CheckIn <= '$checkOut'
                              And  checkOut >= '$checkIn'
                          )
    LIMIT $numberOfDlx "; 
    $resultID = mysqli_query($con,$sql)  or die(mysqli_error($con));
    $x=1;
    while($row=mysqli_fetch_row($resultID)){
      
      
      $sql="INSERT INTO rooms_book (BookingID, RoomID, GuestName) 
      VALUES ('$bookingID', '$row[0]', '$guestname') "; 
      $result = mysqli_query($con,$sql)or die(mysqli_error($con));
      
      if (isset($_COOKIE["requestdlx$x"]))
      {
        $request = $_COOKIE["requestdlx$x"];
        $sql="UPDATE rooms_book 
        SET SpecialRequest = '$request'
        WHERE BookingID = '$bookingID' AND
              RoomID = '$row[0]' ";
        $result = mysqli_query($con,$sql);
      }

      if (isset($_COOKIE["bfdlx$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F01') ";
        $result = mysqli_query($con,$sql);
        
      }

      if (isset($_COOKIE["exbeddlx$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F02') ";
        $result = mysqli_query($con,$sql);
     
      }

      if (isset($_COOKIE["cardlx$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F03') ";
        $result = mysqli_query($con,$sql);
      
      }
      $x++;
      
    }
    
  }
  if (isset($_COOKIE["numberOfFml"]) and  $_COOKIE["numberOfFml"] > 0 ) 
  {
    
    $numberOfFml = $_COOKIE["numberOfFml"];
    $sql="SELECT RoomID
    From room_list 
    Where RoomType = 'Family' AND
          RoomID Not In    (
                          Select RoomID
                          From rooms_book
                              Join booking
                                  On rooms_book.BookingID = booking.BookingID
                          Where CheckIn <= '$checkOut'
                              And  checkOut >= '$checkIn'
                          )
    LIMIT $numberOfFml "; 
    $resultID = mysqli_query($con,$sql)  or die(mysqli_error($con));
    $x=1;
    while($row=mysqli_fetch_row($resultID)){
     
      
      $sql="INSERT INTO rooms_book (BookingID, RoomID, GuestName) 
      VALUES ('$bookingID', '$row[0]', '$guestname') "; 
      $result = mysqli_query($con,$sql)or die(mysqli_error($con));

      if (isset($_COOKIE["requestfml$x"]))
      {
        $request = $_COOKIE["requestfml$x"];
        $sql="UPDATE rooms_book 
        SET SpecialRequest = '$request'
        WHERE BookingID = '$bookingID' AND
              RoomID = '$row[0]' ";
        $result = mysqli_query($con,$sql);
      }

      if (isset($_COOKIE["bffml$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F01') ";
        $result = mysqli_query($con,$sql);
      }

      if (isset($_COOKIE["exbedfml$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F02') ";
        $result = mysqli_query($con,$sql);
      }

      if (isset($_COOKIE["carfml$x"]))
      {
        $sql="INSERT INTO room_facility (BookingID, RoomID, FacilityID) 
        VALUES ('$bookingID', '$row[0]', 'F03') ";
        $result = mysqli_query($con,$sql);
      }
      $x++;
      
    }
    
  }
  //label success
  echo "<h3>Your booking is success.<br>
          Please go back to mainpage.<br>
        </h3>"; 
  mysqli_close($con); 

  //delete all cookie
  if (isset($_COOKIE['numberOfStd']))
  {
  for ($x=1; $x<= $_COOKIE['numberOfStd']; $x++)
  {
    setcookie("bf$x", "", time() - 3600);
    setcookie("exbed$x", "", time() - 3600);
    setcookie("car$x", "", time() - 3600);
  }
  setcookie("numberOfStd", "", time() - 3600);
  }

  if (isset($_COOKIE['numberOfDlx']))
  {
  for ($x=1; $x<= $_COOKIE['numberOfDlx']; $x++)
  {
    setcookie("bfdlx$x", "", time() - 3600);
    setcookie("exbeddlx$x", "", time() - 3600);
    setcookie("cardlx$x", "", time() - 3600);
  }
  setcookie("numberOfDlx", "", time() - 3600);
  }
  if (isset($_COOKIE['numberOfFml']))
  {
  for ($x=1; $x<= $_COOKIE['numberOfFml']; $x++)
  {
    setcookie("bffml$x", "", time() - 3600);
    setcookie("exbedfml$x", "", time() - 3600);
    setcookie("carfml$x", "", time() - 3600);
  }
  setcookie("numberOfFml", "", time() - 3600);
  }

  setcookie("checkIn", "", time() - 3600);
  setcookie("checkOut", "", time() - 3600);
  setcookie("numberOfGuests", "", time() - 3600);
  setcookie("numberOfRoom", "", time() - 3600);
  setcookie("stdPrice", "", time() - 3600);
  setcookie("dlxPrice", "", time() - 3600);
  setcookie("fmlPrice", "", time() - 3600);

  setcookie("request", "", time() - 3600);
  setcookie("code", "", time() - 3600);
  setcookie("firstname", "", time() - 3600);
  setcookie("lastname", "", time() - 3600);
  setcookie("phone", "", time() - 3600);
  setcookie("email", "", time() - 3600);
  setcookie("subTotal", "", time() - 3600);
  setcookie("totalCar", "", time() - 3600);
  setcookie("discount", "", time() - 3600);
  setcookie("totalPrice", "", time() - 3600);

?> 
<a class="nav-link" href="index.php">
    <button type="button" class="btn btn-light btn-sm">Back to Mainpage</button>
</a>
</center>
</body>
</html>




  