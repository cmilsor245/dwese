<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 03/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej14"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>última cifra del número</title>
    </head>
    <body>
      <?
        $num = $_GET["numero"];

        $ultimaCifra = $num % 10;

        echo "Última cifra del número " . $num . " es: " . $ultimaCifra;
      ?>
    </body>
  </html>