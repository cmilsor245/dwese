<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 09/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: se definen 3 arrays de 20 números enteros cada uno. se carga el primero con valores aleatorios entre 0 y 100. en el segundo se almacenan los cuadrados de los valores que hay en el primer array. en el tercero se deben almacenar los cubos de los valores que hay en el primer array
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 1</title>
    </head>
    <body>
      <?
        $numero = array();

        for ($i = 0; $i < 20; $i++) {
          $numero[$i] = rand(0, 100);
        }

        /* ---------------------------------- */

        $cuadrado = array();
        $cubo = array();

        for ($i = 0; $i < 20; $i++) {
          $cuadrado[$i] = $numero[$i] * $numero[$i];
          $cubo[$i] = $numero[$i] * $numero[$i] * $numero[$i];
        }

        /* ---------------------------------- */

        echo "
          <table>
            <tr>
              <td>número</td>
              <td>cuadrado</td>
              <td>cubo</td>
            </tr>
        ";

        for ($i = 0; $i < 20; $i++) {
          echo "
            <tr>
              <td>$numero[$i]</td>
              <td>$cuadrado[$i]</td>
              <td>$cubo[$i]</td>
            </tr>
          ";
        }
      ?>
    </body>
  </html>