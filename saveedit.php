<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
<link rel="stylesheet" href="nav.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $.get('nav_staff.html',function(response){ 
        $('#nav-placeholder').html(response);
    });
</script>
</head>

<body>
<div id="nav-placeholder" class="sticky-top"> </div>
<link rel="stylesheet" href="main.css">
<h2><br><a href="SearchExpense.php" target="_blank">Back to Expense Account</a></h2>


<?php
$con = mysqli_connect("127.0.0.1","root","","hotel_db");
    $sql = " UPDATE expense_account SET 
    ExpenseID = '".$_POST["txtExpenseID"]."'
    ,StaffID = '".$_POST["txtStaffID"]."'
    ,PayedDate = '".$_POST["txtPayedDate"]."'
    WHERE ExpenseID = '".$_POST["ExpID"]."' ";

    $sql2 = " UPDATE expense_item SET 
    ExpenseID = '".$_POST["txtExpenseID"]."'
    ,ExpenseItem = '".$_POST["txtExpenseItem"]."'
    ,ExpenseType = '".$_POST["txtExpenseType"]."'
    ,Price = '".$_POST["txtPrice"]."'
    WHERE ExpenseID = '".$_POST["ExpID"]."' ";
    $query1 = mysqli_query($con,$sql) or die(mysqli_error($con));
    $query2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
    if($query1!=0 && $query2!=0)
{
?>
    <center>Save Done1</center>
<?php
}
else
{
echo "Error Save [".$sql."]";
}
mysqli_close($con);
?>
</body>
</html>