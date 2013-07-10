<!DOCTYPE html>
<html>
<head>
	<title>Ideas Bank</title>
	<link rel="stylesheet" href="stylesheet.css" type="text/css">
	<script src="jquery-1.9.1.min.js"></script>	
	<script src="javascript.js"></script>
</head>

<body>
	<div id="header"><br><br>
		<h1>Ideas Bank</h1>
		<h2>Open-Sourced Ideas<br><br> ver 1.0a</h2><br>
		<form>
			<button type="submit" formaction="about.html" id="aboutButton">About</button>
		</form>
	</div>
	<div class="formBox">
	<form action="data.php" method="post">
		<p>&nbsp;Write down your idea:</p><br>
		<div class="titles">Title</div><input type="text" name="titleInput" id="titleBox"><br>
		<div class="titles">Idea</div><textarea rows="8" cols="40" name="ideaInput" id="ideaBox"></textarea><br>
		<div class="titles" style="margin-top: 0px">E-Mail</div><input type="text" name="emailInput" id="emailBox" size="36"><br>
		<div class="titles" style="margin-top: 0px">Tags</div>
		<div id="tagsContainer"><input type="text" name="tagone" id="tagsBox">
		<input type="text" name="tagtwo" id="tagsBox">
		<input type="text" name="tagthree" id="tagsBox">
		<input type="submit" value="Submit" id="submitButton"></div><br>
	</form><br><br>
	<form action="search.php" method="post">
		<div class="titles">Search</div><input type="text" name="searchTag" id="searchBox">
		<input type="submit" value="Search" id="searchButton">
	</form>
	</div>
	<?php
		$connection = mysqli_connect("localhost","root","root","ideas");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql="SELECT * FROM `ideas` WHERE id < 1000 ORDER BY id DESC LIMIT 100";
		if (!mysqli_query($connection,$sql)) {
		  die('Error: ' . mysqli_error($connection));
		} 
		$result = mysqli_query($connection, $sql);
		//echo $result;
		while($row = mysqli_fetch_array($result)){
			$userEmail = $row['email'];
			echo "<script>console.log(\"" . $userEmail . "\");</script>";
			if(strlen($userEmail) > 0){
				$email = "<a href=\"mailto:" . $userEmail . "?Subject=Ideas%20Bank%20Idea\">Contact the Author</a>";
			} else {
				$email = "<span>Anonymous</span>";
			}
			echo "<div class=\"idea\">
						<div class=\"ideaTitle\">" . $row['title'] . "</div><br>
						<div class=\"ideaContainer\">" . $row['idea'] . "</div>
						<div class=\"emailContainer\">". $email ."</div>
						<form action=\"flag.php\" method=\"post\">
							<input name=\"idValue\" value=\"" . $row['id'] . "\" style=\"display: none\">
							<input type=\"submit\" value=\"Flag\" id=\"flagButton\">
						</form>
					</div>";
		}
		mysqli_close($con);
	?>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>