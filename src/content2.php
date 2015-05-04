<?PHP
header('Cache-Control: no-cache, no-store, must-revalidate');
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);		// filepath code is from the lecture code.
$filePath = implode('/',$filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
session_start();
if (!isset($_SESSION['correct']) ){
  session_destroy(); 
  header("Location: {$redirect}/login.php", true);
  die();
}
echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset= "UTF-8">
    <title>content2.php</title>
  </head>';
$link="<a href=$redirect/content1.php?ok>here</a>";
echo "You can click $link to go back to content1.";



?>