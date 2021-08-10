<head>
    <!-- 
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>      
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'> 
    -->
    <!------ Include the above in your HEAD tag ---------->   
        <link rel="stylesheet" href="style/nav.css">
</head>

<body>
<?php session_start(); ?>
<div class="navbar navbar-expand-md navbar-dark mb-4" role="navigation">
    <a class="navbar-brand" href="#">The Continental</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="StaffPart.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="RoomCleaning.php">Room Cleaning</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">                    
                    <li class="dropdown-item" ><a href="Staff.php">Personal Infomaiton</a></li>

                 <?php if ($_SESSION['Position'] == 'Manager') :?> 
                    <li class="dropdown-item" ><a href="AddStaff.php">Add Staff</a></li>
                 <?php endif ?>
                    <li class="dropdown-item" ><a href="AllStaff.php">Staffs List</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Expense Account</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li class="dropdown-item" ><a href="SearchExpense.php">All Expense</a></li>
                    <li class="dropdown-item" ><a href="add.php">Add Expense</a></li>
                    <li class="dropdown-item" ><a href="edit.php">Edit Expense</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false ">Analysis</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown1">
                    <li class="dropdown-item" ><a href="analysis.php"><b>Analysis Report</b></a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a01">Most popular Room type</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a02">Most popular booking period</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a03">Most crowded date</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a04">Most popular discount code</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a05">The month with the highest expense</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a06">The month with the highest income</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a07">Most popularity facility</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a08">The highest expense</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a09">The Highest total car</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a10">Staff's salary rank</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a11">Customer with the highest spending</a></li>
                    <li class="dropdown-item" ><a href="analysis.php#a12">Most popular payment method</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="https://goo.gl/maps/VW5XwcLZrPE2SrT27" target="_blank">
                        <i class='fas fa-map-marked-alt' style='font-size:25px'></i>
                    </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="logout.php">
                <button type="button" class="btn btn-light btn-sm"><i class='fas fa-user-alt pr-2'></i>Logout</button></a>
            </li>
        </ul>
    </div>
</div>
</body>