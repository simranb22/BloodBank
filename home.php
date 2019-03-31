<!DOCTYPE html5>
<html lang="en">
<head>
<title>Daedalus</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url(bg.jpg);background-repeat: no-repeat;background-attachment: fixed; background-size: cover;
  overflow-y: hidden;
}

/* Style the header */
header {
  background-color: #666;
  padding: 1px;
  text-align: center;
  font-weight: bold;
  font-size: 45px;
  color: white;
  line-height: 20px;
}

/* Create two columns/boxes that floats next to each other */

/*
article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */


/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}
/* style the navbar*/
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  /*text-align: center;*/
  color: white;
  line-height: 15px;
  width:99%;
 /* margin: auto;
  /*float: bottom;*/
  position: absolute;
  bottom: 0;
  overflow-x: hidden;
}
footer p{display: inline-block;}
.mySlides {
	display:none; 
	align-content: center;

}
/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
.container{
	display: inline;
}
/*.container > div {
  flex: 1; /*grow*/

.emer_search{
	background-color: #bdc1c9; width: 20%; height: 450px; float: right; display: inline-block; 
}
.event{
	background-color: #bdc1c9; width: 20%; height: 450px; display:inline-block; position: fixed;
}
.slides{
	width:500px; float:center; margin-left: 450px; display:inline-block; position:fixed;
}
</style>
</head>
<body>

	<header>
	  <h2>Daedalus BB</h2>
	</header>

	<section>
	 	<ul>
	  	<li><a class="active" href="#home">Home</a></li>
	  	<li><a href="aboutus.php">About us</a></li>
	  	<li><a href="search.php">Search</a></li>
	  	<li><a href="events.php">Events</a></li>
	  	<li><a href="contactus.php">Contact us</a></li>
	  	<li class="navwala"><a class="navbar" href="loginoption.php">Login</a><li>
	  	<li class="navwala"><a  href="regoption.php">Registration</a><li>
	  	</ul>
  	</section>
  	<div class="container">
  		<div class="event">
  			<h3 style="float: center; padding-left: 60px"> Find blood here</h3>
  			<p style="padding-left: 15px;">Select the required blood group</p>
  			<from>
  				<input type="checkbox" name="bloodgrp" value=A+ style="margin-left: 25px;">A+
  				<input type="checkbox" name="bloodgrp" value=B+>B+
  				<input type="checkbox" name="bloodgrp" value=AB+>AB+
  				<input type="checkbox" name="bloodgrp" value=O+>O+
  				<br>
  				<br>
  				<input type="checkbox" name="bloodgrp" value=A- style="margin-left: 25px;"> A-
  				<input type="checkbox" name="bloodgrp" value=B-> B-
  				<input type="checkbox" name="bloodgrp" value=AB-> AB-
  				<input type="checkbox" name="bloodgrp" value=O-> O-
  				<br>
  				<br>
  				<input type="checkbox" name="bloodgrp" value=BB style="margin-left: 25px;"> Bombay blood group
  				<br>
  				<br>
  				<input type="submit" name="addplace" value="Add Place" required style="margin-left: 20px; font-size:15px"><sub>(click this before search)</sub>
  				<br>
  				<br>
  				<input type="button" name="search" value="  Search   " style="margin-left: 20px; font-size:15px; ">

  			</from>
  		</div>
  		<div class="slides">
			<img class="mySlides" src="A.jpg" style="width:100%; height: 450px;">
			<img class="mySlides" src="B.jpg" style="width:100%; height: 450px;">
			<img class="mySlides" src="C.png" style="width:100%; height: 450px;">
			<img class="mySlides" src="D.jpg" style="width:100%; height: 450px;">
			<img class="mySlides" src="E.jpg" style="width:100%; height: 450px;">
		</div>
  		<div class="emer_search">
  			<h3 style="margin-left: 40px; text-align: center;">Upcoming Events</h3>

  		</div>

  	</div>
	

	<footer>
	<p style="text-align: left; padding-left: 10px">Copyright &copy; 2019 Daedalus BB</p>
	<img src="follow.jpg" style="width: 90px; height: 50; float:right; background-color: #777">
	<p style=" float: right ;">Follow us at </p>
	</footer>
	
	<script>
		//for slideshow display
		var myIndex = 0;
		carousel();

		function carousel() {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";  
		  }
		  myIndex++;
		  if (myIndex > x.length) {myIndex = 1}    
		  x[myIndex-1].style.display = "block";  
		  setTimeout(carousel, 3000); // Change image every 2 seconds
		}
	</script>

</body>
</html>
