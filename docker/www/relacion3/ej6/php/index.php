<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej6"
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
        const G = 9.81;

        $altura = $_GET["h"];

        $t = sqrt((2*$altura) / G);

        echo "El tiempo que tardará en caer el objeto desde una altura de $altura metros es: $t segundos";
      ?>
    </body>
  </html>