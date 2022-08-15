<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'cinamagic');

$sql = "SELECT * FROM item";
$result = mysqli_query($db, $sql);
?>


<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <title>Cinamagic - Showing Now</title>
	<link rel="stylesheet" href="mystyles.css" />
	<style>

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
	
	
	<!--Showing now page cose starts here-->
	
	<div class="text">
		<h1>Discover Showing now</h1>
	</div>

	<center>
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
	</center>
	
	<footer>
		<h3>&copy; 2021 All Rights Reserved. </h3>
		<a href="Index.php"><img class="flogo" src="./imgs/logo.png" alt="logo"/></a>
		<p><strong>Cinamagic</strong> </br> A magical experience </p>
	</footer>
  </body>
</html>