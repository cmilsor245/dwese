<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: basic "get" method's php
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>basic "get" method's php</title>
    </head>
    <body>
      <h1>Hola, tu nombre es <? echo $_GET["nombre"]; ?></h1> <!-- el método "get" utiliza el atributo "name" del elemento en html -->
    </body>
  </html>