<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: resultado del área de un rectángulo
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>área rectángulo</title>
    </head>
    <body>
      <?
        $length = $_GET['length'];
        $width = $_GET['width'];

        $rectangleArea = $length * $width;

        echo "<p>$length * $width = $rectangleArea</p>";
      ?>
    </body>
  </html>