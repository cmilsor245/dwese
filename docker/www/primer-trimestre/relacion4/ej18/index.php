<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 14/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que obtiene los números enteros comprendidos entre dos numeros enteros introducidos por teclado y validados como distintos. el programa empieza por el menor y va incrementando de 7 en 7
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 17</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero1">Numero 1: <input type = "number" name = "numero1" required /></label>
        <label for = "numero2">Numero 2: <input type = "number" name = "numero2" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["numero1"]) && isset($_POST["numero2"])) {
          $numero1 = $_POST["numero1"];
          $numero2 = $_POST["numero2"];

          if ($numero1 === $numero2) {
            echo "los dos datos introducidos son iguales";
          } else {
            // comprobación del menor/mayor
            $min = 0;
            $max = 0;
            if ($numero1 < $numero2) {
              $min = $numero1;
              $max = $numero2;
            } else {
              $min = $numero2;
              $max = $numero1;
            }

            /* -------------------------------------- */

            for ($i = $min + 1; $i <= $max; $i += 7) {
              echo "$i, ";
            }
          }
        }
      ?>
    </body>
  </html>