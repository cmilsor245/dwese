<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 09/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: formulario que pide 4 números y los muestra junto con las palabras "máximo" y "mínimo" al lado del máximo y el mínimo respectivamente
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 2</title>
    </head>
    <body>
      <form method = "post">
        <span>Números: </span>
        <label for = "num1"><input name = "num1" type = "text" required /></label>
        <label for = "num1"><input name = "num2" type = "number" required /></label>
        <label for = "num1"><input name = "num3" type = "number" required /></label>
        <label for = "num1"><input name = "num4" type = "number" required /></label>
        <br /><br />
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST['num1'])) {
          $numeros = array();
          $numeros[0] = $_POST['num1'];
          $numeros[1] = $_POST['num2'];
          $numeros[2] = $_POST['num3'];
          $numeros[3] = $_POST['num4'];

          $max = $numeros[0];
          $min = $numeros[0];

          for ($i = 0; $i < 4; $i++) {
            if ($numeros[$i] > $max) {
              $max = $numeros[$i];
            }
            if ($numeros[$i] < $min) {
              $min = $numeros[$i];
            }
          }

          echo "<br />";

          for ($i = 0; $i < 4; $i++) {
            if ($numeros[$i] == $max) {
              echo "$numeros[$i] <- máximo<br />";
            } elseif ($numeros[$i] == $min) {
              echo "$numeros[$i] <- mínimo<br />";
            } else {
              echo "$numeros[$i]<br />";
            }
          }
        }
      ?>
    </body>
  </html>