<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle "while"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 2</title>
    </head>
    <body>
      <?
        $i = 0;

        while ($i <= 100) {
          if ($i % 5 == 0) {
            echo $i . "<br />";
          }
          $i++;
        }
      ?>
    </body>
  </html>