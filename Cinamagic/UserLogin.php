<?php

session_start();

$username = "";
$email    = "";
$password = "";

$db = mysqli_connect('localhost', 'root', '', 'cinamagic');

if (isset($_POST['submit_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);


  	$query = "SELECT * FROM user WHERE username='$username' AND email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  header('location: index.php');
  	}
  }
?>


<!DOCTYPE html>
<html>
   <head>
    <meta charset = "utf-8">
    <title>Cinamagic - User Login</title>
	<link rel="stylesheet" href="mystyles.css" />
	<style>
		.login{
			margin:30px;
		}
		
		.login-page{
			width: 600px;
			height: 400px;
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
	
	<div class="login-page">   
	<center>
		<div class="text">
			<h1 style="color:#c2b78f;">Log into your Account</h1>
		</div>
	
		<div>
			<form method="post">
			
				<div class="login">
					<label>Username:</label>
						<input type = "text" placeholder="name@domain.com" name="username" required>
				</div>
			
				<div class="login">
					<label>Email:</label>
						<input type = "email" placeholder="name@domain.com" name="email" required>
				</div>
	
				<div class="login">
					<label>Password:</label>
						<input type="password" id="pwd" placeholder = "Password" name="password" required>
				</div>

				<button class="Btn" type="submit" name="submit_user">Log In</button>
				
				<p>Don’t have an account?<a href = "SignUpPage.php">Sing Up Now</a></p>
				
			</form>
		</div>
	</center>
	</div>

	<footer>
		<h3>&copy; 2021 All Rights Reserved. </h3>
		<a href="Index.php"><img class="flogo" src="./imgs/logo.png" alt="logo"/></a>
		<p><strong>Cinamagic</strong> </br> A magical experience </p>
	</footer>
	
   </body>
</html>