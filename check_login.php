<?php
session_start();
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$Username = mysqli_real_escape_string($con, $_POST['Username']);
$Password = mysqli_real_escape_string($con, $_POST['Password']);

$query_admin = "SELECT StaffID, Position FROM staff WHERE StaffID = '".$Username."'AND Password = '".$Password."'";
$query_customer = "SELECT Username FROM customer WHERE Username = '".$Username."'AND Password = '".$Password."'";

$result=mysqli_query($con,$query_admin);


  if (mysqli_num_rows($result) > 0)
    {
        echo "Welcome staff";
        $row=mysqli_fetch_assoc($result);
        $_SESSION ["User"] = $Username;
        $_SESSION ["Position"] = $row["Position"];
        header('Location: StaffPart.php');
    }
  else
    {
        $result=mysqli_query($con,$query_customer);
        if (mysqli_num_rows($result) > 0)
          {
          echo "Welcome customer";
          $_SESSION ["User"] = $Username;
          $_SESSION ["customer_login"] = true;
          header('Location: index.php');
          }
        else
          {
          // setting cookie
          $_SESSION ["login_status"] = false;
          header('Location: login.php');
          }
    }
mysqli_close($con);
?>