<!DOCTYPE HTML5>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
    include_once("includes/db.php");
    include_once("includes/function.php");

    if(isset($_POST['sub1'])){

       $bbname = $_POST['bbname'];
        $bbaddress = $_POST['bbaddress'];
        $regId = $_POST['regId'];
        $bbemail = $_POST['bbemail'];
        $bbcontact = $_POST['bbcontact'];
        $bbpswd = $_POST['bbpswd'];

       if (isset($_POST['hidden1'])) {
         $bblat=$_POST['hidden1'];
        }

      if (isset($_POST['hidden2'])) {
          $bblong=$_POST['hidden2'];
      }

        
      $query = "SELECT * FROM organization WHERE bbemail = '$bbemail'";
        $checkemail = mysqli_query($connection,$query);

        
        if($row  = mysqli_fetch_assoc($checkemail)){
            echo "BLOOD BANK ALREADY EXISTS";
        }else{
                
               $query = "INSERT INTO organization (bbname,bbaddress,regId,bbemail,bbcontact,bbpswd,bblat,bblong) VALUES ('$bbname','$bbaddress','$regId','$bbemail','$bbcontact','$bbpswd','$bblat', '$bblong')";
            
                $insert_organization_query = mysqli_query($connection,$query);
                confirmQuery( $insert_organization_query);
                echo "BLOOD BANK REGISTERED SUCCESSFULLY";
                header("Location: orglogin.php");
            }
    

    
}
?>

<div id="outer">
	<div class="content" id="con">
	  <form method="post" class="form-control" id="addOrganization">
	    <div class="row">
	        <label for="bbname">Blood Bank Name</label>
	        <input type="text" id="bbname" name="bbname" required>
    	</div>

    	<div class="row">
	        <label for="bbaddress">Address</label>
	        <input type="text" id="bbaddress" name="bbaddress" required>
    	</div>

    	<div class="row">
	        <label for="regId">Registration ID</label>
	        <input type="text" id="regId" name="regId" required>
    	</div>

    	<div class="row">
	        <label for="bbemail">Email Id</label>
	        <input type="email" id="bbemail" name="bbemail" required>
    	</div>

    	<div class="row">
	        <label for="bbcontact">Contact</label>
	        <input type="number" id="bbcontact" name="bbcontact" required
	        min="7000000000" data-bv-greaterthan-inclusive="true" data-bv-greaterthan-message="Enter 10 digit contact number"
            max="9999999999" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="Enter 10 digit contact number">
    	</div>

    	<div class="row">
	        <label for="bbpswd">Set Password</label>
	        <input type="password" id="bbpswd" name="bbpswd" required>
    	</div>

    	<div class="row">
	        <input type="button" id="sub" name="sub" value="Add location" onclick="getLocation()">
            <input type="submit" id="sub1" name="sub1">
            <input type="hidden" name="hidden1" id="hidden1">
            <input type="hidden" name="hidden2" id="hidden2">
    	</div>
    </form>

</div>
</div>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  document.getElementById("hidden1").value=position.coords.latitude;
   document.getElementById("hidden2").value=position.coords.longitude;

}
</script>

</body>

</html>





