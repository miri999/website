<?php

require_once "config.php";
$sql = "CREATE TABLE posts (id INTEGER PRIMARY KEY AUTOINCREMENT, by TEXT, title TEXT, contents TEXT);";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
	<nav style="background-color: #526cde;padding: 10px;
	margin-top: 1px;">
		
	</nav>
	
</head>
<body>
    <div class="page-header">
        <h4>logged in as, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>!</b></h4>
		<form style="float: right;" action="homepage.php" method="GET">
			<input type="text" name="title" />
			<input type="text" name="content" />
			<input type="submit" value="post" />
		</form>
    </div>
	
	
    <p>
        
    </p>
		
</body>
</html>

<?php

sql ="INSERT INTO posts(by,title,contents) VALUES ("+$_SESSION["username"]+","+$_GET["title"]+","+$_GET["content"]+","+$_GET["content"]");";
?>