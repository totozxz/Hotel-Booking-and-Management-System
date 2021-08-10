<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "project"); 
if(isset($_POST["Username"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["Username"]);
 $query = "SELECT * FROM customer WHERE Username = '".$username."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}

if(isset($_POST["Email"]))
{
 $Email = mysqli_real_escape_string($connect, $_POST["Email"]);
 $query = "SELECT * FROM customer WHERE Email = '".$Email."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}

if(isset($_POST["Phone"]))
{
 $Phone = mysqli_real_escape_string($connect, $_POST["Phone"]);
 $query = "SELECT * FROM customer WHERE Phone = '".$Phone."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
?>
