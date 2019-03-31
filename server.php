<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'bloodbank');


if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $bldgrp = mysqli_real_escape_string($db, $_POST['bldgrp']);
  $area = mysqli_real_escape_string($db, $_POST['area']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  if (empty($bldgrp)) { array_push($errors, "Blood Group is required"); }
  if (empty($area)) { array_push($area, "Area is required"); }
  if (empty($contact)) { array_push($errors, "Contact No is required"); }
  

  $user_check_query = "SELECT * FROM donors WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

   
  if (count($errors) == 0) {
    $password = md5($password_1);

    $query = "INSERT INTO donors (username, email, password,location,bloodgrp,contact) 
          VALUES('$username', '$email', '$password','$area','$bldgrp','$contact')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}

//LOGIN CODE

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM donors WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//UPDATE

if(isset($_POST['update']))
{
 $username=$_SESSION['username'];  
$email= mysqli_real_escape_string($db, $_POST['email']);
$area = mysqli_real_escape_string($db, $_POST['area']);
$contact = mysqli_real_escape_string($db, $_POST['contact']);


//$query="UPDATE donors SET email='snb@gmail.xom' where username='sim'";
  $query="UPDATE donors SET email='$email',location='$area',contact='$contact' WHERE username='$username'";
  $result = mysqli_query($db, $query);
  
  header('location:index.php');
           
    }


?>
