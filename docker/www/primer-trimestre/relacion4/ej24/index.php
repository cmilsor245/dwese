<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 15/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que lee un número n e imprime una pirámide de números con n filas. se utiliza una fuente de letra que haga que todos los caracteres y espacios tengan la misma anchura que los números
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 24</title>
      <style>
        body {
          font-family: monospace;
        }
      </style>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">número: <input type = "number" name = "numero" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <br />

      <?
        // ! por alguna razón que desconozco solo funciona bien si se introduce un número de 7 cifras
        const ALTURA = 13;

        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          for ($i = 0; $i < ALTURA; $i++) {
            for ($j = 0; $j < ALTURA - $i; $j++) {
              echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            }

            for ($j = 0; $j < $i; $j++) {
              echo $numero . " ";
            }

            echo "<br />";
          }
        }
      ?>
    </body>
  </html>