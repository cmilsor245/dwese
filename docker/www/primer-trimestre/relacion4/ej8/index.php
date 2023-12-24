<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que muestra la tabla de multiplicar de un número introducido por teclado. el resultado se debe mostrar en una tabla
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 8</title>
      <link rel = "stylesheet" href = "css/style.css" />
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

          echo "
              <table>
                <tr>
                  <th>" . $numeroIngresado . " x</th>
                  <th>resultado</th>
                </tr>
            ";

          for ($i = 0; $i <= 10; $i++) {
            echo "
              <tr>
                <td>" . $i . "</td>
                <td>" . $i * $numeroIngresado . "</td>
              </tr>
            ";
          }
        }
      ?>
    </body>
  </html>