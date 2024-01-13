<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 03/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej12"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>números ordenados</title>
    </head>
    <body>
      <?
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        $num3 = $_GET["num3"];

        if ($num1 <= $num2 && $num1 <= $num3) {
          if ($num2 <= $num3) {
            echo "$num1, $num2, $num3";
          } else {
            echo "$num1, $num3, $num2";
          };
        } elseif ($num2 <= $num1 && $num2 <= $num3) {
          if ($num1 <= $num3) {
            echo "$num2, $num1, $num3";
          } else {
            echo "$num2, $num3, $num1";
          };
        } else {
          if ($num1 <= $num2) {
            echo "$num3, $num1, $num2";
          } else {
            echo "$num3, $num2, $num1";
          };
        };
      ?>
    </body>
  </html>