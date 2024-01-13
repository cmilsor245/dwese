<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle "while"
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
        $i = 320;

        while ($i >= 160) {
          echo $i . "<br />";
          $i -= 20;
        }
      ?>
    </body>
  </html>