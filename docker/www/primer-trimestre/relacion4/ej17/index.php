<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 13/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que suma los 100 primeros números siguientes a un número entero positivo introducido por teclado. se debe comprobar que el dato es correcto
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
        <label for = "numero">Numero: <input type = "number" name = "numero" required /></label> <!-- forma más directa: 'min = "1"' -->
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          if ($numero > 0) {
            $suma = 0;
            for ($i = $numero + 1; $i <= $numero + 100; $i++) {
              $suma += $i;
            }
            echo "la suma de los 100 primeros numeros siguientes a $numero es: $suma";
          } else {
            echo "el dato introducido no es correcto";
          }
        }
      ?>
    </body>
  </html>