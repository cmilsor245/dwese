<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: ejercicio de dados
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio dados</title>
    </head>
    <body>
      <?
        $dado1 = rand(1, 6);
        $dado2 = rand(1, 6);

        echo "<img src=\"img/" . $dado1 . ".svg\" />";

        echo "<img src=\"img/" . $dado2 . ".svg\" />";

        echo "<h1>Total: " . $dado1 + $dado2 . "</h1>";
      ?>
    </body>
  </html>