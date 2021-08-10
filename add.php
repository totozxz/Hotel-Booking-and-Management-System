<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
<link rel="stylesheet" href="nav.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $.get('nav_staff.php',function(response){ 
        $('#nav-placeholder').html(response);
    });
</script>
</head>
<?php
    $con=mysqli_connect("127.0.0.1","root","","hotel_db");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }
?>
<body>
<div id="nav-placeholder" class="sticky-top"> </div>
<link rel="stylesheet" href="main.css">
<?php
    

?>
<link rel="stylesheet" href="main.css">
    <table class="container">
        <tr>
            <th>
                <h1>StaffID</h1>
            </th>
            <th>
                <h1>ExpenseItem</h1>
            </th>
            <th>
                <h1>ExpenseType</h1>
            </th>
            <th>
                <h1>Price</h1>
            </th>
            <th>
                <h1>Payed Date</h1>
            </th>
        </tr>

        <form action="add.php" method="get">
            <tr>
                <td> <input type="text" name="StaffID"> </td>
                <td> <input type="text" name="ExpenseItem"> </td>
                <td> <select name="ExpenseType">
                        <option value="Other" >Other</option>
                        <option value="Utility">Utility</option>
                        <option value="Maintainnance">Maintainnance</option>
                        <option value="Salary">Salary</option>
                        <option value="Food">Food</option></select>
                </td>
                <td> <input type="number" name="Price"> </td>
                <td> <input type="date" name="PayedDate"> </td>
                </tr>
        </table>
        <br>
        <center><input type="submit" class="button1" value="Add"></center>
        </form>
        <?php
    
?>
<?php
    if(isset($_GET['StaffID']) && isset($_GET['ExpenseItem']) && isset($_GET['ExpenseType']) && isset($_GET['Price']) && isset($_GET['PayedDate']) )
    {
        
        $staffId=  mysqli_real_escape_string($con,$_GET['StaffID']); 
        $expenseItem=  mysqli_real_escape_string($con,$_GET['ExpenseItem']);
        $expenseType=  mysqli_real_escape_string($con,$_GET['ExpenseType']);
        $price=  mysqli_real_escape_string($con,$_GET['Price']);
        $payedDate= mysqli_real_escape_string($con,$_GET['PayedDate']);

        $sql3="INSERT INTO expense_account (ExpenseID,PayedDate,StaffID) 
        VALUES (NULL, '$payedDate', '$staffId')";
        $objQ1= mysqli_query($con,$sql3) or die(mysqli_error($con));
        $sql4="SELECT ExpenseID FROM expense_account 
        WHERE PayedDate = '$payedDate' AND StaffID = '$staffId' ORDER BY ExpenseID DESC  LIMIT 1";
        $objQ1= mysqli_query($con,$sql4) or die(mysqli_error($con));
        echo"1";
        $bookingID = mysqli_fetch_array($objQ1);
        $sql6="INSERT INTO expense_item (ExpenseID,ExpenseItem,ExpenseType,Price)
        VALUES ('$bookingID[0]','$expenseItem','$expenseType','$price')";
        
        echo"2";
        $objQ2= mysqli_query($con,$sql6) or die(mysqli_error($con));echo"3";
?>
    
    <h2><a href="SearchExpense.php" target="_blank"><br>Back to Expense Account</a></h2>
    <center>Added!</center>
<?php
    }
    mysqli_close($con);
?>

</html>