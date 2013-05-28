<!DOCTYPE html>
<html>
<head>
	<title>Ideas Bank</title>
	<link rel="stylesheet" href="stylesheet.css" type="text/css">
	<script src="jquery-1.9.1.min.js"></script>	
	<script src="javascript.js"></script>
</head>

<body>
	<form action="data.php" method="post" class="formBox">
		<p>Write down your idea:</p>
		Title: <input type="text" name="titleInput" id="titleBox"><br>
		Idea: <input type="text" name="ideaInput" id="ideaBox" size="36"><br>
		<input type="submit" value="Submit" id="submitButton" onclick="">
	</form>
	
	<?php
		$connection = mysqli_connect("localhost","root","root","ideas");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql="SELECT * FROM `ideas`";
		if (!mysqli_query($connection,$sql)) {
		  die('Error: ' . mysqli_error($connection));
		} 
		$result = mysqli_query($connection, $sql);
		//echo $result;
		while($row = mysqli_fetch_array($result)){
			echo "<div class=\"idea\"><div class=\"ideaTitle\">" . $row['title'] . "</div><div class=\"ideaTitle ideaContainer\">" . $row['idea'] . "</div></div>";
			
			//echo "$(\"#allIdeas\").append(\"<div id=\"ideaTitle\">\"" . $row['title'] . "\"</div>\");";
			//echo "$(\"#allIdeas\").append(\"<div id=\"ideaContainer\">\"" . $row['idea'] . "\"</div>\");";
			
		}

		//mysqli_close($con);
	?>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>