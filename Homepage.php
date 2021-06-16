<?php include('registerServer.php') ?>
<html>
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="projectdbms1.css">
  

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
      <a href="viewInstallation.php">Installations</a>
        <div class="dropdown-content">
          <a href="Homepage.php?logout='1'">Logout</a>
        </div>
    </div>
  </header>

  <section class="homepageSection">


    <h3 id="sectionhomeheading">About Us</h3>
    <p class="aboutus">The main motive and objective of this project is to promote and develop a simple and yet an efficient way to interact and store and retrieve the information of your renewable energy
resources,helping the users with the access on various platforms (desktop or mobile) and using various methods (SMS,Email,Voice).This helps the users to access their renewable source from
anywhere remotely and tracking the usage through web based applications.ify you with an alert if there is any malfunctions/abnormality in any of your installations.</p>


    <h3>RENEWABLE ENERGY MONITORING</h3>
    <div class="Content">
      <div>
        <p> Remote renewable energy installations can be monitored and controlled in real-time. With our hosted service and 24/7 support, there is no need for complicated installation of software and drivers. Our enterprise system is fully-featured with powerful trending capabilities, alarm callouts, exports, and much more. With an internet connection to your solar, wind, or geothermal energy controllers,
          This can readily connect and collect data for your installation.</p>
<h3>Features Available : </h3>
<li class="service">Remotely monitor temperature, power output, and more, in real-time</li>

<li class="service">Control your installation remotely, anytime, anywhere</li>

<li class="service">Hosted web-based system allows you to access your data on your desktop or on your mobile device</li>

<li class="service">Powerful trending features such as multi-line plot, zooming, tool-tip labels, and more.</li>
<li class="service">Real-time Voice, SMS, and/or Email alarm callouts</li>

<li class="service">Manage large-scale installations with GPS tracking</li>
      </div>
      
    </div>


    </div>
</div>

  </section>
  <footer>Copyright DBMS Masters 2020 Amrita | All Rights Reserved </footer>
</div>

<script src="project1.js">
  </script>
</body>
</html>
