<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="logform.css">
</head>
<body>
<form action="form.php" method="post">
  

  <div class="container">
    <label for="mid"><b>Manager ID</b></label>
    <br><input type="integer" placeholder="Enter Manager ID" name="mid" required>

    <br><label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" id="submitLogin" name="managerlogin">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
  <div class="log">
          <p>New Manager ?<a href="registerform.php" float="right" class="link1">Register</a></p>
    </div>
</form> 