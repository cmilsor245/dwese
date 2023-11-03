<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 13/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que indica si un número introducido por teclado es primo o no
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 16</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">Numero: <input type = "number" name = "numero" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          echo "<br />";

          $es_primo = true;
          for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
              $es_primo = false;
              break;
            }
          }
          if ($es_primo) {
            echo "$numero es primo";
          } else {
            echo "$numero no es primo";
          }
        }
      ?>
    </body>
  </html>