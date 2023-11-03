<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 03/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej13"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>es par o divisible entre 5</title>
    </head>
    <body>
      <?
        $num = $_GET["numero"];

        if ($num % 2 == 0 && $num % 5 == 0) {
          echo "El número " . $num . " es par y divisible entre 5";
        } elseif ($num % 2 == 0 && $num % 5 != 0) {
          echo "El número " . $num . " es par, pero no divisible entre 5";
        } elseif ($num % 5 == 0 && $num % 2 != 0) {
          echo "El número " . $num . " es divisible entre 5, pero no par";
        } else {
          echo "El número " . $num . " no es par ni divisible entre 5";
        };
      ?>
    </body>
  </html>