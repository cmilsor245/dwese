<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 15/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que pide un número por teclado y luego muestra el mismo al revés
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 25</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">número: <input type = "number" name = "numero" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          $numeroBackup = $numero;

          $numero_invertido = 0;

          while ($numero > 0) {
            $digito = $numero % 10;
            $numero_invertido = $numero_invertido * 10 + $digito;
            $numero = (int)($numero / 10);
          }

          echo "<p>el número $numeroBackup invertido es: $numero_invertido</p>";
        }
      ?>
    </body>
  </html>