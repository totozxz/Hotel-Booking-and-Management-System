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

<?php session_start(); ?>
<div class="navbar navbar-expand-md navbar-dark mb-4" role="navigation">
    <a class="navbar-brand" href="#">The Continental</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="Roomdetail.html">RoomDetail</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            
        <li class="nav-item">
        <a class="nav-link" href="https://goo.gl/maps/VW5XwcLZrPE2SrT27" target="_blank"><i class='fas fa-map-marked-alt' style='font-size:25px'></i></a>
            </li>
            <li class="nav-item">
            <?php
            if(isset($_SESSION['customer_login'])){
                if($_SESSION['customer_login'] == true){
                    echo "<a class='nav-link' href='EditCustomer.php'>
                            <button type='button' class='btn btn-sm btn-light'>
                            <i class='fas fa-edit pr-2'></i>Edit Profile</button>
                          </a>";
                }
            }
            ?>
            </li>
            <li class="nav-item">
                <?php 
                if(isset($_SESSION['customer_login'])){
                    if($_SESSION['customer_login'] == true){
                        echo "<a class='nav-link' href='logout.php'>
                                <button type='button' class='btn btn-light btn-sm'>
                                <i class='fas fa-user-alt pr-2'></i>Logout</button>
                              </a>";
                    }
                }
                else{
                    echo "<a class='nav-link' href='login.php'>
                            <button type='button' class='btn btn-light btn-sm'>
                            <i class='fas fa-user-alt pr-2'></i>Login/Register</button>
                          </a>";
                    }
                ?>
            </li>
        </ul>
    </div>
</div>
