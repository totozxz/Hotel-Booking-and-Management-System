<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
        <h1 class="jumbotron-heading">CONTACT US</h1>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control" id="name" aria-describedby="phone" placeholder="Enter phone" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>10-11 floor Witsawawatthana Building  </p>
                    <p>10140 Bang Mot, Thung Khru, Bangkok </p>
                    <p>Thailand CPE</p>
                    <p>Email : hotel.cpe@mail.kmutt.ac.th</p>
                    <p>Tel: +66 92-8651347</p>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-full pt-3">
<div class="row">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3877.127069851768!2d100.4941855!3d13.6500334!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb5f69b03ef7ef07!2z4Lig4Liy4LiE4Lin4Li04LiK4Liy4Lin4Li04Lio4Lin4LiB4Lij4Lij4Lih4LiE4Lit4Lih4Lie4Li04Lin4LmA4LiV4Lit4Lij4LmMIOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC5gOC4l-C4hOC5guC4meC5guC4peC4ouC4teC4nuC4o-C4sOC4iOC4reC4oeC5gOC4geC4peC5ieC4suC4mOC4meC4muC4uOC4o-C4tQ!5e0!3m2!1sth!2sth!4v1559115744121!5m2!1sth!2sth" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
 </div>
</body>