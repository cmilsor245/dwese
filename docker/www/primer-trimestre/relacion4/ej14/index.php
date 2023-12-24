<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 09/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que pide una base y un exponente (entero positivo) y calcula el resultado de la potencia
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 14</title>
    </head>
    <body>
      <form method = "post">
        <label for = "base">base <input name = "base" type = "number" required /></label>
        <label for = "exponente">exponente <input name = "exponente" type = "number" min = "0" required /></label>
        <br /><br />
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["base"]) && isset($_POST["exponente"])) {
          $base = $_POST["base"];
          $exponente = $_POST["exponente"];

          if ($exponente === 0) {
            echo "<br />$base^<sup>$exponente</sup> = 1";
          } elseif ($exponente === 1) {
            echo "<br />$base^<sup>$exponente</sup> = $base";
          } else {
            $result = 1;

            for ($i = 1; $i <= $exponente; $i++) {
              $result *= $base;
            }

            echo "<br />$base^<sup>$exponente</sup> = $result";
          }
        }
      ?>
    </body>
  </html>