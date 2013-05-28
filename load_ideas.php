
<?php
	$connection = mysqli_connect("localhost","root","root","ideas");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql="SELECT * FROM ideas";
	if (!mysqli_query($connection,$sql)) {
	  die('Error: ' . mysqli_error($connection));
	} 
	$result = mysqli_query($sql, $connection);
	echo $result;
	while($row = mysqli_fetch_array($result)){
		echo $row['title'] . $row['idea'];
	}

	//mysqli_close($con);
?>


