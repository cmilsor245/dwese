<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 08/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra en 3 columnas el cuadrado y el cubo de los 5 primeros números enteros a partir de uno que se introduce por teclado
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 11</title>
    </head>
    <body>
      <form method = "post">
        <label for = "numero">Número <input name = "numero" type = "number" required /></label>
        <br /><br />
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          echo "
            <br />
            <table>
              <tr>
                <th>número</th>
                <th>cuadrado</th>
                <th>cubo</th>
              </tr>
          ";

          for ($i = 1; $i <= 5; $i++) {
            $siguiente = $numero + $i;

            $cuadrado = $siguiente * $siguiente;
            $cubo = $siguiente * $siguiente * $siguiente;

            echo "
                <tr>
                  <td>$siguiente</td>
                  <td>$cuadrado</td>
                  <td>$cubo</td>
                </tr>
            ";
          }
        }
      ?>
    </body>
  </html>