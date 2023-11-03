<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 09/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que dados 2 números, uno real (base) y un entero positivo (exponente), saca por pantalla todas las potencias con base el número dado y exponentes entre 1 y el introducido. no se deben utilizar las funciones de exponenciación
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 15</title>
    </head>
    <body>
      <form method = "post">
        <label for = "base">Base: <input type = "number" name = "base" required /></label>
        <label for = "exponente">Exponente: <input type = "number" name = "exponente" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["base"]) && isset($_POST["exponente"])) {
          $base = $_POST["base"];
          $exponente = $_POST["exponente"];

          echo "<br />";

          for ($i = 1; $i <= $exponente; $i++) {
            $result = 1;
            for ($j = 1; $j <= $i; $j++) {
              $result *= $base;
            }
            echo $base . "^" . $i . " = " . $result . "<br />";
          }
        }
      ?>
    </body>
  </html>