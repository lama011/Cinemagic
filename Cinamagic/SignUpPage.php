<?php

session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'cinamagic');

if (isset($_POST['user_reg'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
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
  	$query = "INSERT INTO user (username, email, password) 
  			  VALUES('$username', '$email', '$password_1')";
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
}

?>


<!DOCTYPE html>
<html>
   <head>
    <meta charset = "utf-8">
    <title>Cinamagic - Sign Up</title>
	<link rel="stylesheet" href="mystyles.css" />
	<style>
		.signup{
			margin:30px;
		}
		
		.signup-page{
			width: 600px;
			height: 470px;
			background-color: #fffcf0;
			text-align: center;
			margin: auto;
			margin-top: 60px;
			padding: 10px;
			box-shadow: 5px 10px 8px #405e66;
		}
	</style>
   </head>
   
   <body>
    <header>
      <a href="Index.php"><img class="logo" src="./imgs/logo.png" alt="logo"/></a>
      <nav class="navbar">
        <ul>
          <li><a href="Index.php">Home</a></li>
          <li><a href="">Discover ⯆</a>
			<ul class="dropdown">
				<li><a href="ShowingNow.php">Showing Now</a></li>
				<li><a href="ComingSoon.html">Coming Soon</a></li>
			</ul>
		  </li>
          <li><a href="AboutUs.html">About us</a></li>
        </ul>
      </nav>
	  <div>
		<a class="ticket" href="Ticket.html"><img src="./imgs/ticket.png" width = "30" height = "30" alt="tickets"/></a>
		<a class="profile" href="LoginPage.html"><img src="./imgs/profile.png" width = "30" height = "30" alt="profile"/></a>
		</div>
    </header>
	
	<div class="signup-page">   
	<center>
		<div class="text">
			<h1 style="color:#c2b78f;">Create Account</h1>
		</div>
		
		<div>
			<form method="post">
				<div class="signup">
					<label>Username:</label>
						<input type="text" size="25" placeholder="Username" name="username" required>
				</div>
			
				<div class="signup">
					<label>Email:</label>
						<input type="email" placeholder="Email Address" name="email" required >
				</div>
    
				<div class="signup">
					<label>Password:</label>
						<input type="password" id="pwd" size="25" placeholder="Password" name="password_1" required >
				</div>

				<div class="signup">
					<label>Confirm Password:</label>
						<input type="password" id="pwd" size="25" placeholder="Confirm Password" name="password_2" required >
				</div>
	
				<div>
					<label>I agree to the terms of use</label>
						<input name="terms" type="checkbox" required >
				</div>
	
				<button class="Btn" type="submit" name="user_reg">Sign up</button>
				
				<p>Already have an account?<a href = "UserLogin.php">Log In</a></p>
				
			</form>
	</center>
	</div>

	<footer>
		<h3>&copy; 2021 All Rights Reserved. </h3>
		<a href="Index.php"><img class="flogo" src="./imgs/logo.png" alt="logo"/></a>
		<p><strong>Cinamagic</strong> </br> A magical experience </p>
	</footer>
	
   </body>
</html>