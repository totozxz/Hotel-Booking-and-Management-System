<!DOCTYPE html>
<html>
<title>Bill</title>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="nav.css">
    <script type="text/javascript" src="nav.js" defer></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' 
    integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'> 
    <!------ Include the above in your HEAD tag ---------->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <style>
    body {font-family: "Raleway", Arial, Helvetica, sans-serif}
    </style>
    <script type='text/javascript'>
    $.get('nav_customer.php',function(response){ 
        $('#nav-placeholder').html(response);
    });
    </script>
</head>
<body class="w3-light-grey">
<?php ob_start(); ?>
<!-- Navigation Bar -->
<div id="nav-placeholder" class ="sticky-top"></div>
<!-- php setcookie and calculate day-->
<?php
    setcookie("firstname", $_POST["firstname"], time()+24*60*60);
    setcookie("lastname", $_POST["lastname"], time()+24*60*60);
    setcookie("phone", $_POST["phone"], time()+24*60*60);
    setcookie("email", $_POST["email"], time()+24*60*60);
    
    $discount = 0;
    $subTotal = 0;
    $totalCar = 0;
    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format($differenceFormat);
    }
    $checkIn = $_COOKIE["checkIn"];
    $checkOut = $_COOKIE["checkOut"];
    $day = dateDifference($checkIn , $checkOut , $differenceFormat = '%a' );
?>

