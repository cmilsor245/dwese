<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: cálculo de la conversión
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resultado conversión</title>
    </head>
    <body>
      <?
        $kb = $_GET["kb"] / 1024;

        echo $_GET['kb'] . " Kb = $kb Kb";
      ?>
    </body>
  </html>