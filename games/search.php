<?php
$mysqli = new mysqli("localhost", "root", "", "search_for_games");
$stmt = $mysqli->prepare("SELECT * FROM games WHERE title LIKE ?");
$stmt->bind_param("s", $_GET['query']);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<nav style="background-color: #526cde;padding: 10px;
	margin-top: 1px;">
		<form style="float: right;" action="search.php" method="GET">
			<input type="text" name="query" />
			<input type="submit" class="btn btn-success" value="Search" />
			<a class="btn btn-primary">login</a>
		</form>
	</nav>
	
	<body>
	    <?php foreach($result as $key => $row) { ?>
		<li><a href="<?=$row["goto"]?>"><h3>id: <?=$row["id"]?> title: <?=$row["title"]?></h3></a></li>
	    <?php } ?>
	</body>
</html>