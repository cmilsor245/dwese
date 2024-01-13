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
      <title>ejercicio 1 - asociativo</title>
    </head>
    <body>
      <?
        $general = array();

        /* ---------------------------------------------------------------- */

        // funciones
        function cuadrado($numero) {
          return $numero ** 2;
        }

        function cubo($numero) {
          return $numero ** 3;
        }

        /* ---------------------------------------------------------------- */

        // generación de valores
        for ($i = 0; $i < 20; $i++) {
          $numero = rand(0, 100);
          $cuadrado = cuadrado($numero);
          $cubo = cubo($numero);
          $general[] = array("numero" => $numero, "cuadrado" => $cuadrado, "cubo" => $cubo);
        }

        /* ---------------------------------------------------------------- */

        // resultado
        echo "
          <table>
            <tr>
              <td>número</td>
              <td>cuadrado</td>
              <td>cubo</td>
            </tr>
        ";

        foreach ($general as $numeros) { // se recorre el array con un foreach y en cada iteración se muestra el valor de cada elemento
          echo "
            <tr>
              <td>{$numeros["numero"]}</td>
              <td>{$numeros["cuadrado"]}</td>
              <td>{$numeros["cubo"]}</td>
            </tr>
          ";
        }
      ?>
    </body>
  </html>