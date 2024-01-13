<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: resultado de la conversion de dólares a euros
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resultado conversión</title>
    </head>
    <body>
      <p><? echo $_GET["dollars"] . " = " . $_GET["dollars"] * 0.94 . " euros" ?></p>
    </body>
  </html>