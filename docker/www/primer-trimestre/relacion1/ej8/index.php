<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: conversor de euros a dólares
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 8</title>
    </head>
    <body>
      <?
        const DOLLAR = 1.07;
        $euro = 13;

        $conversion = ($euro * DOLLAR) / 1; // regla de tres para la conversión

        echo "<p>resultado -> $conversion</p>";
      ?>
    </body>
  </html>