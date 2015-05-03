<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset= "UTF-8">
    <title>login.php</title>
    </head>
  <body>';
    echo  '<form action= "http://web.engr.oregonstate.edu/~takahasb/content1.php" method= "POST">
          username:<input type= "text" name="username">
          <input type= "submit" value="Login">
          </form>';
    
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      
    
  echo '</body>
</html>';
?>