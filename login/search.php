<?php
$mysqli = new mysqli("localhost", "root", "", "files");
$stmt = $mysqli->prepare("SELECT * FROM files WHERE type LIKE ?");
$stmt->bind_param("s", $_GET['query']);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

	<nav style="background-color: #526cde;padding: 10px;
	margin-top: 1px;">
		<form style="float: right;" action="search.php" method="GET">
			<input type="text" name="query" />
			<input type="submit" value="Search" />
		</form>
	</nav>
		<?php foreach($result as $key => $row) {?>
			<a href="<?=$row["url"] ?>"><?=$row["type"]?></a>
        <?php } ?>
	<body>
	    
	</body>
</html>