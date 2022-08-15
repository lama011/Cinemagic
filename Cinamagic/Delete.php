<?php

   session_start();
   $db = mysqli_connect('localhost', 'root', '', 'cinamagic');

	if (isset($_POST['delete_btn'])){
		
		$item_ID= $_POST['itemDelete_ID'];

		$query = "DELETE FROM item WHERE ID='$item_ID'";
		mysqli_query($db, $query);
	}
		$result=mysqli_query($db,"select * from item ");
		
	if (isset($_POST['save'])) {
		
		header('location: ControlPage.html');
	}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Cinamagic - Delete Movie</title>
	<link rel="stylesheet" href="mystyles.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		table, th, td {
			border:1px solid black;
			text-align: center;
			background-color: #fffcf0;
		}
		
		.delete-btn {
			background-color: #fffcf0;
			border-color: #f5c92a;
			border-radius:25px;
			color: #f5c92a;
			padding: 12px 16px;
			font-size: 19px;
			cursor: pointer;
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

		<div class="text" style="margin:20px;">
			<h2>Delete a movie</h2>
		</div>

		<form method="post">
			<center>
			<table style="width:80%">
				<tr>
					<th>Movie name</th>
					<th>Release date</th>
					<th>ID</th>
					<th>Delete</th>
				</tr>
					<?php while($row=mysqli_fetch_assoc($result)){?>
				<tr>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['date'] ?></td>
					<td><?php echo $row['ID'] ?></td>
					<td>
						<form method="post">
							<input type="hidden" name="itemDelete_ID" value="<?php echo $row['ID'] ?>">
							<button type="submit" name="delete_btn" class="delete-btn"><i class="fa fa-trash"></i></button>
						</form>
					</td>
				</tr>
 	<?php }?>
			</table>
			
			<button class="Btn" name="save">Save changes</button>
		
			</center>
		</form>
		
	<footer>
		<h3>&copy; 2021 All Rights Reserved. </h3>
		<a href="Index.php"><img class="flogo" src="./imgs/logo.png" alt="logo"/></a>
		<p><strong>Cinamagic</strong> </br> A magical experience </p>
	</footer>
	
	</body>
</html>