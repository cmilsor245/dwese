<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra los múltiplos de 5 de 0 a 100 utilizando un bucle "for"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 1</title>
    </head>
    <body>
      <?
        for ($i = 0; $i <= 100; $i++) {
          if ($i % 5 == 0) {
            echo $i . "<br />";
          }
        }
      ?>
    </body>
  </html>