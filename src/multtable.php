<!DOCTYPE html>
<html>
  <head>
    <meta charset= "UTF-8">
    <title>multtable.php</title>
    <link rel="stylesheet" href="hw4.css">
  </head>
  <body>
  
  <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $min_multiplicand = ($_GET["min-multiplicand"]);
    $max_multiplicand = ($_GET["max-multiplicand"]);
    $min_multiplier = ($_GET["min-multiplier"]);
    $max_multiplier = ($_GET["max-multiplier"]);

       
    $check = 1;

    if (!is_numeric($min_multiplicand)){
      echo "min-multiplicand is not a number. <br>";
      $check = 0;
    }
    if (!is_numeric($min_multiplier)){
      echo "min-multiplier is not a number. <br>";
      $check = 0;
    }

    if (!is_numeric($max_multiplicand)){
      echo "max-multiplicand is not a number. <br>";
      $check = 0;
    }

    if (!is_numeric($max_multiplier)){
      echo "max-multiplier is not a number. <br>";
      $check = 0;
    }



    if($min_multiplicand> $max_multiplicand){
      echo "ERROR : min_multiplicand is larger than max_multiplicand. <br>" ;
      $check = 0;
    }
    
    if($min_multiplier> $max_multiplier){
      echo "ERROR : min_multiplier is larger than max_multiplier. <br>";
      $check = 0;
    }
    
    if (($min_multiplicand < 0) || ($min_multiplier < 0)){
      echo "negative numbers are not acceptable. <br>";
      $check = 0;
    }

    if (!(floor($min_multiplicand) == $min_multiplicand)){
      echo "min-multiplicand must be an integer. <br>";
      $check = 0;
    }
    if (!(floor($min_multiplier) == $min_multiplier)){
      echo "min-multiplier must be an integer. <br>";
      $check = 0;
    }
    if (!(floor($max_multiplicand) == $max_multiplicand)){
      echo "max-multiplicand must be an integer. <br>";
      $check = 0;
    }
    if (!(floor($max_multiplier) == $max_multiplier)){
      echo "max-multiplier must be an integer. <br>";
      $check = 0;
    }

    if (!(isset($min_multiplicand))){
      echo "min-multiplicand is missing. <br>";
      $check = 0;
    }
    if (!(isset($min_multiplier))){
      echo "min-multiplier is missing. <br>";
      $check = 0;
    }
    if (!(isset($max_multiplicand))){
      echo "max-multiplicand is missing. <br>";
      $check = 0;
    }
    if (!(isset($max_multiplier))){
      echo "max-multiplier is missing. <br>";
      $check = 0;
    }


    if ($check == 1){
      $min_multiplicand = (int) $min_multiplicand;
      $max_multiplicand = (int) $max_multiplicand;
      $min_multiplier = (int) $min_multiplier;
      $max_multiplier = (int) $max_multiplier;

      $row = $max_multiplicand - $min_multiplicand + 2;
      $col = $max_multiplier - $min_multiplier + 2;
      
      
      echo "<table>";
     
      for($i=0; $i<$row; $i++){
        echo "<tr>";
        if ($i==0){
          echo "<td></td>";
          for ($j=1; $j<$col; $j++){
            $output = $min_multiplier+$j-1;
            echo "<td>$output</td>";
          } 
       }
        
        else{
          for ($j=0; $j<$col; $j++){
            if ($j==0){
              $output=$min_multiplicand+$i-1;
              echo "<td>$output</td>";
            }
            else{
              $output=($min_multiplicand+$i-1)*($min_multiplier+$j-1);
              echo "<td>$output</td>";
            }
          }
        }
        echo "</tr>";
      }
      
      echo "</table>";
    }
  ?>     
  
  </body>
</html>

