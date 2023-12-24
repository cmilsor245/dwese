<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej5"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resultado de la ecuación</title>
    </head>
    <body>
      <?
        $a = $_GET["a"];
        $b = $_GET["b"];

        if ($a == 0) {
          echo "La ecuación no tiene solución";
        } else {
          echo "Resolviendo la ecuación " . $a . "x + " . $b . " = 0<br />";
          echo "x = -(" . $b . ") / " . $a . "<br />";
          echo "x = " . (-$b / $a);
        }
      ?>
    </body>
  </html>