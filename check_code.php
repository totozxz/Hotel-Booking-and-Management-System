<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "hotel_db"); 
if(isset($_POST["Code"]))
{
 $Code = mysqli_real_escape_string($connect, $_POST["Code"]);
 $query = "SELECT Code FROM discount_code WHERE Code = '".$Code."' AND ExpDate <= CURRENT_DATE()" ;
 $result = mysqli_query($connect, $query);
 
 if (mysqli_num_rows($result)>0)
 {
    setcookie("code", 'valid', time()+24*60*60);
 }
 else if (mysqli_num_rows($result) == 0)
 {
    setcookie("code", 'invalid', time()+24*60*60);
 }
 echo mysqli_num_rows($result);
}
?>