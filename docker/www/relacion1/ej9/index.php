<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: conversor de dólares a euros
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 9</title>
    </head>
    <body>
      <?
        const EURO = 0.94;
        $dollar = 13;

        $conversion = ($dollar * EURO) / 1; // regla de tres para la conversión

        echo "<p>resultado -> $conversion</p>";
      ?>
    </body>
  </html>