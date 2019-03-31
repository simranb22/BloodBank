<!DOCTYPE HTML5>
<html>
<style>
</style>
<body>
<table class="table table-bordered table-hover table-responsive" width="100%">
                        
                   
                       
                       <!--FOR THE NORMAL COLUMNS TO BE DISPLAYED-->
                        <tr>
                          
                            <th>Blood Bank Name</th>
                            <th>Email Id</th>
                            <th>Contact</th>
                            <th>Address</th>
                            
                    
                        </tr>
                    <tbody>
		<?php
			include_once("includes/db.php");
			include_once("includes/function.php");

			$query="SELECT * FROM organization";
		    $min_dist=6371000;

		    if(isset($_POST['sub1'])){
		 
				$total_organization = mysqli_query($connection, $query);
			    confirmQuery( $total_organization);
			    $total_queries = mysqli_num_rows($total_organization);
			    $bbname="";

			    $arr = array();
				while($row = mysqli_fetch_assoc($total_organization)){   

						if (isset($_POST['hidden1'])) {
			         $bblat1=$_POST['hidden1'];
			        }

			      if (isset($_POST['hidden2'])) {
			          $bblong1=$_POST['hidden2'];
			      }       
				     $bblat2=$row['bblat'];
				     $bblong2=$row['bblong'];

			            $dist=haversineGreatCircleDistance((double)$bblat1,(double)$bblong1, (double)$bblat2, (double)$bblong2);
			                if($bblat2<=$bblat1+1.0 and $bblong2<=$bblong1+1.0){
			                	
			                	$bbid = $row['bbid'];
			                	
				                $arr[$bbid]=$dist;
			                }

			    }

			asort($arr);
			$count=0;

			 foreach($arr as $x => $x_value) {
			    
			    if($count<5){
			 	$query="SELECT * FROM organization WHERE bbid='$x'";
			 	$con=mysqli_query($connection, $query);
			 	$query1="SELECT * FROM bloodgroups WHERE bbid='$x'";
			 	$con1=mysqli_query($connection,$query1);
			 	$row = mysqli_fetch_assoc($con);
			 	$row1=mysqli_fetch_assoc($con1);

			 	$bbname = $row['bbname'];
				$bbaddress = $row['bbaddress'];
				$bbcontact = $row['bbcontact'];
				$bbemail = $row['bbemail'];

				$bdgrp = $_POST['bgrp'];

				if($row1[$bdgrp]>0)
				{
			     echo "<tr>";                                        
                    echo "<td>$bbname</td>";
                    echo "<td>$bbaddress</td>";
                    echo "<td>$bbcontact</td>";
                    echo "<td>$bbemail</td>";

                echo "</tr>";
                $count=$count+1;
            }
            }
			}
			}
		   
		    ?>

    <?php

   function haversineGreatCircleDistance(
	  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
	{
	  $latFrom = deg2rad($latitudeFrom);
	  $lonFrom = deg2rad($longitudeFrom);
	  $latTo = deg2rad($latitudeTo);
	  $lonTo = deg2rad($longitudeTo);

	  $latDelta = $latTo - $latFrom;
	  $lonDelta = $lonTo - $lonFrom;

	  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
	    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	  return $angle * $earthRadius;
	}
?>

<div>
	<form action="distance.php" method="post">
		<select name="bgrp">
			<option>A+</option>
			<option>A-</option>
			<option>B+</option>
			<option>B-</option>
			<option>AB+</option>
			<option>AB-</option>
			<option>O+</option>
			<option>O-</option>
			<option>Oh</option>
		</select>
	<input type="button" id="sub" name="sub" value="Add location" onclick="getLocation()">
            <input type="submit" id="sub1" name="sub1">
            <input type="hidden" name="hidden1" id="hidden1">
            <input type="hidden" name="hidden2" id="hidden2">
    <p id="demo"></p>
</form>
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