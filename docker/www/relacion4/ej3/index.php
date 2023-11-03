<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra los múltiplos de 5 de 0 a 100 utilizando un bucle "do-while"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 3</title>
    </head>
    <body>
      <?
        $i = 0;

        do {
          echo $i . "<br />";
          $i += 5;
        } while ($i <= 100);
      ?>
    </body>
  </html>