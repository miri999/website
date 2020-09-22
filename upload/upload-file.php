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
	<link rel="stylesheet" href="style.css">
</html>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload3"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
    echo "<h1>YAY! <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> was uploaded!!";
	$sql = "INSERT INTO filestuff (type, title, path) VALUES (?, ?, ?)";
	
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iss", 3, $_FILES["fileToUpload3"]["name"], "uploads/" . $_FILES["fileToUpload3"]["name"]);
            
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
        } else{
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="style.css">
	<a class="btn btn-success" href="/login/homepage.php">YAY!</a> <a class="btn btn-success" href="/upload">AGAIN!</a>
</html>