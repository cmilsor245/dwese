<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra cuántos dígitos tiene un número introducido por teclado
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 9</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">Número <input name = "numero" type = "number" required /></label>
        <br /><br />

        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["numero"])) {
          $numeroIngresado = $_POST["numero"];

          $digitos = 0;

          do {
            $numeroIngresado = (int)($numeroIngresado / 10);
            $digitos++;
          } while ($numeroIngresado > 0);

          echo "El número ingresado tiene " . $digitos . " dígitos.";
        }
      ?>
    </body>
  </html>