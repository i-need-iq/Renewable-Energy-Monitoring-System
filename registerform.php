<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="regstyle.css">
  <style type="text/css">
  .email1{
      width:100%;
  }
  </style>
</head>
<body>
<form action="registerform.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <div class="form">
        <div class="name">
        <label for="">First Name</label>
          <input type="text" name="firstname" placeholder="First Name" >
          <label for="">Last Name</label>
          <input type="text" name="lastname" placeholder="Last Name" >
        </div>
        <label for="">Email</label>
        <div class=email1>
        <input type="email" name="email" placeholder="email" style="padding-bottom:12px" >
        </div>
        
        <label for="">Phone Number</label>
        <div class="phonenumber">
          
         
          <input type="text" name="phnumber" placeholder="Number" >
        </div>




<label for="">Password</label>
        <div class="password">
          <input type="password" name="pwd" placeholder="Password">
         
        </div>


        <button class="submit" name='RegisterClicked'>Create Account</button>
        <!--submit button is created to go to the "action" given in first line-->

        <div class="log">
          <p>Already Registered? <a href="form.php" float="right" class="link">Login</a></p>

        </div>
      </div>
</form> 