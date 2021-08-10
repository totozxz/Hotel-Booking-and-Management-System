<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "project"); 
if(isset($_POST["StaffID"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["Username"]);
 $query = "SELECT * FROM staff WHERE StaffID = '$_POST[StaffID]'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}

if(isset($_POST["Email"]))
{
 $Email = mysqli_real_escape_string($connect, $_POST["Email"]);
 $query = "SELECT * FROM staff WHERE Email = '$_POST[Email]'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}

if(isset($_POST["Phone"]))
{
 $Phone = mysqli_real_escape_string($connect, $_POST["Phone"]);
 $query = "SELECT * FROM staff WHERE Phone = '$_POST[Phone]'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}

if(isset($_POST["CitizenID"]))
{
 $Phone = mysqli_real_escape_string($connect, $_POST["CitizenID"]);
 $query = "SELECT * FROM staff WHERE CitizenID = '$_POST[CitizenID]'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}

if(isset($_POST["Account"]))
{
 $Phone = mysqli_real_escape_string($connect, $_POST["Account"]);
 $query = "SELECT * FROM staff WHERE Account = '$_POST[Account]'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
?>