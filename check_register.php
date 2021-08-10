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
$Fname = mysqli_real_escape_string($con, $_POST['Fname']);
$Lname = mysqli_real_escape_string($con, $_POST['Lname']);
$Email = mysqli_real_escape_string($con, $_POST['Email']);
$Phone = mysqli_real_escape_string($con, $_POST['Phone']);


$insert_regis = "INSERT INTO customer (Username, Firstname, Lastname, Email, Phone, Password)
VALUES ('$Username', '$Fname','$Lname', '$Email', '$Phone', '$Password')";

if(mysqli_query($con, $insert_regis)){
  echo "Registration successfully.";
} else{
  echo "ERROR: Cannot Insert data. " . mysqli_error($con);
}

echo "Welcome";
$_SESSION ["User"] = $Username; //การเก็บค่า type จนกว่าเราจะปิด browser
header('Location: index.php');
mysqli_close($con);
?>