<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle "for"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 4</title>
    </head>
    <body>
      <?
        for ($i = 320; $i >= 160; $i -= 20) {
          echo $i . "<br />";
        }
      ?>
    </body>
  </html>