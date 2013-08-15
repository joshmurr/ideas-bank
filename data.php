<!DOCTYPE html>
<html>
<head>
	<title>Ideas Bank</title>
	<link rel="stylesheet" href="stylesheet.css" type="text/css">
	<script src="jquery-1.9.1.min.js"></script>	
	<script src="javascript.js"></script>
</head>
<body>
	<?php
		$connection = mysqli_connect("localhost","joshmurr_jm","frogsplat25","joshmurr_ideasbank");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$tone = strtolower($_POST['tagone']);
		$ttwo = strtolower($_POST['tagtwo']);
		$tthree = strtolower($_POST['tagthree']);
		$ideaIn = addslashes($_POST['ideaInput']);
		$sql="INSERT INTO `ideas` (title, idea, email, tagone, tagtwo, tagthree) VALUES ('$_POST[titleInput]','$ideaIn','$_POST[emailInput]','$tone','$ttwo','$tthree')";
		if (!mysqli_query($connection,$sql)) {
		  die('Error: ' . mysqli_error($connection));
		} 
		echo "<div class=\"idea\" style=\"float: none; margin-left: auto; margin-right: auto;\"><br><br>Thank you for submitting an idea!<br><br>
				<a href=\"index.php\"><input type=\"button\" value=\"Back\" id=\"aboutButton\"></a></div>";
		mysqli_close($connection);
		exit();
	?>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>