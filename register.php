<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>
  
  <form method="post" action="register.php">
    <?php include('error.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>

    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    
     <div class="input-group">
      <label>Blood Group</label>
      <select name="bldgrp">
    <option value="A+">A+</option>
    <option value="B+">B+</option>
    <option value="AB+">AB+</option>
    <option value="O+">O+</option>
    <option value="A-">A-</option>
    <option value="B-">B-</option>
    <option value="AB-">AB-</option>
    <option value="O-">O-</option>
  </select>
  </div>
     <div class="input-group">
      <label>Location</label>
      <select name="area">
    <option value="Dadar">Dadar</option>
    <option value="Matunga">Matunga</option>
    <option value="Mahim">Mahim</option>
    <option value="Bandra">Bandra</option>
  </select>
</div>

  <div class="input-group">
      <label>Contact Number</label>
      <input <input type="text" name="contact"pattern="[789][0-9]{9}">
    </div>
  
  <br><br>
 </div>
    
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>