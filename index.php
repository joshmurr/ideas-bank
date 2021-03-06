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
		<a href="about.html"><button type="submit" id="aboutButton">About</button></a>
		<a href="https://github.com/joshmurr/ideas-bank"><button type="submit" id="aboutButton">Code</button></a>
		<a href="mailto:joshuadavidmurr@gmail.com?Subject=Ideas%20Bank%20Improvements"><button type="submit" id="aboutButton">Help Me</button></a>
	</div>
	<div class="formBox">
	<form action="data.php" method="post">
		<p>&nbsp;Write down your idea:</p><br>
		<div class="titles">Title</div><input type="text" name="titleInput" id="titleBox"><br>
		<div class="titles" style="margin-top: 12px;">Idea</div><textarea name="ideaInput" id="ideaBox"></textarea><br>
		<div class="titles" style="margin-top: 111px">E-Mail</div><input type="text" name="emailInput" id="emailBox"><br>
		<div class="titles" style="margin-top: 113px">Tags</div>
		<div id="tagsContainer"><input type="text" name="tagone" id="tagsBox">
		<input type="text" name="tagtwo" id="tagsBox">
		<input type="text" name="tagthree" id="tagsBox">
		<input type="submit" value="Submit" id="submitButton"></div><br>
	</form><br><br>
	<form action="search.php" method="post">
		<div class="titles" style="margin-top: 119px;">Search</div><input type="text" name="searchTag" id="searchBox">
		<input type="submit" value="Search" id="searchButton">
	</form>
	</div>
	<?php
		$connection = mysqli_connect("localhost","root","root","ideas");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql="SELECT * FROM `ideas` WHERE id < 1000 && flag < 5 ORDER BY id DESC LIMIT 100";
		if (!mysqli_query($connection,$sql)) {
		  die('Error: ' . mysqli_error($connection));
		} 
		$result = mysqli_query($connection, $sql);
		//echo $result;
		while($row = mysqli_fetch_array($result)){
			$userEmail = $row['email'];
			if(strlen($userEmail) > 0){
				$email = "<a href=\"mailto:" . $userEmail . "?Subject=Ideas%20Bank%20Idea\">Contact the Author</a>";
			} else {
				$email = "<span>Anonymous</span>";
			}
			echo "<div class=\"idea\">
						<div class=\"ideaTitle\">" . $row['title'] . "</div><br>
						<div class=\"ideaContainer\">" . nl2br($row['idea']) . "</div>
						<div class=\"emailContainer\">". $email ."</div>
						<form action=\"flag.php\" method=\"post\">
							<input name=\"idValue\" value=\"" . $row['id'] . "\" style=\"display: none\">
							<input type=\"submit\" value=\"Flag\" id=\"flagButton\">
						</form>
					</div>";
		}
		mysqli_close($connection);
	?>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>