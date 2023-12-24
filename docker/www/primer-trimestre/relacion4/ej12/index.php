<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 08/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra los n primeros números de la serie de fibonacci. el valor n se introduce por teclado
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 12</title>
    </head>
    <body>
      <form method = "post">
        <label for = "iteraciones">Iteraciones <input name = "iteraciones" type = "number" min = "1" required /></label>
        <br /><br />
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["iteraciones"])) {
          $iteraciones = $_POST["iteraciones"];

          if ($iteraciones == 0) {
            echo "<br />No se ha introducido ninguna iteración";
          } elseif ($iteraciones == 1) {
            echo "<br />Serie de Fibonacci: 1";
          } elseif ($iteraciones == 2) {
            echo "<br />Serie de Fibonacci: 1, 1";
          } else {
            echo "<br />Serie de Fibonacci: 1, 1";
            $previo = 1;
            $actual = 1;

            for ($i = 3; $i <= $iteraciones; $i++) {
              $siguiente = $previo + $actual;
              $previo = $actual;
              $actual = $siguiente;
              echo ", $siguiente";
            }
          }
        }
      ?>
    </body>
  </html>