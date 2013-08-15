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
	$id = $_POST['idValue'];
	$sql="UPDATE ideas SET flag=flag+1 WHERE id=$id";
	if (!mysqli_query($connection,$sql)) {
	  die('Error: ' . mysqli_error($connection));
	} 
	echo "<div class=\"idea\" style=\"float: none; margin-left: auto; margin-right: auto;\">
			<br><br>Thank you. <br><br> The idea has been flagged.<br><br><br>
			<a href=\"index.php\"><input type=\"button\" value=\"Back\" id=\"aboutButton\"></a>
		</div>";
	mysqli_close($connection);
	exit();
?>
</body>
</html>