<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<style>
.content {
  max-width: 500px;
  margin: auto;
}
</style>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<article style="display: block; box-shadow: 10px 10px; width: 350px; background-color: #bbbbbb; text-align: center; border-radius: 25px; padding: 20px;max-width: 500px; margin: auto;>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<h3>Select image to upload:</h3>
		<input class="btn btn-primary" type="file" name="fileToUpload" id="fileToUpload">
		<input class="btn btn-secondary"type="submit" value="Upload Image" name="submit">
	</form>

	<form action="upload-vid.php" method="post" enctype="multipart/form-data">
		<h3>or Select a video to upload:</h3>
		<input class="btn btn-primary" type="file" name="fileToUpload2" id="fileToUpload2">
		<input class="btn btn-secondary"type="submit" value="Upload Video" name="submit">
	</form>

	<form action="upload-file.php" method="post" enctype="multipart/form-data">
		<h3>or Select a file to upload:</h3>
		<input class="btn btn-primary" type="file" name="fileToUpload3" id="fileToUpload3">
		<input class="btn btn-secondary"type="submit" value="Upload File" name="submit">
	</form>
</article>
</body>
</html>
