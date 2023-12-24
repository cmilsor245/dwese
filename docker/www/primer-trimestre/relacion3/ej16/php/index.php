<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 03/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej16"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>número de cifras del número</title>
    </head>
    <body>
      <?
        $num = $_GET["numero"];

        $numSinAlterar = $num;

        $cont = 0;

        if ($num >= -9 && $num <= 9) {
          $cont = 1;
        } else {
          if ($num < 0) {
            $num *= -1;
          };

          while ($num >= 1) { // se divide el número entre 10 en cada iteración hasta llegar a una cifra, donde se vuelve a dividir para contar esa cifra y ya no cumple la condición
            $num /= 10;
            $cont++;
          };
        };

        if ($cont == 0) {
          echo "El número $numSinAlterar no tiene cifras";
        } elseif ($cont == 1) {
          echo "El número $numSinAlterar tiene una cifra";
        } else {
          echo "El número $numSinAlterar tiene $cont cifras";
        };
      ?>
    </body>
  </html>