<?php
	session_start();

	if (isset($_POST['save'])){
		$db = mysqli_connect('localhost', 'root', '', 'cinamagic');

		$name= $_POST['name'];
		$logo = $_POST['logo'];
		$trailer = $_POST['trailer'];
		$categoryID = $_POST['categoryID'];
		$description = $_POST['description'];
		$age = $_POST['age'];
		$date = $_POST['date'];

		$query = "INSERT INTO item (name, logo, trailer, categoryID, description, age, date) 
	  VALUES('$name', '$logo', '$trailer', '$categoryID', '$description', '$age', '$date')";
	  
	  mysqli_query($db, $query);

		header('location: ControlPage.html');
	}

?>


<!DOCTYPE html>
<html>
   <head>
    <meta charset = "utf-8">
    <title>Cinamagic - Add Movie</title>
	<link rel="stylesheet" href="mystyles.css" />
	<style>
		.add-item{
			margin:30px;
		}
	
		.AddForm{
			width: 600px;
			height: 630px;
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
		<div class="AddForm"> 
		<center>
			<div class="text">
				<h1 style="color:#c2b78f;">Add a Movie</h1>
			</div>
		
			<div class="add-item">
				<label>Title:</label>
					<input name = "name" type = "text" size = "25" placeholder = "Movie title">
			</div>
		
			<div class="add-item">
				<label>Poster:</label>
					<input name = "logo" type = "url" size = "25" placeholder = "Image URL">
			</div>
		
			<div class="add-item">
				<label>Trailer:</label>
					<input name = "trailer" type = "url" size = "30" placeholder = "Movie trailer URL">
			</div>
		
			<div class="add-item">
				<label>Synopsis:</label>
					<textarea name="description" type = "text" rows="4" cols="50" placeholder="Movie summary"></textarea>
			</div>
		
			<div class="add-item">
				<label>Genre:</label>
					<select name = "categoryID">
						<?php 
						$conn = new mysqli('localhost', 'root', '', 'cinamagic');
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
							echo "<option value='1'>No Category inserted in the database.</option>";
						}
					?>
					</select>
			</div>
		
			<div class="add-item">
				Movie Ratings:
				<label>G
				  <input name="age" type="radio" value="G"></label>
				<label>PG
				  <input name="age" type="radio" value="PG"></label>
				<label>PG12
				  <input name="age" type="radio" value="PG12"></label>
				<label>R12
				  <input name="age" type="radio" value="R12"></label>
				<label>R15
				  <input name="age" type="radio" value="R15"></label>
				<label>R18
				  <input name="age" type="radio" value="R18"></label>
			</div>
		
			<div class="add-item">
				<label for="Release">Release date:</label>
					<input type="date" id="start" name="date"  min="2015-01-01" max="2021-12-31">
			</div>

			<button class="Btn" type="submit" name="save">Save Changes</button>
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