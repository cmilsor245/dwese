<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej1"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>media de las tres notas</title>
    </head>
    <body>
      <?
        $nota1 = $_GET["nota1"];
        $nota2 = $_GET["nota2"];
        $nota3 = $_GET["nota3"];

        $media = ($nota1 + $nota2 + $nota3) / 3;

        echo "La media de las tres notas ($nota1, $nota2, $nota3) es: $media";
      ?>
    </body>
  </html>