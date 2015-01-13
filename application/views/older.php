<!DOCTYPE html>
<html>
<head>
	<title>View Past Years</title>
</head>
<body>
<h2> Data is available for the following years:</h2>
<?php
foreach ($years as $year ) {
	echo "<div class='old'><h3><a href='" . site_url(array('hours','index',$year['Year'])) . "'>" . $year['Year'] . "</a></h3></div>";
}




?>
</body>
</html>