<?php
	session_start();

	if (isset($_POST['save'])){
		$db = mysqli_connect('localhost', 'root', '', 'cinamagic');
		
		$title = $_POST['title'];
		$name = $_POST['name'];
		$logo = $_POST['logo'];
		$trailer = $_POST['trailer'];
		$categoryID = $_POST['categoryID'];
		$description = $_POST['description'];
		$age = $_POST['age'];
		$date = $_POST['date'];

		$query = "UPDATE item SET name = '$name', logo = '$logo', trailer = '$trailer', categoryID = '$categoryID', description = '$description', age = '$age', date='$date' WHERE ID = '$title'";
		mysqli_query($db, $query);
		
		header('location: ControlPage.html');
	}
	

?>

<!DOCTYPE html>
<html>
   <head>
    <meta charset = "utf-8">
    <title>Cinamagic - Edit Movie</title>
	<link rel="stylesheet" href="mystyles.css" />
	<style>
		.edit-item{
			margin:30px;
		}
	
		.EditForm{
			width: 600px;
			height: 710px;
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
	
	<form method="post">
		<div class="EditForm"> 
		<center>
			<div class="text"><h2 style="color:#c2b78f;">1.Choose Movie</h2></div>
			
			<div class="edit-item">
				<label>Choose a movie to edit</label>
					<select name="title">
					<?php 
						$conn = new mysqli('localhost', 'root', '', 'cinamagic');
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						
						$select_query = "SELECT ID, name FROM item";
						$result = $conn->query($select_query);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value=".$row['ID'].">".$row['name']."</option>";
							}
						} else {
							echo "<option value='1'>Database is empty.</option>";
						}
					?>
				</select>
			</div>
		
			<div class="text"><h2 style="color:#c2b78f;">2.Edit Movie Information</h2></div>
			
			<div class="edit-item">
				<label>Title:</label>
					<input name = "name" type = "text" size = "25" placeholder = "Movie title">
			</div>
		
			<div class="edit-item">
				<label>Poster:</label>
					<input name = "logo" type = "img" size = "25" placeholder = "Image URL">
			</div>
		
			<div class="edit-item">
				<label>Trailer:</label>
					<input name = "trailer" type = "video/mp4" size = "30" placeholder = "Movie trailer URL">
			</div>
		
			<div class="edit-item">
				<label>Synopsis:</label>
					<input name = "description" type = "text" size = "30" placeholder = "Movie summary">
			</div>
		
			<div class="edit-item">
				<label>Genre:</label>
					<select name = "categoryID">
						<?php 
						$conn = new mysqli('localhost', 'root', '', 'Cinamagic');
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						
						$select_query = "SELECT * FROM category";
						$result = $conn->query($select_query);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value=".$row['ID'].">".$row['name']."</option>";
							}
						} else {
							echo "<option value='1'>Database is empty..</option>";
						}
					?>
					</select>
			</div>
			
			<div class="edit-item">
				<label>Movie Ratings:</label>
					<label>G
						<input name = "age" type = "radio" value = "G"></label>
					<label>PG
						<input name = "age" type = "radio" value = "PG"></label>
					<label>PG12
						<input name = "age" type = "radio" value = "PG12"></label>
					<label>R12
						<input name = "age" type = "radio" value = "R12"></label>
					<label>R15
						<input name = "age" type = "radio" value = "R15"></label>
					<label>R18
						<input name = "age" type = "radio" value = "R18"></label>
			</div>
			
			<div class="edit-item">
				<label for="Release">Release date:</label>
					<input type="date" id="start" name="date" min="2015-01-01" max="2021-12-31">
			</div>
			
			<button class="Btn" type="submit" name="save">Edit</button>
			
		</center>
		</div>
	</form>

	<footer>
		<h3>&copy; 2021 All Rights Reserved. </h3>
		<a href="Index.php"><img class="flogo" src="./imgs/logo.png" alt="logo"/></a>
		<p><strong>Cinamagic</strong> </br> A magical experience </p>
	</footer>
	
   </body>
</html>