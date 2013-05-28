<html>
<body>
<?php
	$connection = mysqli_connect("localhost","root","root","ideas");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql="INSERT INTO `ideas` (title, idea) VALUES ('$_POST[titleInput]','$_POST[ideaInput]')";
	if (!mysqli_query($connection,$sql)) {
	  die('Error: ' . mysqli_error($connection));
	} 
	echo "Thank you for submitting an idea!";
	header("Location: http://ideasbank.local/");
	mysqli_close($con);
	exit();
?>
</body>
</html>