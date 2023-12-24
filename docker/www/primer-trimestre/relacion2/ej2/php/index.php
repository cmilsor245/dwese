<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: resultado de la conversión de euros a dólares
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resultado conversión</title>
    </head>
    <body>
      <p><? echo $_GET["euros"] . " = " . $_GET["euros"] * 1.06 . " dollars" ?></p>
    </body>
  </html>