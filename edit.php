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

</div>
    <?php
    $con=mysqli_connect("127.0.0.1","root","","hotel_db");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }
?>
<body>
<div id="nav-placeholder" class="sticky-top"> </div>
<link rel="stylesheet" href="main.css">
<table class="container">
	    <thead>
        <tr>
            <th><h1>ExpenseID</h1></th>
			<th><h1>StaffID</h1></th>
			<th><h1>ExpenseItem</h1></th>
            <th><h1>ExpenseType</h1></th>
            <th><h1>Price</h1></th>
            <th><h1>Payed Date</h1></th>
            <th><h1>Edit</h1></th>
            <th><h1>Delete</h1></th>
</tr>
</thead>
<?php
        $sql="SELECT StaffID,a.ExpenseID,PayedDate,ExpenseItem,ExpenseType,Price 
        FROM expense_account a, expense_item i 
        WHERE a.ExpenseID=i.ExpenseID";
        $query=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($query)) 
        { 
?>
            <tbody>
            <tr>
                <td> <?php echo $data["ExpenseID"];?> </td>
                <td> <?php echo $data["StaffID"];?> </td>
                <td> <?php echo $data["ExpenseItem"];?> </td></td>
                <td> <?php echo $data["ExpenseType"];?> </td>
                <td> <?php echo $data["Price"];?> </td>
                <td> <?php echo $data["PayedDate"];?> </td>
                <td><a href="recordedit.php?ExpID=<?php echo $data["ExpenseID"];?>"> Edit </a></td>
                <td><a href="deleterecord.php?ExpID=<?php echo $data["ExpenseID"];?>"> Delete </a></td>
            </tr>
            </tbody>
    
<?php
}
?>
</table>
<br><br>
<?php
mysqli_close($con);
?>
</body>
</html>