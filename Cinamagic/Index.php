<?php

session_start();

	$conn = new mysqli('localhost', 'root', '', 'cinamagic');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
            
	$sql = "SELECT ID, name, logo FROM item";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <title>Cinamagic - Home</title>
	<link rel="stylesheet" href="mystyles.css" />
	<style>
		.banner{
			position: flex;
			cursor: pointer;
			width: 100%;
			left: 0; right: 0;
		}	
	
		.table{
			margin: 0 auto;
		}
	
		.imgs {
			float: left;
			width: 480px;
			heiht: 600px;
			padding: 20px;
			position:flex;

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
	
	
	<!--Home page code starts here-->
	
	<div>
		<img class="banner" src="./imgs/Brooklynbanner.png" alt="Banner"/>
	
	</div>
	<div class="text">
		<h1>What's On</h1>
	</div>
	
	<table class="table">
		<?php
			$i = 0;
			if ($result->num_rows > 0) {
				while($row = mysqli_fetch_assoc($result))
				{
					if($i%3 == 0) {
						echo"<tr>";
				}
				echo"<td><a href=MovieDetails.php?ID=".$row["ID"]." style='text-decoration: none;'><img src='{$row['logo']}' alt='{$row['name']}'class='imgs'><p class='text' style='text-align: center;'>".$row["name"]."</p></a></td>";
				if($i%3 == 2) {
					echo"</tr>";
				}
				$i++;
				}
			}
		?>
	</table>

	
	<footer>
		<h3>&copy; 2021 All Rights Reserved. </h3>
		<a href="Index.php"><img class="flogo" src="./imgs/logo.png" alt="logo"/></a>
		<p><strong>Cinamagic</strong> </br> A magical experience </p>
	</footer>
  </body>
</html>