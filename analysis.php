<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/analysis.css">
        <script type='text/javascript'>
                $.get('nav_staff.php',function(response){ 
                 $('#nav-placeholder').html(response); 
                });
               </script>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

</head>

<body>
<div id="nav-placeholder" class ="sticky-top">
</div>


<?php
$con=mysqli_connect("localhost","root","","hotel_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
$sql = "SELECT RoomType, COUNT(RoomType) AS RoomCount  
        FROM booking b JOIN rooms_book br ON b.BookingID = br.BookingID 
        JOIN room_list r ON br.RoomID = r.RoomID
        WHERE CheckIn > DATE_ADD(CURRENT_DATE(),INTERVAL -1 YEAR) 
        GROUP BY r.RoomType ORDER BY RoomCount DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>

<div class="table-responsive w-50 container">
<p id = 'a01'>Popularity of Room type (One Past Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">RoomType</th>
        <th scope="col" class="col-5">Room Count</th>
</tr></thead>
<tbody>

<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['RoomType']; ?></td>
        <td class="col-5"><?php echo $row['RoomCount']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT MONTHNAME(CheckIn) AS Month, COUNT(*) AS BookingCount
        FROM booking WHERE YEAR(BookTimestamp) = YEAR(CURRENT_DATE) - 1
        GROUP BY Month ORDER BY BookingCount DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a02'>Most popular period of booking (Last Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Month</th>
        <th scope="col" class="col-5">Booking Count</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['Month']; ?></td>
        <td class="col-5"><?php echo $row['BookingCount']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT Date, SUM(TotalGuest) AS TotalGuest
        FROM (SELECT MAKEDATE(YEAR(CURRENT_DATE)-1,1) + INTERVAL date_count-1 DAY AS Date FROM
    (SELECT date_count FROM date_year WHERE date_count <= DAYOFYEAR(CONCAT(YEAR(CURRENT_DATE)-1,'-12-31')))T)TT JOIN booking
        WHERE Date BETWEEN CheckIn AND CheckOut GROUP BY Date ORDER BY TotalGuest DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a03'>Most crowded date of hotel (Last Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Date</th>
        <th scope="col" class="col-5">Total Guest</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['Date']; ?></td>
        <td class="col-5"><?php echo $row['TotalGuest']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT Code,COUNT(Code)*100/a.CodeCount AS CodeRatio
        FROM (SELECT COUNT(*) AS CodeCount FROM code_using)a 
        CROSS JOIN code_using c GROUP BY Code ORDER BY CodeRatio DESC";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a04'>Most popular discount code (Percentage)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Discount code</th>
        <th scope="col" class="col-5">Percentage % of use</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['Code']; ?></td>
        <td class="col-5"><?php echo $row['CodeRatio']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT MONTHNAME(PayedDate) AS PayedMonth, SUM(Price) AS TotalPayed
        FROM expense_account a JOIN expense_item i ON a.ExpenseID = i.ExpenseID
        WHERE YEAR(PayedDate) = YEAR(CURRENT_DATE) - 1 GROUP BY PayedMonth
        ORDER BY TotalPayed DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a05'>Highest spending month (Last Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Payed Month</th>
        <th scope="col" class="col-5">Total Payed</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['PayedMonth']; ?></td>
        <td class="col-5"><?php echo $row['TotalPayed']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT MONTHNAME(CheckIn) AS Month, SUM(TotalPrice) AS TotalPrice
        FROM booking WHERE YEAR(CheckIn) = YEAR(CURRENT_DATE) - 1
        GROUP BY Month ORDER BY TotalPrice DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a06'>Highest income month (Last Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Month</th>
        <th scope="col" class="col-5">Total Price</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['Month']; ?></td>
        <td class="col-5"><?php echo $row['TotalPrice']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT FacilityType, COUNT(f.FacilityID)*100/allcount AS Total
        FROM (SELECT COUNT(*) AS allcount FROM room_facility)a CROSS JOIN room_facility f JOIN facility_type t ON f.FacilityID = t.FacilityID
        GROUP BY FacilityType  ORDER BY Total DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a07'>The popularity of each facility (Percentage)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Facility Type</th>
        <th scope="col" class="col-5">Percentage %</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['FacilityType']; ?></td>
        <td class="col-5"><?php echo $row['Total']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT ExpenseType, AVG(inner_query.ExpenseTotal) AS AverageExpense
        FROM (SELECT ExpenseType, SUM(Price) AS ExpenseTotal, MONTHNAME(PayedDate) AS PayedMonth 
                FROM expense_item i JOIN expense_account a ON a.ExpenseID = i.ExpenseID
                WHERE PayedDate < DATE_ADD(CURRENT_DATE(),INTERVAL -1 YEAR) 
                GROUP BY ExpenseType, PayedMonth) AS inner_query
        GROUP BY ExpenseType ORDER BY AverageExpense DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a08'>The highest paid of expense type (One Past Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Expense Type</th>
        <th scope="col" class="col-5">Average Expense</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['ExpenseType']; ?></td>
        <td class="col-5"><?php echo $row['AverageExpense']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT Date,SUM(TotalCar) AS TotalCar
        FROM (SELECT MAKEDATE(YEAR(CURRENT_DATE)-1,1) + INTERVAL date_count-1 DAY AS Date 
                FROM (SELECT date_count FROM date_year WHERE date_count <= DAYOFYEAR(CONCAT(YEAR(CURRENT_DATE)-1,'-12-31')))T)TT JOIN booking
        WHERE Date BETWEEN CheckIn AND CheckOut GROUP BY Date ORDER BY TotalCar DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>
<div class="table-responsive w-50 container">
<p id = 'a09'>Highest total car of the year (Last Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-5">Date</th>
        <th scope="col" class="col-5">Total Car</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-5"><?php echo $row['Date']; ?></td>
        <td class="col-5"><?php echo $row['TotalCar']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT CONCAT(FirstName,'  ',Lastname) AS Name,Position , Salary 
        FROM staff ORDER BY Salary DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>

<div class="table-responsive w-50 container">
<p id = 'a10'>Ranking of staff's salary</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-4">Name</th>
        <th scope="col" class="col-3">Position</th>
        <th scope="col" class="col-3">Salary</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-4"><?php echo $row['Name']; ?></td>
        <td class="col-3"><?php echo $row['Position']; ?></td>
        <td class="col-3"><?php echo $row['Salary']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php

$sql = "SELECT CONCAT(FirstName,'  ',Lastname) AS Name, COUNT(*) AS BookingCount , SUM(TotalPrice) AS TotalPrice
        FROM booking b JOIN customer c ON b.Username = c.Username WHERE CheckIn > DATE_ADD(CURRENT_DATE(),INTERVAL -1 YEAR)
        GROUP BY b.Username ORDER BY TotalPrice DESC LIMIT 5";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>

<div class="table-responsive w-50 container">
<p id = 'a11'>Highest total spending customer (One Past Year)</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-4">Name</th>
        <th scope="col" class="col-3">Booking Count</th>
        <th scope="col" class="col-3">Total Spending</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-4"><?php echo $row['Name']; ?></td>
        <td class="col-3"><?php echo $row['BookingCount']; ?></td>
        <td class="col-3"><?php echo $row['TotalPrice']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
<div class="text-center text-dark py-2"><h5>&#8226; &#8226; &#8226;</h5></div>


<?php
$sql = "SELECT PaymentMethod, COUNT(PaymentMethod) AS Count, SUM(TotalPrice) AS TotalPrice 
        FROM booking WHERE CheckIn > DATE_ADD(CURRENT_DATE(),INTERVAL -1 YEAR) 
        GROUP BY PaymentMethod ORDER BY Count DESC";
$result = mysqli_query($con,$sql) or die("Bad Query: $sql");
?>

<div class="table-responsive w-50 container">
<p id = 'a12'>Popularity of Payment method</p>
<table class="table table-hover">
<thead ><tr class="d-flex">
        <th scope="col" class="col-2">#</th>
        <th scope="col" class="col-4">Payment Method</th>
        <th scope="col" class="col-3">Count</th>
        <th scope="col" class="col-3">Total</th>
</tr></thead>
<?php  
 $i = 1;
 while ( $row = mysqli_fetch_assoc($result)){
?>
<tr class="d-flex">
        <th scope="row" class="col-2"><?php echo $i; ?></th>
        <td class="col-4"><?php echo $row['PaymentMethod']; ?></td>
        <td class="col-3"><?php echo $row['Count']; ?></td>
        <td class="col-3"><?php echo $row['TotalPrice']; ?></td>
</tr>
<?php $i++; } ?>
<tbody>
</table>
</div>
 </body>