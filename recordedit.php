<html>
<head>
    <link rel="stylesheet" href="main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
    <link rel="stylesheet" href="nav.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type='text/javascript'>
        $.get('nav_staff.html', function(response) {
            $('#nav-placeholder').html(response);
        });
    </script>
</head>

<body>
<div id="nav-placeholder" class="sticky-top"> </div>
<link rel="stylesheet" href="main.css">
<form action="saveedit.php?ExpID=<?php echo$_GET["ExpID"];?> " name="frmEdit" method="post">
<?php
    $expEdit = $_GET["ExpID"];
    $con=mysqli_connect("127.0.0.1","root","","hotel_db");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }

?>
        <input type="hidden" name="ExpID" value="<?=$expEdit?>">
        <table class="container">
	    <thead>
		<tr>
			<th><h1>ExpenseID</h1></th>
			<th><h1>StaffID</h1></th>
			<th><h1>ExpenseItem</h1></th>
            <th><h1>ExpenseType</h1></th>
            <th><h1>Price</h1></th>
            <th><h1>Payed Date</h1></th>
            <th><h1></h1></th>
		</tr>
        </thead>
            <?php
        $sql="SELECT a.ExpenseID, a.PayedDate, a.StaffID, i.ExpenseItem,i.ExpenseType,i.Price 
        FROM expense_account a, expense_item i 
        WHERE a.ExpenseID=i.ExpenseID AND a.ExpenseID LIKE '$expEdit' ";
        $query = mysqli_query($con,$sql);
        $objResult = mysqli_fetch_array($query);    
    ?>  
    <tbody>
    <tr>
    <td> <?php echo $objResult["ExpenseID"];?> </td>
    <td><input type="text" name="txtStaffID" size="8" value=" <?php echo $objResult["StaffID"];?>"> </td>
    <td><input type="text" name="txtExpenseItem" size="32" value=" <?php echo $objResult["ExpenseItem"];?> "> </td>
    <td><select name="txtExpenseType" value=" <?php echo $objResult["ExpenseType"];?> "> </div>
        <option value="Other" >Other</option>
        <option value="Utility">Utility</option>
        <option value="Maintainnance">Maintainnance</option>
        <option value="Salary">Salary</option>
        <option value="Food">Food</option></select>
    </td>
    <td><input type="text" name="txtPrice" size="10" value=" <?php echo $objResult["Price"];?> "> </td>
    <td><input type="date" name="txtPayedDate" value=" <?php echo $objResult["PayedDate"];?> "> </td>
    
    </tr>
</tbody>
    </table>
    <center><input type="submit" class="red" name="submit" value="submit"></center>
    </form>
<?php
mysqli_close($con);
?>

</body>
</html>