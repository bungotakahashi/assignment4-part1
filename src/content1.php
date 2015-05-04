<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$filePath = explode('/', $_SERVER['PHP_SELF'], -1); // this filepath technique is from the lecture code.
$filePath = implode('/',$filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
session_start();

if (!$_POST && !isset($_SESSION['correct'])){
    header("Location: {$redirect}/login.php", true);
  }

if(isset($_GET['logout']) && $_GET['logout'] == '1'){  // this destroy code is also from the lecture code.
  $_SESSION = array();
  session_destroy();  
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
  
  $link="<a href=$redirect/login.php>here</a>";
  $link2="<a href=$redirect/content1.php?logout=1>here</a>";
  $link3="<a href=$redirect/content2.php?ok>here</a>";
  
  if ((!isset($_SESSION['name'])) && (($_POST['username']==NULL) || ($_POST['username']== ""))){
    echo "A username must be entered. Click $link to return to the login screen.";
  }
  else{
    if(isset($_POST['username'])){
      $_SESSION['name'] = $_POST['username'];
    }

    if(!isset($_SESSION['visits'])){
      $_SESSION['visits'] = 0;
    }
    else {
      $_SESSION['visits']++;
    }
    $_SESSION['correct']=1;
    
    echo"Hello $_SESSION[name], you have visited this page $_SESSION[visits] times before. Click $link2 to logout. <br>";
    echo "$link3 is a link to content2." ;
  }
}


?>