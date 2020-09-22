<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: www/login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
	<meta charset="UTF-8">
    <title>Login options</title>
    <link rel="stylesheet" href="style.css">
	<style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
	<body>
<?php
$mbox = imap_open("{localhost:143}", "admin@bbsnetwork.com", "61371hnf3t2526");

echo "<h1>Postfächer</h1>\n";
$folders = imap_listmailbox($mbox, "{localhost:143}", "*");

if ($folders == false) {
    echo "Abruf fehlgeschlagen<br />\n";
} else {
    foreach ($folders as $val) {
        echo $val . "<br />\n";
    }
}

echo "<h1>Nachrichten in INBOX</h1>\n";
$headers = imap_headers($mbox);

if ($headers == false) {
    echo "Abruf fehlgeschlagen<br />\n";
} else {
    foreach ($headers as $val) {
        echo $val . "<br />\n";
    }
}
?> asd <?php
imap_close($mbox);
?>
adad

</body>
</html>