<?php

      

     if (isset($_GET["lunghezza"]));

          $lung = $_GET["lunghezza"];



     function generateRandomString($lung)
     {
          $letteraMaius = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "Z");
          $lettera = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u");
          $num = array("1", "2", "3", "4", "5", "7", "8", "9", "0");
          $simb = array("?", ">", ".", ":", "=", "+", "µ", "≈", "∂");
          $passw = '';

          while (strlen($passw) < $lung) {
               $rand = array_rand($lettera);
               $passw .= $lettera[$rand];
               $rand = array_rand($letteraMaius);
               $passw .= $letteraMaius[$rand];
               $rand = array_rand($num);
               $passw .= $num[$rand];
               $rand = array_rand($simb);
               $passw .= $simb[$rand];
          }
          if (strlen($passw) !== $lung) {
               return substr($passw, 0, - (strlen($passw) - $lung));
          } else {
               return $passw;
          }

     };

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     
</body>
</html>