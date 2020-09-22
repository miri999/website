<?php
$mysqli = new mysqli("localhost", "root", "", "search_for_games");
$stmt = $mysqli->prepare("SELECT * FROM games WHERE title = ?");
$stmt->bind_param("s", $_GET['query']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
	<nav style="background-color: #526cde;padding: 10px;
	margin-top: 1px;">
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<form style="float: right;" action="search.php" method="GET">
			<input type="text" name="query" />
			<input type="submit" class="btn btn-success" value="Search" />
			<a class="btn btn-primary">login</a>
		</form>
	</nav>
	
	<article>
		<?php foreach($row as $key => $value) {} ?>
		<h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?=$row["title"]?></h2>
		<img width=500 src="<?=$row["img"]?>">
		<a href="<?=$row["url"]?>" class="btn btn-success" style="float: right;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Play <?=$row["title"]?>!</a>
		<p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?=$row["description"]?></p>
	</article>
</html>