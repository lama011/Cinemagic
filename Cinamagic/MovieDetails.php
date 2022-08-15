<?php
    // add review.
    if (isset($_POST['review'])){
        $db = mysqli_connect('localhost', 'root', '', 'cinamagic');
        $name = $_POST['rname'];
        $rating = $_POST['rating'];
        $body = $_POST['body'];
        $movie = $_GET['ID'];

        $query = "INSERT INTO review (name, item_ID, body, rating) 
	  VALUES('$name', '$movie', '$body', '$rating')";
	  
	  mysqli_query($db, $query);
    }

    // get the movie from the database.
    if(isset($_GET['ID'])){
        $movie = $_GET['ID'];
        $conn = new mysqli('localhost', 'root', '', 'cinamagic');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $ItemQuery = "SELECT name, logo, description, trailer, date, age, categoryID FROM item where ID = '$movie'";

        $ReviewQuery = "SELECT name, body FROM review where item_ID = '$movie'";
		
        $ItemResult = mysqli_query($conn, $ItemQuery);
		$item= mysqli_fetch_assoc($ItemResult);
		$CategoryQuery = $query = <<<QUERY
			SELECT i.*, c.name, c.ID
			FROM item i, category c
			WHERE c.ID=$_GET[ID]
QUERY;


		$CategoryResult = mysqli_query($conn, $CategoryQuery);
		
        $category = mysqli_fetch_assoc($CategoryResult);
    }
?>

<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <title><?php echo $item['name']; ?></title>
	<link rel="stylesheet" href="mystyles.css" />
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
	
	<div class="text">	
	<h1><?php echo $item['name']; ?></h1>
	</div>
	
	<div style="display:block; width:100%;">
		<div style="width:700px; height: auto; padding:20px; float: left; display: inline-block;">
				<iframe style="width:100%; height:390px;" src=<?php echo $item['trailer'];?> frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div style="width:50%; float: left; display: inline-block; color:white; font-size:20px; padding: 20px;">
			<p><strong>Genre: </strong><?php echo $category['name'];?><br>
			
				<br><strong>Release Date: </strong><?php echo $item['date'];?>
				<br> <br>
				<strong>Synopsis: </strong>
				<?php echo $item["description"]; ?>
			</p>	<br><br><hr>
		</div>

	</div>



	<div style="display:block; width:80%; float:left; margin:20px;">
		<div>
			<form method="get" style="padding:10px;">
				<select name="days" id="days">
					<option>Today</option>
					<option>Tomorrow</option>
					<option>18 October</option>
					<option>19 October</option>
				</select>
				
				
				<select name="locations" id="locations">
					<option>AL Qasr Mall</option>
					<option>Riyadh Front</option>
					<option>Kingdom Center</option>
				</select>
			</form>
		</div>
		
		<div style="color:white">
			<h3>Standard<h3>

				<label>5:30pm
					<input name ="time" type = "radio" value = "5:30pm">
				</label>
			
				<label>9:15pm
					<input name ="time" type = "radio" value = "9:15pm" >
				</label>
			
				<label>12:00pm
					<input name ="time" type = "radio" value = "12:00pm" >
				</label>

			<h3>VIP<h3>
				<label>8:30pm
					<input name ="time" type = "radio" value = "8:30pm" >
				</label>
			
				<label>10:00pm
					<input name ="time" type = "radio" value = "10:00pm">
				</label>
		</div>

		<a href="Booking.html"><button style="margin-top:30px;" class="Btn" type="button">Book</button></a><br><br><br>

		<center>

			<div style="width:600px; color:white; font-size:20px; margin-top:20px;  text-align:left;">
				<h2>Movie reviews:</h2><br>
					<div>
						<?php 

							$conn = new mysqli('localhost', 'root', '', 'cinamagic');
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$RreviewQuery = "SELECT name, body FROM review where item_ID = ".$_GET['ID'];
							
							if($result = $conn->query($RreviewQuery)){
								if($result->num_rows > 0){
									while ($row = $result->fetch_assoc()) {
										echo "
										<div>
											<p>".$row['name'].":<br><br>
											".$row['body']."</p>
										</div>
										<br>
										";
									}
								} else {
									echo "Be the first one to comment!";
								 }
											  
							} else {
								trigger_error('Invalid query: ' . $conn->error);
							}
									
						?>
					</div>
			 <br><br>
			 
		
				<form method= "post" action="<?php echo basename($_SERVER['REQUEST_URI']);?>">

					<label><h3 style="text-shadow: 2px 2px #c7a52c;">Write your review:</h3></label><br><br>
					<label>Your name:</label><br>
						<input type="text" style="width: 99%; padding: 10px; margin: 5px 0; display: inline-block;" placeholder = "Enter your name" name = "rname" required><br><br>	
						
						<textarea style="width: 99%; padding: 10px; margin: 5px 0; display: inline-block;" name="body" rows="10" cols="30" placeholder="Write a review here."></textarea><br><br>
						
					
					
					<label>Rating:</label>
						<select name='rating'>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
						</select><br><br>

					<button style="margin-bottom:100px;" class="Btn" type="submit" name="review">Post</button>
					
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