<?php
// Initialize the session
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
	<nav style="background-color : #0A1A73">
	<li><a href=""><img src="thing.png" width=70 alt="ada"></a></li>
	<li><a href="games" style="text-decoration:none">Games</a></li>
	<?php
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		echo("");
		
		
	}
	?>
	</nav>
	
</html>