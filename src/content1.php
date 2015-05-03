<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//header('Content-Type: text/plain');

session_start();
if(isset($_GET['logout']) && $_GET['logout'] == '1'){  
  $_SESSION = array();
  session_destroy();
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/',$filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  
  header("Location: {$redirect}/login.php", true);
  die();
}
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset= "UTF-8">
    <title>content1.php</title>
    <link rel="stylesheet" href="hw4.css">
  </head>
  <body>';
if(session_status() == PHP_SESSION_ACTIVE){
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/',$filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  $link="<a href=$redirect/login.php>here</a>";
  $link2="<a href=$redirect/content1.php?logout=1>here</a>";
  if (($_POST['username']==NULL) || ($_POST['username']== " ")){
    echo "A username must be entered. Click $link to return to the login screen.";
  }
  else{
    if(isset($_POST['username'])){
      $_SESSION['name'] = $_POST['username'];
    }

    if(!isset($_SESSION['visits'])){
      $_SESSION['visits'] = 0;
    }

    $_SESSION['visits']++;
    echo"Hello $_SESSION[name], you have visited this page $_SESSION[visits] times before. Click $link2 to logout. \n";
  }
}


?>