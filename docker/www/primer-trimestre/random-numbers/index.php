<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: random numbers between 1 - 1000
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>random numbers</title>
    </head>
    <body>
      <?
        $random_number = rand(1, 1000);
        echo $random_number;
      ?>
    </body>
  </html>