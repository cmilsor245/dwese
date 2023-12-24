<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej2"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>mensaje correspondiente</title>
    </head>
    <body>
      <?
        $hora = $_GET["hora"];

        if ($hora >= 6 && $hora <= 12) {
          echo "Buenos días";
        } elseif ($hora >= 13 && $hora <= 20) {
          echo "Buenas tardes";
        } elseif ($hora >= 21 || $hora <= 5) {
          echo "Buenas noches";
        }
      ?>
    </body>
  </html>