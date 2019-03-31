<?php include('server.php');
$db = mysqli_connect('localhost', 'root', '', 'bloodbank');
session_start();
if(isset($_SESSION['username'])) {
   $username=$_SESSION['username'];
   
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Update</h2>
  </div>

  <?php
  $user_check_query = "SELECT * FROM donors WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['username'] === $username) {
    


   $email=$user['email'];
   $contact=$user['contact'];
   $location=$user['location'];
   }}


   ?>


 <form method="post" action="update.php">
  	<div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    </div>
    
    

     <div class="input-group">
      <label>Location</label>
      <select name="area" value="<?php echo htmlspecialchars($location); ?>">
    <option value="Dadar">Dadar</option>
    <option value="Matunga">Matunga</option>
    <option value="Mahim">Mahim</option>
    <option value="Bandra">Bandra</option>
  </select>
</div>

  <div class="input-group">
      <label>Contact Number</label>
      <input <input type="text" name="contact"pattern="[789][0-9]{9}" value="<?php echo htmlspecialchars($contact); ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="update">Update</button>
    </div>
    
  </form>
</body>

</html>