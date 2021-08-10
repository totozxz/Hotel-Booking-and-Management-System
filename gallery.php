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
        <h1 class="jumbotron-heading text-dark">GALLERY</h1>
    </div>
</section>
<div class="container-fluid page-top">
        <div class="row mx-5">
            
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v02.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v01.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v02.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v02.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v03.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v03.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v04.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v04.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v05.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v05.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v06.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v06.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v07.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v07.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v08.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v08.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v09.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v09.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v10.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v10.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v11.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v11.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v12.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v12.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v13.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v13.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/v14.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/v14.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r01.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r01.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r02.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r02.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r03.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r03.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r04.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r04.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r05.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r05.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r06.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r06.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r07.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r07.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r08.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r08.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r09.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r09.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="gallery/r10.jpg" class="fancybox" rel="ligthbox">
                    <img  src="gallery/r10.jpg" class="zoom img-fluid "  alt="">
                </a>
            </div>
        </div>
   </div>
</div>