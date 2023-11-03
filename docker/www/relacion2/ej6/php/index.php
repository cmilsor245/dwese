<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: resultado del área de un triángulo
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>área triángulo</title>
    </head>
    <body>
      <?
        $base = $_GET['base'];
        $height = $_GET['height'];

        $triangleArea = $base * $height;

        echo "<p>$base * $height = $triangleArea</p>";
      ?>
    </body>
  </html>