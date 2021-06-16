<?php include('registerServer.php'); ?>
<html>
<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="projectdbms1.css">
</head>
<body>

<div class="main">
  <div class="m">
  <h2 id="imgHeading">RENEWABLE ENERGY MONITORING</h2>
  <img src="loginimage.jpg" alt="my image">
  </div>

  <div class="m" id="form">
    <h3 id="h3">Registration Form</h3>

    <form action="registerhtml.php" method="POST">

        <?php include('errors.php'); ?>

      <div class="form">
        <div class="name">
          <input type="text" name="firstname" placeholder="First Name" value=<?php echo $firstname;?>>
          <input type="text" name="lastname" placeholder="Last Name" value=<?php echo $lastname;?>>
        </div>
        <div class="mail">
          <input type="email" name="mail" placeholder="Email Id" value=<?php echo $mail;?>>
        </div>
        <div class="phonenumber">
          <select name="code">  <!--aloows us to choose from a drop down box at the web page-->
            <option value="codei">+91</option>
            <option value="codeA">+71</option>
          </select>
          <input type="text" name="phnumber" placeholder="Number" value=<?php echo $phnumber;?>>
        </div>


        <div>
          <input type="date" name="dob" placeholder="Date Of Birth" value=<?php echo $dob;?>>
        </div>


        <div class="password">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="confirmpwd" placeholder="Confirm Password">
        </div>


        <button class="submit" name='RegisterClicked'>Create Account</button>
        <!--submit button is created to go to the "action" given in first line-->

        <div class="log">
          <p>Already Registered? <a href="login.php" float="right" class="link">Login</a></p>

        </div>
      </div>
      </form>

  </div>
</div>


<script src="project1.js">
  </script>
</body>
</html>
