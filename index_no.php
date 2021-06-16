<?php 
session_start();
include('includes/config.php');
//  include('signup.php');
    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Renewable Energy Monitoring System | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">


  </head>

  <body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <!-- <div class="container"> -->


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <div class=container>
<h1>Features : </h1>
<h4>• Remotely monitor temperature, power output, and more, in real-time.</h4>
<h4>• Control your installation remotely, anytime, anywhere.</h4>       
<h4>• Hosted web-based system allows you to access your data on your desktop or on your mobile device.</h4>
<h4>• Real-time Voice, SMS, and/or Email alarm callouts.</h4>      
<h4>• Manage large-scale installations with GPS tracking.</h4>

<h1>Plants Supported : </h1>
<h4>1. Wind Plant</h4>
<h4>2. Solar Plant</h4>
<h4>3. Geothermal Plant</h4>

</div>
    
        </div>
        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>

</html>
