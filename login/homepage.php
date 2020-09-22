<?php
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
		<form style="float: right;" action="search.php" method="GET">
			<input type="text" name="query" />
			<input type="submit" value="Search" />
		</form>
	</nav>
	
</head>
<body>
    <div class="page-header">
        <h4>logged in as, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>!</b></h4>
			<a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true" title="sorry aint workin">Upload</a>
    </div>
    <p>
        
    </p>
		
</body>
</html>