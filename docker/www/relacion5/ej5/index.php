<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 11/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que genera 8 números enteros y los muestra formateados con colores, los pares de un color y los impares de otro
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 5</title>
    </head>
    <body>
      <?
        for ($i = 0; $i < 8; $i++) {
          $num = rand();
          if ($num % 2 == 0) {
            echo "<p style='color:blue'>" . $num . "</p>";
          } else {
            echo "<p style='color:red'>" . $num . "</p>";
          }
        }
      ?>
    </body>
  </html>