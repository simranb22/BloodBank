<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V1</title>
	
	  <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="css/bootstrapValidator.min.css">
   
<!--===============================================================================================-->
</head>
<style>

	.bg {
    /* The image used */
    /*background-image: url("images/contact.jpg");*/
    /* Full height */
    height: 100%; 
    /* Center and scale the image nicely */
    background-color: white;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.col-15 {
    float: left;
    width: 23%;
    margin-top: 6px;
}

.col-35 {
    float: center;
    width: 54%;
    margin-top: 6px;
}
.container {
   background: rgba(0, 0, 0, 0.4); /* Black background with transparency */
   position: top 300px;
    
}


</style>
<body>
  
    <?php
    include_once("includes/db.php");
    include_once("includes/function.php");

    
    if(isset($_POST['contact'])){

        $name = $_POST['name'];
        
        $email = $_POST['email'];
        $subject = $_POST['subject'];
       $message = $_POST['message'];
        
     
                
                $query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
            
                $insert_candidate_query = mysqli_query($connection,$query);
                confirmQuery( $insert_candidate_query);
                header("Location: contactus.php");
                
                
             
             
            }  

?> 
    
<div class ="bg">
	<div class="contact1">
		<div class="container">
			<div class="contact1-pic js-tilt" data-tilt>
				<center><img src="conta.jpg" ></center>
				
			</div>

			<form method="post">
				<div class="row">
				<div class="col-15"></div>

				<div class="wrap-input1 validate-input col-35" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>
			</div>

			<div class="row">
				<div class="col-15"></div>
				<div class="wrap-input1 validate-input col-35" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="text" name="email" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>
			</div>

			<div class="row">

				<div class="col-15"></div>
				<div class="wrap-input1 validate-input col-35" data-validate = "Subject is required">
					<input class="input1" type="text" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>
			</div>

			<div class="row">

				<div class="col-15"></div>
				<div class="wrap-input1 validate-input col-35" data-validate = "Message is required">
					<textarea class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>
			</div>

			<div class="row">

				<div class="col-15"></div>
				<div class="container-contact1-form-btn col-35">
					<button class="contact1-form-btn" name="contact">
						<span>
							Send
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</div>
			</form>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>