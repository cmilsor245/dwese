<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 03/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej15"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>primera cifra del número</title>
    </head>
    <body>
      <?
        $num = $_GET["numero"];

        $primeraCifra = $num[0]; // se trata la variable "num" como un array y se extrae el primer elemento

        echo "La primera cifra del número " . $num . " es " . $primeraCifra;
      ?>
    </body>
  </html>