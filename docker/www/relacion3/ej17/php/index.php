<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 04/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej17"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>capicúa ¿?</title>
    </head>
    <body>
      <?
        $num = $_GET["numero"];

        $numSinAlterar = $num;
        $reversedNum = 0;

        while ($num > 0) {
          $ultimoDigito = $num % 10;
          $reversedNum = $reversedNum * 10 + $ultimoDigito;
          $num = (int)($num / 10); // necesario para eliminar el último dígito de "num". "(int)" elimina el decimal derivado de la división
        };

        if ($numSinAlterar == $reversedNum) {
          echo "<p>El número $numSinAlterar es capicúa</p>";
        } else {
          echo "<p>El número $numSinAlterar no es capicúa</p>";
        };
      ?>
    </body>
  </html>