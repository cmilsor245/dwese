<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej8"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>nota en el boletín</title>
    </head>
    <body>
      <?
        $nota1 = $_GET["nota1"];
        $nota2 = $_GET["nota2"];
        $nota3 = $_GET["nota3"];

        $promedio = ($nota1 + $nota2 + $nota3) / 3;

        if ($promedio >= 9) {
          echo "La nota media " . $promedio . " corresponde a un Sobresaliente.";
        } elseif ($promedio >= 7) {
          echo "La nota media " . $promedio . " corresponde a un Notable.";
        } elseif ($promedio >= 5) {
          echo "La nota media " . $promedio . " corresponde a un Suficiente.";
        } else {
          echo "La nota media " . $promedio . " corresponde a un Insuficiente.";
        };
      ?>
    </body>
  </html>