<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<?php
    include_once("includes/db.php");
    include_once("includes/function.php");
    
    if(isset($_POST['bblogin'])){

        $bbemail = $_POST['bbemail'];         
        $bbpswd = $_POST['bbpswd'];         
    
    
        $query = "SELECT * FROM organization WHERE bbemail = '$bbemail'";   
        
        $select_org_details = mysqli_query($connection,$query);
        confirmQuery($select_org_details);
        
        if($row = mysqli_fetch_assoc($select_org_details)){                        
            $db_email = $row['bbemail'];
            $db_password = $row['bbpswd'];
          
        }else{
            $db_password = "";          
        }
        if($db_email === $bbemail && $db_password === $bbpswd)
        {
            echo "logged in";
            
          header("Location: bloodorg.php");
           // echo "<br>LOGGED IN SUCCESSFULY";
            
            
        }else{
            die("USERNAME OR  PASSWORD IS NOT VALID");
            echo "<br>USERNAME OR PASSWORD IS INVALID!!!";
            header("Location: organization_register.php");
        }
    }
?>
  <div class="header">
  	<h2>Login</h2>
  </div>

  
  <form method="post" action="orglogin.php">
    <div class="content">
  	<div class="input-group">
  		<label>Email Id</label>
  		<input type="email" name="bbemail" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="bbpswd">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="bblogin">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="organization.php">Sign up</a>
  	</p>
    </div>
  </form>

</body>
</html>