<?php include('registerServer.php'); ?>
<html>
  <head>
    <title>Insatllations</title>
    <link rel="stylesheet" type="text/css" href="projectdbms1.css">
    <link rel="stylesheet" type="text/css" href="installationss.css">

    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       html {
  scroll-behavior: smooth;
}
    </style>
  </head>
  <body>
    <div class="homepage">
      <header>

        <img src="homepage.png" alt="my image" class="headerImg">
        <?php if(isset($_SESSION['success'])): ?>
          <?php unset($_SESSION['success']);?>
        <?php endif ?>
        <div class="navbar">
          <a href="Homepage.php">Home</a>
          <a href="#">Installations</a>
          <div class="dropdown">
            <div class="dropdown-content">
              <a href="Homepage.php?logout='1'">Logout</a>
            </div>
          </div>
        </div>
      </header>
      <section class="homepageSection">
      <!--  <div class="map_container">-->

         <form action="installations.php" method="POST"><!---->

           <div class="installationform"> 
              <center><h2>INSTALLATION DETAILS</h2></center>
              <?php include('errors.php'); ?>

              <div class="InstallationType">
                <strong><label>Type Of Installation</label></strong>
                <select id="selectBox" onchange="onselecttype()" name="typeSelect">  <!--aloows us to choose from a drop down box at the web page-->
                  <option value="Solar">Solar</option>
                  <option value="Wind" >Wind</option>
                  <option value="GeoThermal">Geothermal</option>
                </select>
              </div>
            <!--submit button is created to go to the "action" given in first line-->


</div>
            </form>
            <div class="viewinstallation">
              <center><h2>VIEW DETAILS</h2></center>
              <?php include('viewInstallation.php') ?>

            </div>


          <!--form ends-->
      </section>
  </body>
  <script src="project1.js"></script>
  <script src="installations.js"></script>

</html>
