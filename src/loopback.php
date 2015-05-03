<!DOCTYPE html>
<html>
  <head>
    <meta charset= "UTF-8">
    <title>loopback.php</title>
    </head>
  <body>
    <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      if ($_SERVER['REQUEST_METHOD'] === 'GET1') {
        echo "{\"Type\": \"GET\",\"parameters\": ";
        $data = array();
        $data = $_GET;
        foreach ($data as $key => $value){
          if ($value == ""){
            $data[$key] = "undefined";
          }
          
        }
        if (count($data)==0){
          echo "null";
        }
        else {
         echo json_encode($data);
        }
        echo "}";
      }

      else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "{\"Type\": \"POST\",\"parameters\": ";
        $data = array();
        $data = $_POST;
        foreach ($data as $key => $value){
          if ($value == ""){
            $data[$key] = "undefined";
          }
          
        }
        echo json_encode($data);
        echo "}";
      }
      else {
        echo "invalid request. (must be GET or POST)";
      }
    ?>
  </body>
</html>
