<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: php para realizar la multiplicación de dos números introducidos por el usuario mediante un formulario
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resultado multiplicación</title>
    </head>
    <body>
      <p><? echo $_GET["num1"] . " * " . $_GET["num2"] . " = " . $_GET["num1"] * $_GET["num2"]; ?></p>
    </body>
  </html>