<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 15/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que calcula el factorial de un número entero leído por teclado
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 28</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">número: <input type = "number" name = "numero" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <br />

      <?
        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          // casos básicos y resto de números
          if ($numero == 0) {
            echo "el factorial de 0 es 1";
          } elseif ($numero == 1) {
            echo "el factorial de 1 es 1";
          } else {
            $factorial = 1;
            for ($i = 1; $i <= $numero; $i++) {
              $factorial *= $i;
            }

            echo "el factorial de $numero es $factorial";
          }
        }
      ?>
    </body>
  </html>