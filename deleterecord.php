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
<title>Delete Expense Account</title>
<link rel="stylesheet" href="main.css">
<br><h1><span class="blue"></span><b>Expense Account<span class="blue"></span></h1>
<h2><br><a href="SearchExpense.php" target="_blank">Back to Expense Account</a></h2>
<?php
    $con = mysqli_connect("127.0.0.1","root","","hotel_db");
    $sql = "DELETE FROM expense_account
    WHERE ExpenseID LIKE '".$_GET["ExpID"]."' ";
    $query = mysqli_query($con,$sql) or die(mysqli_error($con));
    if($query)
    {
        ?>
        <center>Deleted</center>
        <?php

    }
    else
    {
        echo "Error Delete [".$sql."]";
    }
    mysqli_close($con);
?>
</body>
</html>
</html>