<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="style.css">
</html>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

/*
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
  if($check !== false) {
    echo "File is a video - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not a video.";
    $uploadOk = 0;
  }
}
*/

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload2"]["size"] > 5000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($FileType != "mp4" && $FileType != "mov" && $FileType != "avi" ) {
  echo "Sorry, only mp4, mov & avi files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
    echo "<h1>YAY! <b>". basename( $_FILES["fileToUpload2"]["name"]). "</b> was uploaded!!";
	$sql = "INSERT INTO filestuff (type, title, path) VALUES (?, ?, ?)";
	
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iss", 2, $_FILES["fileToUpload2"]["name"], "uploads/" . $_FILES["fileToUpload2"]["name"]);
            
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