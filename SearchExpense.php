<html>
<head>
    <link rel="stylesheet" href="main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="main.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type='text/javascript'>
        $.get('nav_staff.html', function(response) {
            $('#nav-placeholder').html(response);
        });
    </script>
</head>
<div id="nav-placeholder" class="sticky-top"> </div>
    
<?php
    $con=mysqli_connect("127.0.0.1","root","","hotel_db");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }
    ?>
    <br>
    <center>

        <form action="SearchExpense.php" method="get">
        </span> <span class="red"><b>Search Expense </h1>ExpenseID : </span><input name="txtSearch" type="text">
        <br><input type="submit" class="button1" value="search"></p>
        </form>
    </center>
    <table class="container">
	    
		<tr>
			<th><h1>ExpenseID</h1></th>
			<th><h1>StaffID</h1></th>
			<th><h1>ExpenseItem</h1></th>
            <th><h1>ExpenseType</h1></th>
            <th><h1>Price</h1></th>
            <th><h1>Payed Date</h1></th>
		</tr>
<?php
    if(isset($_GET['txtSearch']) && $_GET['txtSearch'] != "")
    {
        
        $sql = "SELECT StaffID,a.ExpenseID,PayedDate,ExpenseItem,ExpenseType,Price 
        FROM expense_account a, expense_item i 
        WHERE a.ExpenseID = i.ExpenseID AND a.ExpenseID = '".$_GET["txtSearch"]."' ";
        $query=mysqli_query($con,$sql) ;
        
        
        while($data = mysqli_fetch_array($query)) : ?>

            
            <tr>
                <td> <?php echo $data["ExpenseID"];?> </td>
                <td> <?php echo $data["StaffID"];?> </td>
                <td> <?php echo $data["ExpenseItem"];?> </td>
                <td> <?php echo $data["ExpenseType"];?> </td>
                <td> <?php echo $data["Price"];?> </td>
                <td> <?php echo $data["PayedDate"];?> </td>
            </tr>
            
        <?php endwhile ?>
    </table>
    <?php
    }

    //Show All Account
    else
    {

		
        $query=mysqli_query($con,"SELECT StaffID,a.ExpenseID,PayedDate,ExpenseItem,ExpenseType,Price FROM expense_account a, expense_item i 
        WHERE a.ExpenseID=i.ExpenseID");
        
		while ($data = mysqli_fetch_array($query)) : ?>
                
                    <tr>
                        <td><?php echo $data["ExpenseID"];?></td>
                        <td><?php echo $data["StaffID"];?></td>
                        <td> <?php echo $data["ExpenseItem"];?> </td>
                        <td> <?php echo $data["ExpenseType"];?> </td>
                        <td><?php echo $data["Price"];?> </td>
                        <td><?php echo $data["PayedDate"];?> </td>
                    </tr>
                
            <?php endwhile ?>
        </table>
    <?php } ?>
<body>
    
 
</body>
<?php
    mysqli_close($con);
?>
</html>