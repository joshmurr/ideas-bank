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
		$con=mysqli_connect("example.com","peter","abc123","my_db");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		
		//mysqli_query($con,"UPDATE 'ideas' SET flag=flag+1 WHERE FirstName='Peter' AND LastName='Griffin'");
		
		mysqli_close($con);
	?>

	<script type="text/javascript">
		var flag = function(){
			alert("Flagged.");
		}
	</script>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>



