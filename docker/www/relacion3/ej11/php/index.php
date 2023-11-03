<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 03/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej11"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>segundos hasta la medianoche</title>
    </head>
    <body>
      <?
        $hora = $_GET["hora"];
        $minutos = $_GET["minutos"];

        $segundos = $hora * 3600 + $minutos * 60;

        const SEGUNDOS_EN_UN_DIA = 24 * 3600;

        $segundosHastaLaMedianoche = SEGUNDOS_EN_UN_DIA - $segundos;

        echo "Son las " . $hora . ":" . $minutos . ". Segundos hasta la medianoche -> " . $segundosHastaLaMedianoche;
      ?>
    </body>
  </html>