<!-- billing -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="logo.png">
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p>First name : <?php echo $_POST['firstname']; ?> </p>
                            <p>Last name :<?php echo $_POST['lastname']; ?></p>
                            <p>Phone number : <?php echo $_POST['phone'];?></p>
                            <p>Email Address : <?php echo $_POST['email'];?></p>
                            
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Day</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($_COOKIE["numberOfStd"])  and  $_COOKIE["numberOfStd"] > 0 ) : ?>
                                        <tr>
                                            <td>Standard</td>
                                            <td><?php echo $day; ?></td>
                                            <td><?php echo $_COOKIE["numberOfStd"]; ?></td>
                                            <td><?php echo $_COOKIE["stdPrice"]; ?></td>
                                            <td><?php echo $_COOKIE["stdPrice"]*$_COOKIE["numberOfStd"]*$day ?></td>
                                        </tr>
                                        <?php $subTotal = $subTotal+$_COOKIE["stdPrice"]*$_COOKIE["numberOfStd"]*$day; ?>
                                        <?php for ($x=1; $x<= $_COOKIE['numberOfStd']; $x++)
                                        {
                                            if (isset($_POST["parking$x"]))
                                            {
                                                echo "<tr>
                                                <td>Parking Slot (Standard no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>0</td>
                                                </tr>";
                                                $totalCar = $totalCar +1 ;   
                                            } 
                                            if (isset($_POST["bf$x"]))
                                            {
                                                echo "<tr>
                                                <td>Breakfast Buffet(Standard no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>100</td>
                                                <td>100</td>
                                                </tr>";
                                                $subTotal = $subTotal + 100;
                                                setcookie("bf$x", $_POST["bf$x"], time()+24*60*60);     
                                            }  
                                            if (isset($_POST["exbed$x"]))
                                            {
                                                echo "<tr>
                                                <td>Extra Bed(Standard no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>200</td>
                                                <td>200</td>
                                                </tr>";
                                                $subTotal = $subTotal + 200;
                                                setcookie("exbed$x",$_POST["exbed$x"], time()+24*60*60);
                                            }
                                            if (isset($_POST["car$x"]))
                                            {
                                                echo "<tr>
                                                <td>Car Rent(Standard no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>300</td>
                                                <td>300</td>
                                                </tr>";
                                                $subTotal = $subTotal + 300;
                                                setcookie("car$x", $_POST["car$x"], time()+24*60*60);
                                            }
                                            if (isset($_POST["request$x"]))
                                            {
                                                setcookie("request$x", $_POST["request$x"], time()+24*60*60);
                                            }
                                        }
                                        ?>
                                    <?php endif; ?>  
                                    <?php if (isset($_COOKIE["numberOfDlx"])  and  $_COOKIE["numberOfDlx"] > 0 ) : ?>
                                        <tr>
                                            <td>Deluxe</td>
                                            <td><?php echo $day; ?></td>
                                            <td><?php echo $_COOKIE["numberOfDlx"]; ?></td>
                                            <td><?php echo $_COOKIE["dlxPrice"]; ?></td>
                                            <td><?php echo $_COOKIE["dlxPrice"]*$_COOKIE["numberOfDlx"]*$day ?></td>
                                        </tr>
                                        <?php $subTotal = $subTotal+$_COOKIE["dlxPrice"]*$_COOKIE["numberOfDlx"]*$day; ?>
                                        <?php for ($x=1; $x<= $_COOKIE['numberOfDlx']; $x++)
                                        {
                                            if (isset($_POST["parkingdlx$x"]))
                                            {
                                                echo "<tr>
                                                <td>Parking Slot (Deluxe no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>0</td>
                                                </tr>";
                                                $totalCar = $totalCar +1 ;   
                                            } 
                                            if (isset($_POST["bfdlx$x"]))
                                            {
                                                echo "<tr>
                                                <td>Breakfast Buffet(Deluxe no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>100</td>
                                                <td>100</td>
                                                </tr>";
                                                $subTotal = $subTotal + 100;
                                                setcookie("bfdlx$x", $_POST["bfdlx$x"], time()+24*60*60);     
                                            }  
                                            if (isset($_POST["exbeddlx$x"]))
                                            {
                                                echo "<tr>
                                                <td>Extra Bed(Deluxe no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>200</td>
                                                <td>200</td>
                                                </tr>";
                                                $subTotal = $subTotal + 200;
                                                setcookie("exbeddlx$x",$_POST["exbeddlx$x"], time()+24*60*60);
                                            }
                                            if (isset($_POST["cardlx$x"]))
                                            {
                                                echo "<tr>
                                                <td>Car Rent(Deluxe no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>300</td>
                                                <td>300</td>
                                                </tr>";
                                                $subTotal = $subTotal + 300;
                                                setcookie("cardlx$x", $_POST["cardlx$x"], time()+24*60*60);
                                            }
                                            if (isset($_POST["requestdlx$x"]))
                                            {
                                                setcookie("requestdlx$x", $_POST["requestdlx$x"], time()+24*60*60);
                                            }
                                        }
                                        ?>
                                    <?php endif; ?>  
                                    <?php if (isset($_COOKIE["numberOfFml"])  and  $_COOKIE["numberOfFml"] > 0 ) : ?>
                                        <tr>
                                            <td>Family</td>
                                            <td><?php echo $day; ?></td>
                                            <td><?php echo $_COOKIE["numberOfFml"]; ?></td>
                                            <td><?php echo $_COOKIE["fmlPrice"]; ?></td>
                                            <td><?php echo $_COOKIE["fmlPrice"]*$_COOKIE["numberOfFml"]*$day ?></td>
                                        </tr>
                                        <?php $subTotal = $subTotal+$_COOKIE["fmlPrice"]*$_COOKIE["numberOfFml"]*$day; ?>
                                        <?php for ($x=1; $x<= $_COOKIE['numberOfFml']; $x++)
                                        {
                                            if (isset($_POST["parkingfml$x"]))
                                            {
                                                echo "<tr>
                                                <td>Parking Slot (Family no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>0</td>
                                                </tr>";
                                                $totalCar = $totalCar +1 ;   
                                            } 
                                            if (isset($_POST["bffml$x"]))
                                            {
                                                echo "<tr>
                                                <td>Breakfast Buffet(Family no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>100</td>
                                                <td>100</td>
                                                </tr>";
                                                $subTotal = $subTotal + 100;
                                                setcookie("bffml$x", $_POST["bffml$x"], time()+24*60*60);     
                                            }  
                                            if (isset($_POST["exbedfml$x"]))
                                            {
                                                echo "<tr>
                                                <td>Extra Bed(Family no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>200</td>
                                                <td>200</td>
                                                </tr>";
                                                $subTotal = $subTotal + 200;
                                                setcookie("exbedfml$x",$_POST["exbedfml$x"], time()+24*60*60);
                                            }
                                            if (isset($_POST["carfml$x"]))
                                            {
                                                echo "<tr>
                                                <td>Car Rent(Family no.",$x,")</td>
                                                <td></td>
                                                <td>1</td>
                                                <td>300</td>
                                                <td>300</td>
                                                </tr>";
                                                $subTotal = $subTotal + 300;
                                                setcookie("carfml$x", $_POST["carfml$x"], time()+24*60*60);
                                            }
                                            if (isset($_POST["requestfml$x"]))
                                            {
                                                setcookie("requestfml$x", $_POST["requestfml$x"], time()+24*60*60);
                                            }
                                        }
                                        ?>
                                    <?php endif; ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php 
                    if (isset($_COOKIE["code"])  and  $_COOKIE["code"] == 'valid' and isset($_POST["coupon"]) )
                    {
                        $code = explode('_',$_POST['coupon']);
                        $discount = $code[1];
                        setcookie("code", $_POST['coupon'], time()+24*60*60);
                    }
                    $totalPrice = $subTotal*(100-$discount)/100;  ?>                       
                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2"> Total amount</div>
                            <div class="h2 font-weight-light"><?php echo $totalPrice," bath"; ?></div>
                        </div>
                        <?php 
                        if (isset($_COOKIE["code"])  and  $_COOKIE["code"] == 'valid' and isset($_POST["coupon"]) )
                        {
                            echo "  <div class='py-3 px-5 text-right'>
                                        <div class='mb-2'>Discount</div>
                                        <div class='h2 font-weight-light'>",$discount, "</div>
                                    </div>";
                        }
                        setcookie("subTotal", $subTotal, time()+24*60*60);
                        setcookie("totalCar", $totalCar, time()+24*60*60);
                        setcookie("discount", $discount, time()+24*60*60);
                        setcookie("totalPrice", $totalPrice, time()+24*60*60);
                        ?>     
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light"><?php echo $subTotal," bath"; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="w3-row-padding" id="about">
    <div class="w3-col l4 12">
        <br>
    </div>
    <!-- payment method-->
    <div class="w3-col l8 12">
        <form action="" method="post">
            <h5>Payment Method</h5> 
            <!--choice between bank transfer or credit card-->
            <input type="radio" name="paymethod" onclick="payment(0)" checked> Credit card 
            <input type="radio" name="paymethod" onclick="payment(1)" > Bank transfer 
        </form>
        <!-- credit card-->
        <div class="row" id = "credit">
            <aside class="col-sm-5">
            <article class="card">
            <div class="card-body p-5">
            <form role="form" action="upDB.php" method="post">
                <div class="form-group">
                    <label for="username">Full name (on the card)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="" required="">
                    </div> <!-- input-group.// -->
                </div> <!-- form-group.// -->

                <div class="form-group">
                    <label for="cardNumber">Card number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                        </div>
                        <input type="text" class="form-control" name="cardNumber" required="" placeholder="">
                    </div> <!-- input-group.// -->
                </div> <!-- form-group.// -->

                <div class="row">
                    <div class="col-sm-8">
                    <div class="form-group">
                    <label><span class="hidden-xs">Expiration</span> </label>
                    <div class="form-inline">
                        <select class="form-control" style="width:45%">
                            <option>MM</option>
                            <option>01 - January</option>
                            <option>02 - February</option>
                            <option>03 - March</option>
                        </select>
                        <span style="width:10%; text-align: center"> / </span>
                        <select class="form-control" style="width:45%">
                            <option>YY</option>
                            <option>2018</option>
                            <option>2019</option>
                        </select>
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV </label>
                        <input class="form-control" required="" type="text">
                        </div> <!-- form-group.// -->
                    </div>
                </div> <!-- row.// -->
                <?php ob_end_flush(); ?>
                <button class="subscribe btn btn-primary btn-block" type="submit"> Confirm  </button>
            </form>
            </div> <!-- card-body.// -->
            </article> <!-- card.// -->
            </aside> <!-- col.// -->
        </div>
        <!-- bank transfer--> 
        <div class="row" id = "bank" style="display: none">

            <aside class="col-sm-5">
            <article class="card">
            <div class="card-body p-5">
            <i class="fa fa-university"></i>  Bank Transfer
            <p>Bank accaunt details</p>
            <dl class="param">
            <dt>BANK: </dt>
            <dd> THE WORLD BANK</dd>
            </dl>
            <dl class="param">
            <dt>Accaunt number: </dt>
            <dd> 12345678912345</dd>
            </dl>
            <dl class="param">
            <dt>IBAN: </dt>
            <dd> 123456789</dd>
            </dl>
            <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. </p>
            <form action="upDB.php" method="post">
                <button class="subscribe btn btn-primary btn-block" type="submit" name="paymentMethod" value="Transfer"> Confirm  </button>
            </form>
            </div> <!-- card-body.// -->
            </article> <!-- card.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div><!--middle space-->
    <?php ob_end_flush(); ?>
</div>  
<script>
function payment(x){
  if(x==0) //credit card
  {
    document.getElementById("credit").style.display="block";
    document.getElementById("bank").style.display="none";
  }
  else if (x == 1) // bank
  {
    document.getElementById("credit").style.display="none";
    document.getElementById("bank").style.display="block";
  }
}
</script>
</body>
</html>