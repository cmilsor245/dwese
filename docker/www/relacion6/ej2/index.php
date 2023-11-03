<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: muestra los números primos que hay entre 1 y 1000
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
        include("../ej1/func/function.php");

        for ($i = 1; $i <= 1000; $i++) {
          if (esPrimo($i)) {
            echo $i . " ";
          }
        }
      ?>
    </body>
  </html>