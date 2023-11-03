<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 15/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra, cuenta y suma los múltiplos de 3 que hay entre 1 y un número leído por teclado
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 27</title>
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

          // inicialización de variables
          $suma = 0;
          $cantidadMultiplos = 0;
          $multiplos = "";

          /* ---------------------------------------------------- */

          // se recorren los números del 1 al número introducido
          for ($i = 1; $i <= $numero; $i++) {
            if ($i % 3 == 0) { // si el número es múltiplo de 3
              $suma += $i; // se suma el número a la suma total
              $cantidadMultiplos++; // se incrementa la cantidad de múltiplos encontrados
              $multiplos .= "$i, "; // se agrega el múltiplo a la lista de múltiplos
            }
          }

          /* ---------------------------------------------------- */

          // se muestran los resultados
          echo "múltiplos de 3 encontrados: $multiplos<br />";
          echo "cantidad de múltiplos de 3 encontrados: $cantidadMultiplos<br />";
          echo "suma de los múltiplos de 3 encontrados: $suma";
        }
      ?>
    </body>
  </html>