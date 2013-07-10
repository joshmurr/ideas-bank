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
	$connection = mysqli_connect("localhost","root","root","ideas");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$searchTag =  strtolower($_POST['searchTag']);
		$sql="SELECT * FROM `ideas`";
		if (!mysqli_query($connection,$sql)) {
		  die('Error: ' . mysqli_error($connection));
		} 
		$result = mysqli_query($connection, $sql);
		//echo $result;
		while($row = mysqli_fetch_array($result)){
			$tagone = $row['tagone'];
			$tagtwo = $row['tagtwo'];
			$tagthree = $row['tagthree'];
			if($tagone==$searchTag || $tagtwo==$searchTag || $tagthree==$searchTag){
				echo "<div class=\"idea\">
						<div class=\"ideaTitle\">" . $row['title'] . "</div><br>
						<div class=\"ideaTitle ideaContainer\">" . $row['idea'] . "</div>
						<div class=\"emailContainer\"><a href=\"mailto:" . $row['email'] . "?Subject=Ideas%20Bank%20Idea\">" . $row['email'] . "</a></div>
						<form action=\"flag.php\" method=\"post\">
							<input name=\"idValue\" value=\"" . $row['id'] . "\" style=\"display: none\">
							<input type=\"submit\" value=\"Flag\" id=\"flagButton\">
						</form>
					</div>";
		}
	}
	mysqli_close($con);
?>
</body>
</html>