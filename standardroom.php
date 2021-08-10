<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/gallery.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="script/gallery.js" defer></script>
    <script type='text/javascript'>
                $.get('nav_customer.php',function(response){ 
                 $('#nav-placeholder').html(response); 
                });
               </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

</head>

<body>
<?php 
session_start();
?>
<div class="sticky-top" id="nav-placeholder"></div>
<section class="jumbotron text-center py-2">
    <div class="container">
        <h1 class="jumbotron-heading text-dark">Standard Room</h1>
    </div>
</section>
<div class="container-fluid page-top">
        <div class="row mx-5">
            
            <div class="col-4 thumb">
                <a href="standard1.jpg" class="fancybox" rel="ligthbox">
                    <img  src="standard1.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-4 thumb">
                <a href="standard3.jpg" class="fancybox" rel="ligthbox">
                    <img  src="standard3.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-4 thumb">
                <a href="standard2.jpg" class="fancybox" rel="ligthbox">
                    <img  src="standard2.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            

        </div>
   </div>
</div>