<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 15/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que pide primero un número y a continuación un dígito. el programa devuelve la posición (o posiciones) contando de izquierda a derecha que ocupa ese dígito en el número introducido
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 26</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">número: <input type = "number" name = "numero" required /></label>
        <label for = "digito">dígito: <input type = "number" name = "digito" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <br />

      <?
        if (isset($_POST["numero"]) && isset($_POST["digito"])) {
          $numero = $_POST["numero"];
          $digitoABuscar = $_POST["digito"];

          $numeroBackup = $numero;

          $numero = abs($numero); // transforma el número a positivo si es negativo (lo mismo que "$numero *= -1")

          /* ---------------------------------------- */

          // almacenaje de los dígitos en un array
          $digitosArray = [];

            // se almacenan primero de forma inversa, ya que es más fácil
            while ($numero > 0) {
              $digitosArray[] = $numero % 10;
              $numero = (int)($numero / 10);
            }

            /* --------------------- */

            // se invierte el orden de los elementos del array para que estén en el correcto
            $digitosArray = array_reverse($digitosArray);

          /* ---------------------------------------- */

          $coincidencias = 0;

          $posiciones = []; // array para almacenar todas las posiciones de las coincidencias

          for ($i = 0; $i < count($digitosArray); $i++) {
            if ($digitosArray[$i] == $digitoABuscar) {
              $coincidencias++;
              $posiciones[] = $i;
            }
          }

          /* ---------------------------------------- */

          if ($coincidencias == 0) {
            echo "el dígito $digitoABuscar no se encuentra en el número $numeroBackup";
          } elseif ($coincidencias == 1) {
            echo "el dígito $digitoABuscar se encuentra en la posición " . $posiciones[0] . " en el número $numeroBackup";
          } else {
            echo "el dígito $digitoABuscar se encuentra en las posiciones " . implode(", ", $posiciones) . " en el número $numeroBackup";
          }
        }
      ?>
    </body>
  </html>